<?php
/**
 * Enable theme features
 */
add_theme_support('root-relative-urls');    // Enable relative URLs
// add_theme_support('bootstrap-gallery');     // Enable Bootstrap's thumbnails component on [gallery]
add_theme_support('nice-search');           // Enable /?s= to /search/ redirect
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN

/*===========================
    # Header Config
 ===========================*/
//add_theme_support('header-top-bar');
//add_theme_support('header-two-navs');
//add_theme_support('header-nav-bottom');

/*===========================
    # Footer Config
 ===========================*/
//add_theme_support('footer-credits');

/**
 * Configuration values
 */
define('GOOGLE_ANALYTICS_ID', ''); // UA-XXXXX-Y (Note: Universal Analytics only, not Classic Analytics)
define('POST_EXCERPT_LENGTH', 40); // Length in words for excerpt_length filter (http://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length)

/**
 * .main classes
 */


function roots_main_class() {
    $sidebarOn = get_field('sidebar' , 'option');
    $class = 'col-sm-12';

    if ($sidebarOn) {
        if (roots_display_sidebar()) {
            // Classes on pages with the sidebar
            $sidebarPosition = get_field('sidebar_position' , 'option');
            if ($sidebarPosition === 'left') {
                $class = 'col-md-8 col-md-push-4';
            }
            else {
                $class = 'col-md-8';
            }
        }
    }

  return $class;
}

/**
 * .sidebar classes
 */
function roots_sidebar_class() {
    // Classes on pages with the sidebar
    $sidebarOn = get_field('sidebar' , 'option');
    $class = '';    

    if ($sidebarOn) {
        $sidebarPosition = get_field('sidebar_position' , 'option');
        if ($sidebarPosition === 'left') {
            $class = 'col-md-4 col-md-pull-8';
        }
        else {
            $class = 'col-md-4';
        }
    }

    return $class;
}

/**
 * Define which pages shouldn't have the sidebar
 *
 * See lib/sidebar.php for more details
 */




function roots_display_sidebar() {

// vars 
$sidebarLocs = get_field('sidebar_location' , 'option');

// check
if( $sidebarLocs ):
    $array = ['is_404'];
    foreach( $sidebarLocs as $sidebarLoc ): 
        $array[] = $sidebarLoc;
     endforeach; 

endif; 

 
    // echo '<pre>';
    // echo var_dump($array);
    // echo '</pre>';   




  $sidebar_config = new Roots_Sidebar(
    /**
     * Conditional tag checks (http://codex.wordpress.org/Conditional_Tags)
     * Any of these conditional tags that return true won't show the sidebar
     *
     * To use a function that accepts arguments, use the following format:
     *
     * array('function_name', array('arg1', 'arg2'))
     *
     * The second element must be an array even if there's only 1 argument.
     */


    //$array,

    array(
      'is_404',
      'is_front_page',
      //'is_page',
    ),
    /**
     * Page template checks (via is_page_template())
     * Any of these page templates that return true won't show the sidebar
     */
    array(
      'page-templates/full-width.php'
    )
  );

  return apply_filters('roots_display_sidebar', $sidebar_config->display);
}

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) { $content_width = 1140; }
