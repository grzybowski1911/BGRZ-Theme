<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>
<div style="height:100px;"></div>
<div class="container">
	<div class="row">
		<div class="col-12">
			<h1 class="page-title">Dang, it looks like that page doesn't exist =(</h1>
			<img src="https://bgrzdesigns.com/wp-content/uploads/2020/05/vj2v8.jpg" alt="">
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<?php get_search_form(); ?>
		</div>
	</div>
</div>
<?php get_footer();
