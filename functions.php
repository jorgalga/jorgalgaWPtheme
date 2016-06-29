<?php

// Add scripts and stylesheets
function startwordpress_scripts() {
    wp_enqueue_style( 'less', get_template_directory_uri() . '/style.less' );
	
	

    /*
    wp_enqueue_script( 
	  'google-maps', 
	  '//maps.googleapis.com/maps/api/js?key=AIzaSyBx6Z_eWgHsGhrHxfUYP_tRlK6yNE07CZs&callback=initMap', 
	  array(), 
	  '1.0', 
	  true 
	);
    */
}

add_action( 'wp_enqueue_scripts', 'startwordpress_scripts' );

function css_function() {
    startwordpress_google_fonts();
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
    wp_enqueue_style( 'material', get_template_directory_uri() . '/css/mdb.min.css', array(), '3.3.6' );
	wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css' );
   
    
}
add_action( 'wp_footer', 'css_function' );


function my_scripts()   
{  

     wp_deregister_script('jquery');  
  
    // Load a copy of jQuery from the Google API CDN  
    // The last parameter set to TRUE states that it should be loaded  
    // in the footer.  
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-2.2.3.min.js', FALSE, '1.11.0', TRUE);  
  
    wp_enqueue_script('jquery');  
        
    wp_enqueue_script('tether', get_template_directory_uri() . '/js/tether.min.js', array('jquery'), '3.3.6', true );
    
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
    wp_enqueue_script('material', get_template_directory_uri() . '/js/mdb.min.js', array('jquery'), '3.3.6', true );
        
    wp_enqueue_script( 'less', get_template_directory_uri() . '/js/less.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'paralax', get_template_directory_uri() . '/js/parallax.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'wp-script', get_template_directory_uri() . '/js/wp-script.js', array('jquery'), '1.0', true );
}  
add_action('init', 'my_scripts');  


// Add Fonts
function startwordpress_google_fonts() {
    wp_register_style('OpenSans', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
	wp_enqueue_style( 'OpenSans');
    
    wp_register_style('FontAwesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css');
	wp_enqueue_style( 'FontAwesome');
}
add_action('wp_print_styles', 'startwordpress_google_fonts');


// WordPress Titles
function startwordpress_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	} 
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	return $title;
} 
add_filter( 'wp_title', 'startwordpress_wp_title', 10, 2 );

// Custom settings
function custom_settings_add_menu() {
  add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99);
}
add_action( 'admin_menu', 'custom_settings_add_menu' );

// Create Custom Global Settings
function custom_settings_page() { ?>
	<div class="wrap">
		<h1>Custom Settings</h1>
		<form method="post" action="options.php">
			<?php
           settings_fields('section');
           do_settings_sections('theme-options');      
           submit_button(); 
       ?>
		</form>
	</div>
	<?php }

// Twitter
function setting_twitter() { ?>
		<input type="text" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>" />
		<?php }

function setting_github() { ?>
			<input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
			<?php }

function custom_settings_page_setup() {
  add_settings_section('section', 'All Settings', null, 'theme-options');
  add_settings_field('twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section');
  add_settings_field('github', 'GitHub URL', 'setting_github', 'theme-options', 'section');
  
	register_setting('section', 'twitter');
  register_setting('section', 'github');
}
add_action( 'admin_init', 'custom_settings_page_setup' );

// Support Featured Images
add_theme_support( 'post-thumbnails' );

// Custom Post Type
function create_my_custom_post() {
	register_post_type('my-custom-post',
			array(
			'labels' => array(
					'name' => __('My Custom Post'),
					'singular_name' => __('My Custom Post'),
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array(
					'title',
					'editor',
					'thumbnail',
				  'custom-fields'
			)
	));
}
add_action('init', 'create_my_custom_post'); 

/*
plugins/theme code don't rely on any old jQuery functionality, and then remove the migrate script.
*/
add_action( 'wp_default_scripts', function( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $jquery_dependencies = $scripts->registered['jquery']->deps;
        $scripts->registered['jquery']->deps = array_diff( $jquery_dependencies, array( 'jquery-migrate' ) );
    }
} );


/*
 *
 */

// para peticiones de usuarios que no están logueados
add_action('wp_ajax_nopriv_get_next_posts', 'ajax_get_next_posts');
// probablemente también vas a querer que los usuarios logueados puedan hacer lo mismo
add_action('wp_ajax_get_next_posts', 'ajax_get_next_posts');
function ajax_get_next_posts(){
	// usamos absint() para sanitizar el valor y recibir un int
    $offset     = absint( $_REQUEST['offset'] );
	$next_posts = new WP_Query(array(
	    'offset'      => $offset,
		'post_type'   => 'post',
		'post_status' => 'publish'
	));
    
	if ( $next_posts->have_posts() ) {
		// devolvemos como output el listado de posts como JSON
		header('Content-Type: application/json');
		echo json_encode( $next_posts->posts );
		// como es una petición AJAX, cortamos inmediatamente la ejecución de PHP
		exit;
	}
	echo json_encode( array() );
	exit;
}




//Removing Emoji support
function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}


