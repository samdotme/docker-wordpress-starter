<?php

/* Basic Settings */
add_theme_support( 'post-thumbnails' );
show_admin_bar( false );

/* Load Scripts and Styles */
function load_styles() {
  wp_enqueue_style('main-style', get_bloginfo('template_url') . '/style.css', array());
}

function load_scripts() {
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'foundation', get_bloginfo('template_url') . '/scripts/foundation.min.js', array('jquery') );
  wp_enqueue_script( 'main-script', get_bloginfo('template_url') . '/scripts/main.js', array('jquery', 'foundation') );
}

add_action('wp_enqueue_scripts', 'load_styles');
add_action('wp_enqueue_scripts', 'load_scripts');

/* Load Navigation Menus */
register_nav_menus(array(
  'home-menu' => 'Home Page menu',
  'top-menu'  => 'Navigation menu for topbar'
));

/* Menu Filter */
class description_walker extends Walker_Nav_Menu
{
      private static function get_classes() {
        $classes = array(
          'homeMenuBlock',
          'small-6',
          'medium-3',
          'columns'
        );
        return $classes;
      }

      function start_el(&$output, $item, $depth = 0, $args = array() )
      {
           global $wp_query;

           $class_names = $value = '';

           //$classes = empty( $item->classes ) ? self::get_classes() : array_merge((array) $item->classes, self::get_classes());

           //$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = esc_attr( join( ' ', self::get_classes() ) );

           $thumbnail_url = '';
            if ( has_post_thumbnail( $item->object_id ) ) {
             $thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id($item->object_id), full )[0];
           }

           $output .= '<div data-equalizer-watch class="' . $class_names . '" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.8)), url(' . esc_url($thumbnail_url) . ')">';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';



           $prepend = '<h4>';
           $append = '</h4>';
           $description  = ! empty( $item->description ) ? '<p>' .esc_attr( $item->description ).'</p>' : '';

           //$item_output .= ( isset( $args->thumbnail_link ) && $args->thumbnail_link ) ? '<a' . '>' : '';
            //$item_output .= apply_filters( 'menu_item_thumbnail' , ( isset( $args->thumbnail ) && $args->thumbnail ) ? get_the_post_thumbnail( $item->object_id , ( isset( $args->thumbnail_size ) ) ? $args->thumbnail_size : 'thumbnail' , $attr ) : '' , $item , $args , $depth );
            //$item_output .= ( isset( $args->thumbnail_link ) && $args->thumbnail_link ) ? '</a>' :'';

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }

        function end_el(&$output, $item, $depth = 0, $args = array() ) {
          $output .= '</div>';
        }
}

 ?>
