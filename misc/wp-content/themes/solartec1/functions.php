<?php
// añade soporte
add_theme_support("post-thumbnails");
add_theme_support("menus");
add_theme_support("widgets");

// Registrar sidebar
function registrar_sidebar(){
    register_sidebar(array(
     'name' => 'Sidebar del footer 1',
     'id' => 'sidebar-footer-1',
     'description' => 'Descripción de ejemplo',
     'class' => '',
     'before_widget' => '<div class="col-lg-3 col-md-6">',
     'after_widget' => '</div>',
     'before_title' => '<h5 class="text-white mb-4">',
     'after_title' => '</h5>',
    ));
    register_sidebar(array(
     'name' => 'Sidebar del footer 2',
     'id' => 'sidebar-footer-2',
     'description' => 'Descripción de ejemplo',
     'class' => 'sidebar',
     'before_widget' => '<div id="%1$s" class="widget %2$s">',
     'after_widget' => '</div>',
     'before_title' => '<h5 class="text-white mb-4">',
     'after_title' => '</h5>',
    ));
  }
  add_action( 'widgets_init', 'registrar_sidebar');
?>