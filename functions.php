<?php
/**
 * UnderStrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

// classic editor

//add_filter( 'use_block_editor_for_post', '__return_false' );

// global options

 add_action('admin_menu', 'add_global_custom_options'); 

 function add_global_custom_options() {
	 add_options_page('Global Custom Options', 'Global Custom Options', 'manage_options', 'functions','global_custom_options');
 }
 
 function global_custom_options()
 {
 ?>
	 <div class="wrap">
		 <h2>Global Custom Options</h2>
		 <form method="post" action="options.php">
			 <?php wp_nonce_field('update-options') ?>
			 <p>Settings for the global opttions across the site.</p>
			 <p><strong>LinkedIn Link:</strong><br/>
				 <input type="text" name="linkedin_link" size="45" value="<?php echo get_option('linkedin_link'); ?>" />
			 </p>
			 <p><strong>Twitter Link:</strong><br/>
				 <input type="text" name="twitter_link" size="45" value="<?php echo get_option('twitter_link'); ?>" />
			 </p>
			 <p><strong>Instagram Link:</strong><br />
				 <input type="text" name="insta_link" size="45" value="<?php echo get_option('insta_link'); ?>" />
			 </p>
			 <p><strong>Github Link:</strong><br />
				 <input type="text" name="github_link" size="45" value="<?php echo get_option('github_link'); ?>" />
			 </p>
			 <p><strong>Facebook Link:</strong><br />
				 <input type="text" name="fb_link" size="45" value="<?php echo get_option('fb_link'); ?>" />
			 </p>
			 <p><strong>Footer Content:</strong><br/>
				 <input type="text" name="footer_content" size="45" value="<?php echo get_option('footer_content'); ?>" />
			 </p>
			 <p><input type="submit" name="Submit" value="Save" /></p>
			 <input type="hidden" name="action" value="update" />
			 <input type="hidden" name="page_options" value="twitter_link,insta_link,github_link,fb_link,footer_content,linkedin_link" />
		 </form>
	 </div>
 <?php
 }
 
 // Portfolio CPT 

function portfolio_cpt() {
	$labels = array(
	  'name'               => _x( 'Porfolio', 'portfolio' ),
	  'singular_name'      => _x( 'Portfolio', 'portfolio' ),
	  'add_new'            => _x( 'Add New', 'Portfolio Item' ),
	  'add_new_item'       => __( 'Add New Portfolio Item' ),
	  'edit_item'          => __( 'Edit Portfolio Item' ),
	  'new_item'           => __( 'New Portfolio Item' ),
	  'all_items'          => __( 'All Portfolio Items' ),
	  'view_item'          => __( 'View Portfolio Item' ),
	  'search_items'       => __( 'Search Portfolio Items' ),
	  'not_found'          => __( 'No Portfolio Items found' ),
	  'not_found_in_trash' => __( 'No Portfolio Items found in the Trash' ),
	  'menu_name'          => 'Portfolio Items',
	);
	$args = array(
	  'labels'              => $labels,
	  'description'         => 'Portfolio Items',
	  'public'              => true,
	  'publicly_queryable'  => true,
	  'menu_position'       => 5,
	  'menu_icon'           => 'dashicons-portfolio',
	  'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
	  'has_archive'         => true,
	  'show_in_rest' 		=> true,
	  'taxonomies'  => array( 'types' )
	);
	register_post_type( 'portfolio', $args ); 
  }
  add_action( 'init', 'portfolio_cpt' );

  function portfolio_taxonomy() {
	$category_labels = array(
	 'name'               => _x( 'Portfolio', 'portfolio_category' ),
	 'singular_name'      => _x( 'Portfolio Category', 'portfolio_category' ),
	 'add_new'            => _x( 'Add New', 'Portfolio Category' ),
	 'add_new_item'       => __( 'Add New Portfolio Category' ),
	 'edit_item'          => __( 'Edit Portfolio Category' ),
	 'new_item'           => __( 'New Portfolio Category' ),
	 'all_items'          => __( 'All Portfolio Categories' ),
	 'view_item'          => __( 'View Portfolio Category' ),
	 'search_items'       => __( 'Search Portfolio Categories' ),
	 'not_found'          => __( 'No Portfolio Category found' ),
	 'not_found_in_trash' => __( 'No Portfolio Category found in the Trash' ),
	 'menu_name'          => 'Portfolio Categories',
	 );
   register_taxonomy(
	   'portfolio_category',  // name of the taxonomy. 
	   'portfolio',             // post type name
	   array(
		   'hierarchical' => false,
		   'labels' => $category_labels, //custom labels
		   'query_var' => true,
		   'rewrite' => array(
			   'slug' => 'portfolio_category',    // This controls the base slug that will display before each term
			   'with_front' => false  // Don't display the category base before
		   )
	   )
   );
 }
 add_action( 'init', 'portfolio_taxonomy');

  // blocks

  function acf_banner_block() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'banner-block',
			'title'				=> __('Banner Block'),
			'description'		=> __('Custom Banner Image Block'),
			'render_template'	=>  'blocks/banner-block.php',
			'category'			=> 'layout',
			'icon'				=> 'format-image',
			'keywords'			=> array( 'banner' ),
		));
	}
}

add_action('acf/init', 'acf_banner_block');

function custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// customize login page
 
function my_login_logo() { ?>
	<style type="text/css">
		#login h1 a, .login h1 a {
			background-image: url('/wp-content/uploads/2020/05/logo-2020.png');
			height: 200px;
			width: 300px;
			background-size: 300px 200px;
			background-repeat: no-repeat;
			padding-bottom: 30px;
		}
		#login a, #login p, .login #nav a, .login #nav p {
			color: white !important;
		}
		.login #login_error, .login .message, .login .success {
			background: white !important;
			border-left: 4px solid #27c9b8 !important;
			color: black !important;
		}
		.login form {
			border-radius: 20px;
			background: black !important;
			color: white !important;
			border: none !important;
		}
		.wp-core-ui .button-primary {
			color: black !important;
			background: white !important;
			border: none !important;
		}
		.bg-video {
			background-size: cover;
			position: absolute;
			bottom: 0;
			left: 0;
			height: 100%;
			width: 100%;
			z-index: -1;
			overflow: hidden;
		}
	</style>
 <?php }
  
 add_action( 'login_enqueue_scripts', 'my_login_logo' );
  
function custom_bg () {
	echo '<div  style="background-image: linear-gradient(to bottom, rgba(97,167,158,.4), rgba(132,114,125,.4));"><div class="bg-video">
				<video style="object-fit:cover;width:100vw;height: 100vh;" class="bg-video__content" autoplay="" muted="" loop="">
				<source src="/wp-content/uploads/2020/04/Time-Lapse-Video-Of-Night-Sky.mp4" type="video/mp4">
				video not supported by this browser
			</video>
			</div></div>';
	}
		 
add_action('login_header', 'custom_bg');
		 
function new_logo_login_url($url) {
	   return '/';
	}
		 
add_filter( 'login_headerurl', 'new_logo_login_url' );