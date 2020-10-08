<?php 
	$insta = get_option('insta_link');
	$twitter = get_option('twitter_link');
	$fb = get_option('fb_link');
	$linked = get_option('linkedin_link');
	$footer_content = get_option('footer_content');
?>
<footer class="footer container-fluid" id="footer-wrapper">
	<div class="row">
		<div class="col-md-12 footer-logo">
		<a href="<?php echo site_url(); ?>">
			<svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 183.75 91.66"><defs><style>.cls-1{fill:none;stroke:#272525;stroke-miterlimit:10;}.cls-2{font-size:36px;}.cls-2,.cls-3{fill:#272525;font-family:Oswald-Regular, Oswald;}.cls-3{font-size:12px;}.cls-4{letter-spacing:-0.01em;}</style></defs><title>logo-svg-2020</title><line class="cls-1" y1="75.26" x2="183.32" y2="75.65"/><line class="cls-1" x1="140.8" y1="0.85" x2="183.32" y2="75.65"/><line class="cls-1" x1="124.66" y1="27.62" x2="140.8" y2="0.85"/><line class="cls-1" x1="108.38" y1="0.75" x2="124.66" y2="27.62"/><line class="cls-1" x1="92.5" y1="28.25" x2="108.38" y2="0.75"/><line class="cls-1" x1="76.75" y1="0.25" x2="92.5" y2="28.25"/><line class="cls-1" x1="60.5" y1="28.5" x2="76.75" y2="0.25"/><line class="cls-1" x1="44.63" y1="0.75" x2="60.5" y2="28.5"/><line class="cls-1" x1="0.63" y1="75.26" x2="44.63" y2="0.75"/><line class="cls-1" x1="102.5" y1="65.83" x2="119.83" y2="36.5"/><path class="cls-1" d="M100,98.5" transform="translate(-57.5 -30.5)"/><path class="cls-1" d="M99.83,71.5" transform="translate(-57.5 -30.5)"/><path class="cls-1" d="M99.83,71.5" transform="translate(-57.5 -30.5)"/><path class="cls-1" d="M109.17,71.5" transform="translate(-57.5 -30.5)"/><path class="cls-1" d="M104.5,66.67" transform="translate(-57.5 -30.5)"/><path class="cls-1" d="M103.6,54.34" transform="translate(-57.5 -30.5)"/><text class="cls-2" transform="translate(30.67 65.12)">B</text><text class="cls-2" transform="translate(52.94 65.12)">E</text><text class="cls-2" transform="translate(74.89 65.12)">N</text><text class="cls-2" transform="translate(120.26 65.12)">G</text><text class="cls-3" transform="translate(19.69 88.22)"><tspan class="cls-4">W</tspan><tspan x="8.63" y="0">ebsite Design &amp; Development</tspan></text></svg>
		</a>
		</div>
		<div class="col-md-6 footer-content desktop-block">
			<p><?php echo $footer_content; ?></p>
			<?php if ($linked) {?>
				<a href="<?php echo esc_url($linked); ?>"><i class="fa fa-3x fa-linkedin" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ($insta) {?>
				<a href="<?php echo esc_url($insta); ?>"><i class="fa fa-3x fa-instagram" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ($twitter) { ?>
				<a href="<?php echo esc_url($twitter); ?>"><i class="fa fa-3x fa-twitter-square" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ($fb) { ?>
				<a href="<?php echo esc_url($fb); ?>"><i class="fa fa-3x fa-facebook-square" aria-hidden="true"></i></a>
			<?php } ?>
		</div>
		<div class="col-md-6 footer-nav-container">
			<div class="footer-nav">
                <?php 
                 $args = array(
					'menu'				=> 'footer-menu',
                    'menu_class'        => 'footer__list',
                    'theme_location'    => 'footer_menu',
                    'add_li_class'      => 'footer__item',
                 );    
                wp_nav_menu( $args );
                ?>
            </div>
		</div>
		<div class="col-md-6 footer-content mobile-block">
			<p><?php echo $footer_content; ?></p>
			<?php if ($linked) {?>
				<a href="<?php echo esc_url($linked); ?>"><i class="fa fa-3x fa-linkedin" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ($insta) {?>
				<a href="<?php echo esc_url($insta); ?>"><i class="fa fa-3x fa-instagram" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ($twitter) { ?>
				<a href="<?php echo esc_url($twitter); ?>"><i class="fa fa-3x fa-twitter-square" aria-hidden="true"></i></a>
			<?php } ?>
			<?php if ($fb) { ?>
				<a href="<?php echo esc_url($fb); ?>"><i class="fa fa-3x fa-facebook-square" aria-hidden="true"></i></a>
			<?php } ?>
		</div>
	</div>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/mtn-outline-white.png" style="width:100%"alt="">
</footer>
</main>
<?php wp_footer(); ?>
</body>
</html>