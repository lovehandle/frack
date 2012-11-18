<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<section id="content" role="main">
  <div id="content-wrapper" class="container-fluid">
    <?php get_sidebar( 'contact' ); ?>
    <?php frack_page_content(); ?>
  </div>
</section>

<?php get_footer(); ?>
