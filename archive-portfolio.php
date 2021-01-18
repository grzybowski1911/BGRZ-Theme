<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

function create_taxonomy_select($tax) {
    $args = array( 'hide_empty' => false );
    $industries = get_terms($tax, $args);
    $tax_name = ucfirst(str_replace("portfolio_", "", $tax));
    $select_industry = '<input class="tax-list" id="'. $tax .'-container" list="' . $tax . '" placeholder="Search By '. $tax_name .'">';
    $select_industry .= '<datalist id="' . $tax . '">';
    foreach ( $industries as $term ) {
            $select_industry .= '<option data-value="' . $term->slug . '">' . $term->name . '</option>';
        }
    $select_industry .= '</datalist>';
    $select_industry .= '<input type="hidden" name="' . $tax . '" id="' . $tax . '-hidden">';
    return $select_industry;
}

?>
<div class="half-banner" style="background-image: linear-gradient(to bottom, rgba(97,167,158,.7), rgba(132,114,125,.7));">
	<div class="banner-copy">
		<h2>Portfolio </h2>
    </div>
	<div class="search-container">
	<form role="search" action="<?php echo home_url( '/' ); ?>" method="get" class="portfolio_searchForm" autocomplete="off">
	<input type="hidden" name="post_type" value="portfolio" />
		<div class="searchForm__inputs">
		<?php 
			echo create_taxonomy_select('portfolio_category');
		?>
			<input type="hidden">
			<input type="submit" class="input input_button" id="search__button" value="Search">
		</div>
		<div class="searchResults" id="searchResults"></div>
	</form>
</div>
</div>
<div class="animate" id="page-wrapper" data-animation="animated fadeInUp">
<div class="page-content container" id="archive-wrapper">
<div class="row">
			<?php
				$loop = new WP_Query( array(
					'post_type' => 'portfolio'
				    )
				);
				?>
				<?php 
				$x = 0; while ( $loop->have_posts() ) : $loop->the_post(); 
				$post_id = get_the_ID();
				$featured_img_url = get_the_post_thumbnail_url($post_id,'full'); 
				?>
				<?php if ($x == 0) { ?>
					<div class="col-md-12 portfolio-slide-up" style="background-image:url('<?php echo $featured_img_url; ?>);">
					<div class="slide-intro">
						<h4><?php the_title(); ?></h3>
						<h3><?php the_field('tag_line', $post_id); ?></h3>
					</div>
						<div class="slide-up-content">
							<br>
							<a href="<?php the_permalink();?> " class="button">
								<span>Learn More &rarr;</span>
							</a>
						</div>
					</div>
				<?php } else { ?>
					<div class="col-md-6 portfolio-slide-up" style="background-image:url('<?php echo $featured_img_url; ?>);">
					<div class="slide-intro">
						<h4><?php the_title(); ?></h3>
						<p><?php the_field('tag_line', $post_id); ?></p>
					</div>
						<div class="slide-up-content">	
							<a href="<?php the_permalink();?> " class="button">
								<span>Learn More &rarr;</span>
							</a>
						</div>
					</div>
				<?php } ?>
					<!--<div class="grid-item">
						< ?php the_post_thumbnail('full'); ?>
							<div class="grid-item-slide-up">
								<h3>< ?php the_title(); ?></h3>
								<br>
								<a href="< ?php the_permalink();?> " class="button">
									<span>Learn More &rarr;</span>
								</a>
                            </div>
					</div>-->
                <?php $x++; endwhile; wp_reset_query(); ?>

</div><!-- #archive-wrapper -->
</div>
</div>
<script>

document.addEventListener("DOMContentLoaded", function(){
    var inputs = document.getElementsByClassName('tax-list');

    for (i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', function(e) {
            var input = e.target,
            list = input.getAttribute('list'),
            hiddenInput = document.getElementById(list + '-hidden'),
            options = document.querySelectorAll('#' + list + ' option'),
            inputValue = input.value;
            for(var i = 0; i < options.length; i++) {
                var option = options[i];
                if(option.innerText === inputValue) {
                    hiddenInput.value = option.getAttribute('data-value');
                    break;
                }
            }
        });
    }
});
</script>
<?php get_footer();
