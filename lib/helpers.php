<?php

/*=================================
    # Default Roots Util Functions
 ==================================*/

function add_filters($tags, $function) {
  foreach($tags as $tag) {
    add_filter($tag, $function);
  }
}

function is_element_empty($element) {
  $element = trim($element);
  return empty($element) ? false : true;
}

/*===========================
    # Titles
 ===========================*/
/**
 * Page titles
 */
function roots_title() {
  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      return get_the_title(get_option('page_for_posts', true));
    } else {
      return __('Latest Posts', 'roots');
    }
  } elseif (is_archive()) {
    return get_the_archive_title();
  } elseif (is_search()) {
    return sprintf(__('Search Results for %s', 'roots'), get_search_query());
  } elseif (is_404()) {
    return __('Not Found', 'roots');
  } else {
    return get_the_title();
  }
}

/*===========================
    # Custom Helper Functions
 ===========================*/

/**
 * Build our own customizable image tag
 * Grabs the 'full' size by default
 *
 * @return string The markup for the img (<img>)
 *
 * @param int    $id     The id of the image to get
 * @param array  $args   {
 *                       Optional. Array of image markup arguments
 *
 * @type string  $width  The width of the image
 * @type string  $height The height of the image
 * @type string  $src    The url of the image
 * @type string  $class  Classes for the img tag
 * @type string  $alt    The alt text for the image
 * @type string  $srcset The srcset attr for the image
 * @type string  $sizes  The sizes attr for the image
 *
 * }
 * @param string $size   The size of the image to get
 */
function gm_get_image ( $id = null, $args = [], $size = 'full' ) {
    if ( $id === null ) {
        $id = get_post_thumbnail_id();
    }
    $image_data = wp_get_attachment_image_src( $id, $size );
    $defaults   = [
        'width'  => $image_data[ 1 ],
        'height' => $image_data[ 2 ],
        'src'    => $image_data[ 0 ],
        'class'  => 'post-thumb__img',
        'alt'    => get_post_meta( $id, '_wp_attachment_image_alt', true ),
        'srcset' => wp_get_attachment_image_srcset( $id, $size ),
        'sizes'  => '(max-width: 1024px) 100vw, 1024px',
    ];
// override defaults if need be
    $image_attr        = array_merge( $defaults, $args );
    $image_attr_string = "";
    foreach ( $image_attr as $key => $value ) {
        if ( $value ) {
            $image_attr_string .= "$key=\"$value\" ";
        }
    }

    echo "<img $image_attr_string>";

}

/**
 * Just a formatted version of var_dump()
 *
 * @param mixed $thing_to_dump  whatever we want to pass to var_dump()
 */
function gm_dump($thing_to_dump) {
  echo "<pre>";
  var_dump($thing_to_dump);
  echo "</pre>";
}