<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<html>

  <head>
    <meta charset="<?php bloginfo( 'charset' );?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>
			<?php if ( !is_front_page() ) { echo wp_title( ' ', true, 'left' ); echo ' | '; }
			echo bloginfo( 'name' ); echo ' - '; bloginfo( 'description', 'display' );  ?>
		</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/img/favicon.ico">

    <script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
    <script type="text/javascript">
      WebFont.load({
        google: {
          families: ['Muli:400,300italic,300,400italic', 'IM+Fell+DW+Pica', 'Oswald']
        }
      });
    </script>

    <style type="text/css">

      body {
        background-image: url("<?php bloginfo('template_directory'); ?>/lib/img/background.jpg");
      }

      <?php frack_get_option_tree( 'accent_color', function ($accent_color) {
        ?>

        #header-top {
          background-color: <?php echo $accent_color; ?>
        }

        .widget a {
          color: <?php echo $accent_color; ?>;
        }
        <?php
      }); ?>


        <?php $image = wp_get_attachment_src( get_post_thumbnail_id( $post->ID), 'single-post-thumbnail'); ?>

        #content {
          background-image: url('<?php echo $image[0]; ?>') no-repeat;
        }

    </style>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header id="header">
      <div id="header-top">
        <div id="header-top-wrapper">
          <div id="header-top-logo">
            <?php frack_get_option_tree( 'logo_url', function ($logo_url) {
              ?>
                <h1 class="brand">
                  <img src="<?php echo $logo_url; ?>" alt="" />
                </h1>
              <?php
            }); ?>
          </div>
        </div>
      </div>
      <div id="header-bottom">
        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <div class="container">
              <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <form role="search" class="navbar-search pull-right" method="get" action="/">
                <input type="search" class="search-query" name="s" id="s" placeholder="Search" />
              </form>
              <div class="nav-collapse collapse">
                <?php frack_header_nav(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
