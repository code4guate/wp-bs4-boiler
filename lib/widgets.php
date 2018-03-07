<?php
/**
 * Register sidebars and widgets
 */
function roots_widgets_init() {

  /*===========================
      # Header Areas
   ===========================*/
  if ( current_theme_supports( 'header-top-bar' ) ) {
    register_sidebar( array (
        'name'          => __( 'Header Top Bar Left', 'roots' ),
        'id'            => 'header-top-bar-left',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array (
        'name'          => __( 'Header Top Bar Right', 'roots' ),
        'id'            => 'header-top-bar-right',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
  }

  if ( current_theme_supports( 'header-two-navs' ) ) {
    register_sidebar( array (
        'name'          => __( 'Header Above Nav', 'roots' ),
        'id'            => 'header-above-nav',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
  }

  if ( current_theme_supports( 'header-nav-bottom' ) ) {
    register_sidebar( array (
        'name'          => __( 'Header Right', 'roots' ),
        'id'            => 'header-right',
        'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
  }

  /*===========================
      # Slideshow Area
   ===========================*/
  register_sidebar( array (
      'name'          => __( 'Slideshow', 'roots' ),
      'id'            => 'slider',
      'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
      'after_widget'  => '</div></section>',
      'before_title'  => '<h3>',
      'after_title'   => '</h3>',
  ) );

  /*===========================
      # Preface Areas
   ===========================*/
  register_sidebar( array (
      'name'          => __( 'Preface A', 'roots' ),
      'id'            => 'preface-a',
      'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
      'after_widget'  => '</div></section>',
      'before_title'  => '<h3>',
      'after_title'   => '</h3>',
  ) );

  /*===========================
      # Sidebar Areas
   ===========================*/
  register_sidebar( array (
      'name'          => __( 'Sidebar', 'roots' ),
      'id'            => 'sidebar',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3>',
      'after_title'   => '</h3>',
  ) );

  /*===========================
      # Postscript Areas
   ===========================*/
  register_sidebar( array (
      'name'          => __( 'Postscript A', 'roots' ),
      'id'            => 'postscript-a',
      'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
      'after_widget'  => '</div></section>',
      'before_title'  => '<h3>',
      'after_title'   => '</h3>',
  ) );

  /*===========================
      # Footer Areas
   ===========================*/
  register_sidebar( array (
      'name'          => __( 'Footer', 'roots' ),
      'id'            => 'footer',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3>',
      'after_title'   => '</h3>',
  ) );

 register_sidebar( array (
     'name'          => __( 'Footer A', 'roots' ),
     'id'            => 'footer-a',
     'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
     'after_widget'  => '</div></section>',
     'before_title'  => '<h3>',
     'after_title'   => '</h3>',
 ) );

 register_sidebar( array (
     'name'          => __( 'Footer B', 'roots' ),
     'id'            => 'footer-b',
     'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
     'after_widget'  => '</div></section>',
     'before_title'  => '<h3>',
     'after_title'   => '</h3>',
 ) );

 register_sidebar( array (
     'name'          => __( 'Footer C', 'roots' ),
     'id'            => 'footer-c',
     'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
     'after_widget'  => '</div></section>',
     'before_title'  => '<h3>',
     'after_title'   => '</h3>',
 ) );

 register_sidebar( array (
     'name'          => __( 'Footer D', 'roots' ),
     'id'            => 'footer-d',
     'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
     'after_widget'  => '</div></section>',
     'before_title'  => '<h3>',
     'after_title'   => '</h3>',
 ) );

  if (current_theme_supports('footer-credits')) {
    register_sidebar( array (
        'name'          => __( 'Footer Credits', 'roots' ),
        'id'            => 'footer-credits',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
  }

}

add_action( 'widgets_init', 'roots_widgets_init' );


