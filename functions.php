<?php
/*
Author: Ryan Closner
URL: http://github.com/rclosner/frack
*/

require_once("lib/options.php");

////////////////////////////////////
/////// WIDGET SECTIONS ////////////
////////////////////////////////////

function frack_register_sidebars () {
  if ( function_exists( "register_sidebar") ) {

    $widget_sidebars = array( "default", "home", "select_teams", "development_teams", "lessons", "tournaments", "camps", "contact" );

    foreach( $widget_sidebars as $sidebar_id ) {
      $sidebar_name = ucfirst(str_replace("_", " ", $sidebar_id));

      register_sidebar(array(
        'name'          => __( $sidebar_name ),
        'id'            => $sidebar_id,
        'before_widget' => '<article id="%1$s" class="widget %2$s">',
        'after_widget'  => '</article>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
      ));
    }
  }
}


function frack_sidebar ( $sidebar_name ) {
?>
    <?php if ( is_active_sidebar( $sidebar_name ) ) : ?>
      <?php dynamic_sidebar( $sidebar_name ); ?>
    <?php else : ?>
      <?php frack_display_sidebar_activation_alert(); ?>
    <?php endif; ?>
<?php
}

function frack_display_sidebar_activation_alert() {
?>
<?php if ( function_exists( "get_option_tree" ) ) {
  $display_sidebar_activation_alert = get_option_tree( "sidebar_activation_alert" );
}?>

    <?php if ( isset( $display_sidebar_activation_alert) && $display_sidebar_activation_alert == "true") { ?>
      <div class="alert help no-widgets">
        <p>Please <a href="/wp-admin/widgets.php">activate</a> some widgets for this section.</p>
      </div>
    <?php } ?>
<?php
}

////////////////////////////////////
///////////// MENUS ////////////////
////////////////////////////////////

require_once("lib/menu_walker.php");

function frack_register_menus () {
  add_theme_support( "menus" );
  register_nav_menus(
    array(
      "header-nav" => __( "The Header Menu", "frack" ),
      "footer-nav" => __( "The Footer Menu", "frack" )
    )
  );
}

function frack_header_nav () {
  $args = array(
    "container"       => false,
    "menu_class"      => "nav",
    "theme_location"  => "header-nav",
    "depth"           => 2,
    "fallback_cb"     => "frack_menu_fallback",
    "walker"          => new Bootstrap_Walker_Nav_Menu()
  );

  wp_nav_menu($args);
}

function frack_footer_nav () {
  $args = array(
    "container"       => false,
    "menu_class"      => "nav",
    "theme_location"  => "footer-nav",
    "depth"           => 2,
    "fallback_cb"     => "frack_menu_fallback",
    "walker"          => new Bootstrap_Walker_Nav_Menu()
  );

  wp_nav_menu($args);
}

function frack_menu_fallback () {
  wp_page_menu( "show_home=Home" );
}

////////////////////////////////////
//////// SOCIAL MEDIA //////////////
////////////////////////////////////

function frack_social_media_nav () {
?>

  <ul class="nav">

<?php
  $services = array("facebook", "google_plus", "twitter", "flickr");

  reset($services);

  while ( list($key, $val) = each($services) ) {
    echo frack_social_media_button($val);
  }
?>

  </ul>

<?php
}

function frack_social_media_button ( $social_media_name ) {
?>

<?php if ( function_exists('get_option_tree') ) {
  $social_media_url = get_option_tree( $social_media_name . "_url" );
} ?>

  <?php if ( isset( $social_media_url ) ) { ?>
    <li>
      <a href="<?php echo $social_media_url; ?>">
        <img src="<?php echo bloginfo('template_directory'); ?>/lib/img/<?php echo $social_media_name; ?>.png" alt="" />
      </a>
    </li>
  <?php } ?>

<?php
}

////////////////////////////////////
//////////// CONTENT ///////////////
////////////////////////////////////


function frack_page_content() {
  ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php if ( has_post_thumbnail() ) { ?>
      <style type="text/css" media="all"> #content { background: url("<?php wp_get_attachment_url( get_post_thumbnail_id(); ?>") no-repeat; } </style>
    <?php { ?>

    <article class="post" role="article">
      <header class="post-header">
        <h1 class="post-title">
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
          </a>
        </h1>
      </header>

      <div class="post-content">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
  <?php else : ?>
    <p>There has been an error. Please try again later.</p>
  <?php endif; ?>
  <?php
}

function frack_posts() {
  ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part('post'); ?>
  <?php endwhile; ?>
  <?php else : ?>
    <p>There are no posts to display. Try using the search.</p>
  <?php endif; ?>
  <?php
}

////////////////////////////////////
//////////// HELPERS  //////////////
////////////////////////////////////

function frack_get_option_tree( $key, $func ) {
  if ( function_exists( 'get_option_tree' ) ) {
    $value = get_option_tree( $key );
  }

  if ( isset($value) ) {
    $func($value);
  }
}

?>
