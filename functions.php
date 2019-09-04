<?php
 
/*-----------------
THEME SETUP GENERAL
------------------*/

function margo_theme_assets() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/margo.css',false,'1.1','all');
	wp_enqueue_style( 'materialicons', 'https://fonts.googleapis.com/icon?family=Material+Icons',false,'1','all');
	wp_enqueue_script( 'materialize', get_template_directory_uri() . '/assets/scss/vendors/material-margo/js/bin/materialize.min.js',array(), '1.0.0', true);
	wp_enqueue_script( 'functionality', get_template_directory_uri() . '/assets/js/index.js',array(), '1.0.0', true);
}

//THEME FEATURES
function set_theme_features(){
	add_theme_support("title-tag");
	add_theme_support( 'woocommerce', array(

				'product_grid'          => array(
						'default_rows'    => 3,
						'min_rows'        => 1,
						'max_rows'        => 5,
						'default_columns' => 2,
						'min_columns'     => 1,
						'max_columns'     => 2,
				),
	) );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	register_nav_menus( 
		array(
			"primaryHeaderMenu" => "Primary Header Menu",
			"primaryFooterMenu" => "Primary Footer Menu",
			"primaryShopMenu" => "Primary Shop Menu"
		));
}

//CUSTOM POST TYPES
function margo_post_types(){
	register_post_type( "Product Promo", array(
		"public" => true,
		"labels" => array(
			"name" => "Produkt Promo",
			"add_new_item" => "Neue Produkt Promotion",
			"edit_item" => "Produkt Promo bearbeiten",
			"view_item" => "Vorschau",
			"all_items" => "Alle Promotionen",
			"search_items" => "Promotion suchen",
		),
		"menu_icon" => "dashicons-store",
		"menu_position" => 20,
		"rewrite" => array(
			"slug" => "promotion"
		)
	));
}


//SVG OPLOUAD 
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
 }
 add_filter('upload_mimes', 'cc_mime_types');

/*------------------
CUSTOM FUNCTIONS
-------------------*/

function add_product_category_subtitle(){
	global $product;
	if($product->get_sku()){
	?>	
		<p class="product_single_custom_meta product_meta">
			Material: <?php echo get_field("material") ?> <br/>
			Ma&szlig;e: <?php echo $product->get_height() . get_option('woocommerce_dimension_unit') . " x " . $product->get_width() . get_option('woocommerce_dimension_unit') . " x " . $product->get_length() . get_option('woocommerce_dimension_unit'); ?> <br/>
			Artikel-Nr.: <?php echo '<span class="sku">' . $product->get_sku() . '</span>'; ?><br/>

		</p>
	<?php
	}
}

#Change Shop / Archive Layout
function margo_before_shop_loop(){
	?>
		<div class="row">
		<?php do_action( 'woo_custom_catalog_ordering' ); ?>
	<?php
}

function margo_after_shop_loop(){
	?>
		</div>
	<?php
}

function margo_before_shop_item(){
	?>
		<div  class="before_shop_item">
	<?php
	
	if(get_field("badge")){
		?>
			<div class="woocommerce_product_badge">
				<span>
					<?php the_field("badge"); ?>
				</span>
			</div>
		<?php
	}
}

function margo_after_shop_item(){
	?>
		</div>
	<?php
}

#Change Product Title
function margo_before_shop_item_title(){
	?>
		<span class="before_shop_item_title">
	<?php
}
function margo_after_shop_item_title(){
	global $product;
	?>
		<p class="archive-loop_sku">
			Artikel-Nr.: <?php echo $product->get_sku(); ?>
		</p>
		</span>
	<?php
}

//Actions
add_action( 'wp_enqueue_scripts', 'margo_theme_assets' );
add_action( "after_setup_theme", "set_theme_features");
add_action( "init" , "margo_post_types");

#Woocommerce Actions
add_action( 'woocommerce_shop_loop_item_title', 'margo_before_shop_item_title', 5 );
add_action( 'woocommerce_before_shop_loop', 'margo_before_shop_loop', 15 );
add_action( 'woocommerce_before_shop_loop_item', 'margo_before_shop_item', 15 );

