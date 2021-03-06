<?php
use Timber as Timber;

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');

define("BIOSCIENCES_PATH", get_template_directory() );

add_theme_support( 'post-thumbnails' );

function main_sidebar()  {

	$args = array(
		'id'            => 'main_sidebar',
		'name'          => 'main_sidebar',
		'description'   => 'The main sidebar',
		'before_title'  => '<h2 class="widget__title">',
		'after_title'   => '</h2>',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

}

function enable_more_buttons($buttons) {
  $buttons[] = 'hr';
  $buttons[] = 'sub';
  $buttons[] = 'sup';
  $buttons[] = 'fontselect';
  $buttons[] = 'fontsizeselect';
  $buttons[] = 'cleanup';
  $buttons[] = 'styleselect';

  return $buttons;
}

add_filter("mce_buttons_3", "enable_more_buttons");

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'main_sidebar' );

require_once BIOSCIENCES_PATH.'/lib/initialize.php';
//require_once BIOSCIENCES_PATH.'/lib/register_onestop_forms.php';