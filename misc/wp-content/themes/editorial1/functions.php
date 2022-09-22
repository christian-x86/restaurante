<?php
// añade soporte
add_theme_support("post-thumbnails");
add_theme_support("menus");
add_theme_support("widgets");

// css
/*
function custom_theme_assets() {
	wp_enqueue_style( 'style', get_bloginfo('template_directory'). '/assets/css/main.css' );
}

add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );
*/

// carga de scripts
function my_init_method() {
    // css
    wp_enqueue_style( 'style', get_bloginfo('template_directory'). '/assets/css/main.css' );
    // js
    wp_enqueue_script('jquery', get_bloginfo('template_directory') . '/assets/js/jquery.min.js',array(), "3.6.0",true);
    wp_enqueue_script('browser', get_bloginfo('template_directory') . '/assets/js/browser.min.js',array(), "1.0.1",true);
    wp_enqueue_script('breakpoints', get_bloginfo('template_directory') . '/assets/js/breakpoints.min.js',array(), "1.0",true);
    wp_enqueue_script('util', get_bloginfo('template_directory') . '/assets/js/util.js',array(), "1.0",true);
    wp_enqueue_script('main', get_bloginfo('template_directory') . '/assets/js/main.js',array(), "1.0",true);
}    
 
add_action('wp_enqueue_scripts', 'my_init_method');

// Registrar sidebar
function registrar_sidebar(){
    register_sidebar(array(
     'name' => 'Sidebar de ejemplo',
     'id' => 'sidebar-ejemplo',
     'description' => 'Descripción de ejemplo',
     'class' => 'sidebar',
     'before_widget' => '<div id="%1$s" class="widget %2$s"><article>',
     'after_widget' => '</article></div>',
     'before_title' => '<header class="major"><h2 class="widget-title">',
     'after_title' => '</h2></header>',
    ));
  }
  add_action( 'widgets_init', 'registrar_sidebar');
  
?>