#after 
add_action( 'woocommerce_after_shop_loop', 'margo_after_shop_loop', 5 );
add_action( 'woocommerce_after_shop_loop_item', 'margo_after_shop_item', 5 );
//add_action( 'woocommerce_after_shop_loop_item_title', 'margo_after_shop_item_title', 5 );


if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	} 
}
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {   
	function woocommerce_get_product_thumbnail( $size = 'shop_catalog' ) {
		global $post, $woocommerce, $product;
		$product->get_id();
		$output = '<div class="card-image">';
		
		if ( has_post_thumbnail() ) {               
			$output .= get_the_post_thumbnail( $post->ID, $size );
		} else {
			$output .= wc_placeholder_img( $size );
		}              
		$output .= '</div>';
		return $output;
	}
}

//hide if male Category


add_action( "wp", "check_if_male_category", 99 );

function check_if_male_category(){
	$url = $_SERVER["REQUEST_URI"];

	$isMale = strpos($url, 'herren');

	if ($isMale!==false) {
		add_filter( 'woocommerce_loop_product_link', 'change_product_permalink_shop', 99, 2 );

		function change_product_permalink_shop( $link, $product ) {
			$newLink = str_replace("damen", "herren", $link);
			return $newLink;
		}
	}
}
add_action("wp_head", "apply_style_to_male_page");

function apply_style_to_male_page(){
	$url = $_SERVER["REQUEST_URI"];
	$isMale = strpos($url, 'herren');

	if ($isMale!==false) {
		echo "
		<style>
		li.variable-item{
			display: none !important;
		}
		li[data-value='schwarz'],
		li[data-value='Schwarz']{
			display: flex !important;
		}
		</style>
		";
	}
}
// Product Sort in List
add_action( 'init', function(){
	add_post_type_support( 'product', 'page-attributes' );
});

/*------------
REMOVE AND ADD
-------------*/

add_action( 'woo_custom_catalog_ordering', 'woocommerce_catalog_ordering', 30 ); 
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

#change position of add to cart button 
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 15 );
//add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 15 );

#Thumbnail Loop change
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

// REORDER SUMMARY BOX

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );


add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
// Hidden as german Market interferes
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 15 ); 
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( "woocommerce_single_product_summary", "add_product_category_subtitle", 25);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );


//Filters
#Woocommerce Filters

function bbloomer_remove_product_tabs( $tabs ) {
	unset( $tabs['additional_information'] ); 
	return $tabs;
}

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce; 
	ob_start(); 
	?>
	<span class="cart-contents" >
		<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?>
	</span>
	<?php 
	$fragments['span.cart-contents'] = ob_get_clean();
	return $fragments; 
}

function change_product_recommendation_text($translated_text, $text, $domain) {
	$translated_text = str_replace("Ähnliche Produkte", "Produktempfehlungen", $translated_text);
	$translated_text = str_replace("Continue to payment", "Bestellung Abschicken", $translated_text);
	return $translated_text; 
} 

function change_product_upsells_text($translated_text, $text, $domain) {
	$translated_text = str_replace("Das könnte dir auch gefallen", "Hierzu passende Artikel", $translated_text);
	return $translated_text; 
} 

function change_variant_button_text($translated_text, $text, $domain) {
	$translated_text = str_replace("Ausführung wählen", "Farbe w&auml;hlen", $translated_text);
	return $translated_text; 
} 



add_filter( 'woocommerce_loop_add_to_cart_link', 'replace_loop_add_to_cart_button', 10, 2 );
function replace_loop_add_to_cart_button( $button, $product  ) {
    // Not needed for variable products
    if( $product->is_type( 'variable' ) ) return $button;

    // Button text
    $button_text = __( "Mehr erfahren", "woocommerce" );

    return '<a class="button product_type_variable add_to_cart_button wvs_add_to_cart_button wvs_ajax_add_to_cart" href="' . $product->get_permalink() . '">' . $button_text . '</a>';
}

add_filter("gettext", "change_product_recommendation_text", 100, 3);
add_filter("gettext", "change_product_upsells_text", 100, 3);
add_filter("gettext", "change_variant_button_text", 100, 3);
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
add_filter( 'woocommerce_product_tabs', 'remove_additional_information', 98 );

