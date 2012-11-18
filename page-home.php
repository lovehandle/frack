<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<section id="content" role="main">
  <?php frack_get_option_tree( 'tagline', function ($tagline) {
    ?>
      <div id="tagline" class="hero-unit">
      <h1><?php echo $tagline; ?></h1>
      </div>
    <?php
  }); ?>

  <div id="content-wrapper" class="container-fluid">
    <?php get_sidebar( "home" ); ?>
  </div>
</section>

<?php get_footer(); ?>
