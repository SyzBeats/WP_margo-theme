<?php 
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
          <!-- <h1 id="page-title" class="m-1 center"><?php the_title();?></h1> -->
          <!--Breadcrumbs-->
          <?php
            if(is_page() && $post->post_parent){
          ?>
              <div class="col s12 center">
                <a href="<?php the_permalink(wp_get_post_parent_id(get_the_ID($post))); ?>" class="breadcrumb"><?php echo get_the_title(wp_get_post_parent_id(get_the_ID($post)));?></a>
                <a href="<?php the_permalink(get_the_ID($post)); ?>" class="breadcrumb"><?php echo get_the_title(get_the_ID($post));?></a>
              </div>
          <?php
            } else {
              //nothing
            }
          ?>
          <!--End Breadcrumbs-->
        </div>
        <!--Wordpress Content Area-->
        <div id="entry-content">
          <?php
            if (have_posts()):
              while (have_posts()) : the_post();
              the_content();
            endwhile;
          else:
            echo '<p>Diese Seite enthält keinen Inhalt</p>';
          endif;
          ?>
        </div><!-- .Entry Content-->
      </main><!-- #main -->
    </div><!-- #primary -->
  </div><!-- .wrap -->
<?php get_footer(); ?>
<?php wp_footer(); ?>

</body>
</html>