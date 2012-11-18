    <footer id="footer">
      <div class="navbar navbar-inverse">
        <div class="navbar-inner">
          <div class="container">
            <div class="navbar-text pull-right">
              <?php frack_social_media_nav(); ?>
            </div>
            <div class="nav-collapse collapse">
              <?php frack_footer_nav(); ?>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <?php frack_get_option_tree( 'copyright_blurb', function ($copyright_blurb) {
      ?>

        <div id="copyright" class="container-fluid">
          <p>&copy; <?php echo $copyright_blurb; ?></p>
        </div>

      <?php
    }); ?>

    <?php wp_footer(); ?>
  </body>
</html>
