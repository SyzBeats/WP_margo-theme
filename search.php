<?php
/*
Template Name: Search Page
*/

//Theme Security
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php get_sidebar() ?>
<div class="wrap">
<div id="primary" class="content-area">
<?php get_header(); ?>
  <main id="main" class="site-main" role="main">
    <div class="title-wrap card-panel p-0 m-0 ">
      <h1 class="search-title" style="text-align: center;">
        <?php echo $wp_query->found_posts; ?> <?php _e( 'Suchergebnisse für', 'locale' ); ?>: "<?php the_search_query(); ?>"
      </h1>    
    </div>
    <!--Wordpress Content Area-->
    <div id="entry-content">
     
    <?php if(have_posts()) : ?>
       
    <h2 class="center">Produkte</h2>
    <ul class="row">
         <?php while (have_posts()) : the_post(); ?>
            <?php if("product" === get_post_type()){
              ?>
                <li class="col s4 center">
                  <a class="center" href="<?php the_permalink() ?>">
                    <p><?php the_title(); ?></p>
                    <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
                  </a>
                </li>

              <?php
              }
            ?>

         <?php endwhile; ?>
       </ul>
  
       <h2 class="center">Sonstiges</h2>
       <ul class="collection">
         <?php while (have_posts()) : the_post(); ?>
            <?php if("product" !== get_post_type()){
              ?>
                <li class="collection-item">
                  <a class="center" href="<?php the_permalink() ?>">
                    <p><?php the_title(); ?></p>
                    <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
                  </a>
                </li>

              <?php
              }
            ?>

         <?php endwhile; ?>
       </ul>

      <?php else : ?>
         <h2>Leider nichts gefunden</h2>
       
      <?php endif; ?>
      
    </div><!-- .Entry Content-->
  </main><!-- #main -->
</div><!-- #primary -->
</div><!-- .wrap -->
<?php get_footer(); ?>
<?php wp_footer(); ?>

</body>
</html>