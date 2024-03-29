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
      </div>
    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>
<?php wp_footer(); ?>

</body>
</html>