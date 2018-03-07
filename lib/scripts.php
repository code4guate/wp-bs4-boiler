<?php
/**
 * Enqueue scripts and stylesheets
 */
function roots_scripts() {

  /*===========================
      # Main CSS
   ===========================*/
  wp_enqueue_style( 'roots_main', get_template_directory_uri() . '/assets/css/main.min.css', false, filemtime( get_template_directory() . '/assets/css/main.min.css' ) );

  /*===========================
      # Comment JS
   ===========================*/
  if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  /*==================================================================================
      # jQuery
      - jQuery is loaded using the same method from HTML5 Boilerplate:
      - Google CDN with local fallback
      - It's kept in the header instead of footer to avoid conflicts with plugins.
      - http://wordpress.stackexchange.com/a/237712
   ==================================================================================*/
  if ( ! is_admin() && current_theme_supports( 'jquery-cdn' ) ) {
      wp_deregister_script( 'jquery' );
      wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', [], null, false );
      wp_add_inline_script( 'jquery', 'window.jQuery||document.write("<script src=' . esc_url( includes_url( '/js/jquery/jquery.js' ) ) . '><\/scr‌​ipt>");' );
  }

  wp_enqueue_script( 'jquery' );

  /*===========================
      # Main JS
   ===========================*/
  wp_enqueue_script( 'roots_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', [], filemtime( get_template_directory() . '/assets/js/scripts.min.js' ), true );
}

add_action( 'wp_enqueue_scripts', 'roots_scripts', 100 );



/*============================================================================
    # Google Analytics
    - HTML5 Boilerplate Google Analytics snippet
    - https://github.com/h5bp/html5-boilerplate/blob/master/src/index.html
    - Define the ID in config.php
 ============================================================================*/
function roots_google_analytics() { ?>

  <script>
    window.ga = function () {
      ga.q.push(arguments)
    };
    ga.q      = [];
    ga.l      = +new Date;
    ga('create', '<?php echo GOOGLE_ANALYTICS_ID; ?>', 'auto');
    ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>

<?php }

if ( GOOGLE_ANALYTICS_ID && ! current_user_can( 'manage_options' ) ) {
  add_action( 'wp_footer', 'roots_google_analytics', 20 );
}
