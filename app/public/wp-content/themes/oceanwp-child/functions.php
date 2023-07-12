<?php


add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style(
    'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array('parent-style'),
    wp_get_theme()->get('Version')
  );
}

function add_admin_link_to_menu($items, $args)
{
  if ($args->menu == 'main-menu' && is_user_logged_in()) {
    $items .= '<li class="admin-menu"><a href="' . admin_url() . '">Admin</a></li>';
  }
  return $items;
}
add_filter('wp_nav_menu_items', 'add_admin_link_to_menu', 10, 2);


// END ENQUEUE PARENT ACTION
