<?php
// añade soporte
add_theme_support("post-thumbnails");
add_theme_support("menus");
add_theme_support("widgets");

// carga de scripts
function my_init_method() {
  // css | Core theme CSS (includes Bootstrap)
  wp_enqueue_style( 'style', get_bloginfo('template_directory'). '/css/styles.css' );
  // js | Core theme JS
  wp_enqueue_script('main', get_bloginfo('template_directory') . '/js/scripts.js',array(), "1.0",true);
}    

add_action('wp_enqueue_scripts', 'my_init_method');
?>