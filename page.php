<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

//$container = get_theme_mod( 'understrap_container_type' );
$banner_bg = get_field('banner_background');
$banner_copy = get_field('banner_copy');

?>
<?php if ($banner_bg){?>
<div class="banner" style="background-image: linear-gradient(to bottom, rgba(97,167,158,.7), rgba(132,114,125,.7)), url('<?php echo $banner_bg; ?>');">
		<div class="banner-copy">
            <?php echo $banner_copy; ?>
        </div>
</div>
<?php } else { ?>
<div class="half-banner" style="background-image: linear-gradient(to bottom, rgba(97,167,158,.7), rgba(132,114,125,.7));">
	<div class="banner-copy">
		<?php echo $banner_copy; ?>
    </div>
</div>
<?php }?>
<div class="animate" id="page-wrapper" data-animation="animated fadeInUp">

	<div class="page-content container" id="content" tabindex="-1">
		<div class="row">

			<!-- Do the left sidebar check -->
			<?php //get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
			<h1 class="pad"><?php the_title(); ?></h1>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php //get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer();
