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

// filtro menu li
function add_additional_class_on_li($classes, $item, $args) {
  if(isset($args->add_li_class)) {
      $classes[] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// filtro menu a
function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

// registrar sidebar
function registrar_sidebar(){
  register_sidebar(array(
   'name' => 'Sidebar de footer',
   'id' => 'sidebar-footer',
   'description' => 'Descripción de ejemplo',
   'class' => 'sidebar',
   'before_widget' => '',
   'after_widget' => '',
   'before_title' => '',
   'after_title' => '',
  ));
}
add_action( 'widgets_init', 'registrar_sidebar');

?>