<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
     wp_enqueue_style('stylesheets', get_stylesheet_directory_uri() . '/assets/js/slick.css', array( 'stylesheet' ) );
     wp_enqueue_script( 'stylesheet', get_stylesheet_directory_uri() . '/assets/js/slick-theme.js', array( 'jquery' ) );
     wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/slick.js', array( 'jquery' ) );
}

function slick_shortcode() {
    
 ob_start();
 include(get_stylesheet_directory() . '/slick.php');
 return    ob_get_clean();
}
add_shortcode('slick-slider' , 'slick_shortcode');