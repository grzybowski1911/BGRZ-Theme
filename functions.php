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
			 <p><strong>Facebook Link:</strong><br />
				 <input type="text" name="fb_link" size="45" value="<?php echo get_option('fb_link'); ?>" />
			 </p>
			 <p><strong>Footer Content:</strong><br/>
				 <input type="text" name="footer_content" size="45" value="<?php echo get_option('footer_content'); ?>" />
			 </p>
			 <p><input type="submit" name="Submit" value="Save" /></p>
			 <input type="hidden" name="action" value="update" />
			 <input type="hidden" name="page_options" value="twitter_link,insta_link,fb_link,footer_content,linkedin_link" />
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