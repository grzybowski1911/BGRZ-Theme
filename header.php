<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$logo_id = get_theme_mod( 'custom_logo' );
$logo_url = wp_get_attachment_image_src( $logo_id , 'full' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<meta property="og:title" content="Ben Grzybowski's Portfolio" />
  	<meta property="og:description" content="Web Design and Development in Portland Oregon" />
  	<meta property="og:url" content="https://bgrzdesigns.com/" />
  	<meta property="og:image" content="https://bgrzdesigns.com/wp-content/uploads/2020/05/website-preview.png" />
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MCXM4TH');</script>
	<!-- End Google Tag Manager -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-104739030-2"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-104739030-2');
	</script>
	<!-- End Google Analytics -->
	<script>
		(function($) {
        //check if item is in viewport function
		//have to run this immeadiately, possibly refactor so it's not so ugly 
        $.fn.isInViewport = function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            return elementBottom > viewportTop && elementTop < viewportBottom;
        };
        //if elements with animate class is present, do stuff
        if ($('.animate')) {
            $(window).on('load resize scroll', function() {
            $('.animate').each(function() {
                if ($(this).isInViewport()) {
                    //var animEndEv = 'webkitAnimationEnd animationend';
                    var $animationType = $(this).data('animation');
                    $(this).addClass($animationType);
                    //console.log('yea');
                } else {
                    //$(this).removeClass($animationType);
                    //console.log('nah');
                }
            });
            });
		}
	})( jQuery );
	</script>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MCXM4TH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

<!-- ******************* The Navbar Area ******************* -->
<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
<nav class="navbar navbar-expand-md">
	<div class="nav-logo">
		<a href="<?php echo site_url(); ?>">
			<svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 183.75 91.66"><defs><style>.cls-123{fill:none;stroke:#272525;stroke-miterlimit:10;}.cls-322{font-size:36px;}.cls-322,.cls-3{fill:#272525;font-family:Oswald-Regular, Oswald;}.cls-3{font-size:12px;}.cls-4{letter-spacing:-0.01em;}</style></defs><title>logo-svg-2020</title><line class="cls-123" y1="75.26" x2="183.32" y2="75.65"/><line class="cls-123" x1="140.8" y1="0.85" x2="183.32" y2="75.65"/><line class="cls-123" x1="124.66" y1="27.62" x2="140.8" y2="0.85"/><line class="cls-123" x1="108.38" y1="0.75" x2="124.66" y2="27.62"/><line class="cls-123" x1="92.5" y1="28.25" x2="108.38" y2="0.75"/><line class="cls-123" x1="76.75" y1="0.25" x2="92.5" y2="28.25"/><line class="cls-123" x1="60.5" y1="28.5" x2="76.75" y2="0.25"/><line class="cls-123" x1="44.63" y1="0.75" x2="60.5" y2="28.5"/><line class="cls-123" x1="0.63" y1="75.26" x2="44.63" y2="0.75"/><line class="cls-123" x1="102.5" y1="65.83" x2="119.83" y2="36.5"/><path class="cls-123" d="M100,98.5" transform="translate(-57.5 -30.5)"/><path class="cls-123" d="M99.83,71.5" transform="translate(-57.5 -30.5)"/><path class="cls-123" d="M99.83,71.5" transform="translate(-57.5 -30.5)"/><path class="cls-123" d="M109.17,71.5" transform="translate(-57.5 -30.5)"/><path class="cls-123" d="M104.5,66.67" transform="translate(-57.5 -30.5)"/><path class="cls-123" d="M103.6,54.34" transform="translate(-57.5 -30.5)"/><text class="cls-322" transform="translate(30.67 65.12)">B</text><text class="cls-322" transform="translate(52.94 65.12)">E</text><text class="cls-322" transform="translate(74.89 65.12)">N</text><text class="cls-322" transform="translate(120.26 65.12)">G</text><text class="cls-3" transform="translate(19.69 88.22)"><tspan class="cls-4">W</tspan><tspan x="8.63" y="0">ebsite Design &amp; Development</tspan></text></svg>
		</a>
	</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
			<div class="nav-icon">
			<div></div>
			</div>
		</button>

		<!-- The WordPress Menu goes here -->
		<?php wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		); ?>

</nav><!-- .site-navigation -->

</div><!-- #wrapper-navbar end -->
<div class="contact-btn">
	<i class="fa fa-envelope-o" aria-hidden="true"></i>
	<a class="ga-contact-button" href="/contact/">Drop a Line</a>
</div>