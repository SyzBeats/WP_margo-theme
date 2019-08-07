
<?php 
		//Theme Security
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }
?>

<ul id="slide-out" class="sidenav sidenav-fixed">
  <li>
    <div class="background">
      <a href="/">
        <picture class="no-vis-on-medium">
          <!-- <source srcset="http://localhost:8888/margo/assets/img/MARGO_logo-.svg" type="image/svg+xml"> -->
          <img style="width: 10rem;" src="http://localhost:8888/margo/wp-content/uploads/2019/07/Download.jpg" alt="Margo Logo" lazy />
        </picture>
      </a>
    </div>
  </li>
  <li class="hidden-on-medium">
    <a href="#mini-cart-modal" class="waves-effect modal-trigger"> <!-- Modal Trigger -->
      <img class="mini-cart_icon" src="http://localhost:8888/margo/assets/img/shopicon-01.svg" alt="shopping icon" lazy />
    </a>
    <!--WOOCOMMERCE CART COUNT-->
    <?php global $woocommerce; ?>
    <span class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
      <?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>
    </span>
  </li>
  <li>
    <a href="/margo/shop" class="waves-effect">SHOP</a>
  </li>
  <li>
    <div class="divider"></div>
  </li>
  <?php
    wp_nav_menu( array(
      "theme_location" => "primaryHeaderMenu",
      "container" => ""
    ));
  ?>
</ul>
