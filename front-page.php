<?php
/**
 *  Template Name: Front Page
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$banner_img = get_field('banner_background_image');
$banner_content = get_field('banner_content');

?>
<div class="front-page-banner" style="background-image: linear-gradient(to bottom, rgba(97,167,158,.4), rgba(132,114,125,.4));">
    <div class="bg-video">
        <video style="object-fit:cover;width:100vw;height: 100vh;" class="bg-video__content" autoplay muted loop>
            <source src="<?php echo get_site_url(); ?>/wp-content/uploads/2020/04/Time-Lapse-Video-Of-Night-Sky.mp4" type="video/mp4">
            video not supported by this browser
        </video>
    </div>
        <div class="banner-copy" id="sticker" data-animation="">
        <svg class="front-page-svg-logo" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 183.75 91.66">
          <defs>
            <style>
              .cls-1{fill:none;stroke:#272525;stroke-miterlimit:10}.cls-2{font-size:36px;fill:#272525;font-family:Oswald-Regular,Oswald}
            </style>
          </defs>
          <path class="cls-1" d="M0 75.26l183.32.39M140.8.85l42.52 74.8M124.66 27.62L140.8.85M108.38.75l16.28 26.87M92.5 28.25L108.38.75M76.75.25l15.75 28M60.5 28.5L76.75.25M44.63.75L60.5 28.5M.63 75.26l44-74.51M102.5 65.83l17.33-29.33"/>
          <text class="cls-2 letters" transform="translate(30.67 65.12)">
            B
          </text>
          <text class="cls-2 letters" transform="translate(52.94 65.12)">
            E
          </text>
          <text class="cls-2 letters" transform="translate(74.89 65.12)">
            N
          </text>
          <text class="cls-2 letters" transform="translate(120.26 65.12)">
            G
          </text>
        </svg>
            <div style="display:none;" id="typed-hidden">
                <span>Web Designer and Developer</span>
                <span>SEO & PPC Campaigns</span>
                <span>Website Security and Maintenace</span>
                <span><a href="/contact">Click Here to Drop a Line!</a></span>
            </div>
            <div class="type-wrap">
                <span id="typed" style="white-space:pre;"></span>
            </div>
        </div>
</div>
<div class="d" id="page-wrapper">
    <div class="container pad front-page-content animate" data-animation="animated fadeInUp">
        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-md-12">
                <?php the_field('content_left'); ?>
            </div>
            <?php endwhile; // end of the loop. ?>
        </div>
    </div>
    <img class="page-break-img" src="<?php echo get_template_directory_uri(); ?>/assets/mtn-outline-black.png" style="width:100%"alt="">
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-12">
                <h3>Push Your Brand and Website To Peak Performance.</h3>
            </div>
        </div>
    </div>
    <div class="container-fluid three-panels animate" data-animation="animated fadeInUp">
        <div class="row panels-row">
            <div class="col-md-4">
                <div class="grid-item">
                    <div class="visble">
                        Web Design & Development
                        <i class="fa fa-5x fa-desktop" aria-hidden="true"></i>
                    </div>
                    <div class="grid-item-slide-up">
                        <h3>Web Design & Development</h3>
                        <p>Custom Designs and Custom builds, reliably built  on the WordPress CMS. No templated or Themed websites here. Give your customers a unique experience and keep them coming back.</p>
                        <a class="button ga-web-dev-button" href="/web-design-and-development/" class="button"><span>Learn More</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="grid-item">
                    <div class="visble">
                        SEO & Online Marketing
                        <i class="fa fa-5x fa-line-chart" aria-hidden="true"></i>
                    </div>
                    <div class="grid-item-slide-up">
                        <h3>SEO & Online Marketing</h3>
                        <p>Connect to Google Analytics, Webmaster Tools, MyBusiness, and Social Media to get to know your Audience. Then run targeted PPC Campaigns to increase conversions.</p>
                        <a class="button ga-seo-button" href="/seo-and-online-marketing/" class="button"><span>Learn More</span></a>
                    </div>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="grid-item">
                <div class="visble">
                    Website Maintenance & Security 
                    <i class="fa fa-5x fa-cog" aria-hidden="true"></i>
                    </div>
                    <div class="grid-item-slide-up">
                        <h3>Website Maintenance & Security</h3>
                        <p>How Protected is your site from hackers who want your valuable data? Secuirty Audits and regular Maintenace keep them out.</p>
                        <a class="button ga-maintenance-button" href="/maintenance-and-security/" class="button"><span>Learn More</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--
    <div class="banner" style="background-image: linear-gradient(to bottom, rgba(97,167,158,.7), rgba(132,114,125,.7)), url('< ?php echo $second_banner_img; ?>');">
        <div class="container pad" id="">

        </div>
    </div>
-->
<div class="banner carousel" style="background-image: linear-gradient(to bottom, rgba(97,167,158,.7), rgba(132,114,125,.7)), url('<?php echo $banner_img; ?>');">
    <div class="container">
        <div id="fp-carousel" class="carousel vert slide" data-ride="carousel">
            <div class="controls">
                <div class="title">
                    <h2>Recent Projects</h2>
                </div>
                <div class="buttons">
                    <a class="button ga-carousel-interaction" href="#fp-carousel" role="button" data-slide="next">
                        <span>Next Project</span>
                    </a>
                    <a class="button ga-portfolio-button" href="/portfolio">
                        <span>All Projects</span>
                    </a>
                </div>
            </div>
            <div class="carousel-inner">
                <?php
				$loop = new WP_Query( array(
					'post_type' => 'portfolio'
				    )
				);
                ?>
                <?php $x = 0; while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <?php 
                    $id = get_the_ID();
                    $img = get_field('recent_projects_slider_image', $id);
                    $img_url = $img['url'];
                    $img_title = $img['title'];
                ?>
                <?php if ($x == 0) { ?>
					<div class="carousel-item active">
				<?php } else { ?>
					<div class="carousel-item">
                <?php } ?>
                <div class="carousel-content">
                    <div class="carousel-left" data-animation="animated fadeInLeft">
                        <img src="<?php echo $img_url; ?>" alt="<?php echo $img_title; ?>">
                    </div>
                    <div class="carousel-right" data-animation="animated fadeInRight">
                        <h4><?php the_title(); ?></h4>
                        <?php the_excerpt(); ?>
                    </div>
                </div>
                    </div>
                <?php $x++; endwhile; wp_reset_query(); ?>
            </div>
        </div>
</div>
</div>
</div><!-- #page-wrapper -->
<?php get_footer(); ?>