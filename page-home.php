<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<section id="content" role="main">
  <div id="tagline" class="hero-unit">
    <h1>Bridge City Lacrosse Home Page</h1>
  </div>

  <div id="content-wrapper" class="container-fluid">
    <?php get_sidebar( "home" ); ?>
  </div>
</section>

<?php get_footer(); ?>
