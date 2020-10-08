<?php
/**
 * The template for displaying all single posts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="half-banner" style="background-image: linear-gradient(to bottom, rgba(97,167,158,.7), rgba(132,114,125,.7));">
	<div class="banner-copy">
		<h3><?php the_field('tag_line', $post_id); ?></h3>
    </div>
</div>
<div class="wrapper" id="single-wrapper">

	<div class="page-content container" id="content" tabindex="-1">

		<div class="row">
			<div class="col-md-8">
			<main class="site-main" id="main">
			<h1 class="pad"><?php the_title(); ?></h1>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>
					<?php understrap_post_nav(); ?>

				<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
			</div>
			<div class="col-md-4 side-bar" id="sticker">
				<h4>Learn about my Specialized Web Services</h4>
				<div class="side-bar-cta">
					Web Design & Development
					<i class="fa fa-2x fa-desktop" aria-hidden="true"></i>
					<div class="slide-up">
						<a class="button ga-web-dev-button" href="/web-design-and-development/"><span>Learn More</span></a>
					</div>
				</div>
				<div class="side-bar-cta">
					SEO & Online Marketing
                    <i class="fa fa-2x fa-line-chart" aria-hidden="true"></i>
					<div class="slide-up">
						<a class="button ga-seo-button" href="/seo-and-online-marketing/"><span>Learn More</span></a>
					</div>
				</div>
				<div class="side-bar-cta">
					Website Maintenance & Security 
                    <i class="fa fa-2x fa-cog" aria-hidden="true"></i>
					<div class="slide-up">
						<a class="button ga-maintenance-button" href="/maintenance-and-security/"><span>Learn More</span></a>
					</div>
				</div>
			</div>
		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php get_footer();
