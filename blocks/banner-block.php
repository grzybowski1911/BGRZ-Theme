<?php 
// Create id attribute allowing for custom "anchor" value.
$id = 'banner-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'banner-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$banner_img = get_field('background_image');
$banner_copy = get_field('banner_copy');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> banner banner-block" style="background-image:url('<?php echo $banner_img ?>')">

            <?php echo $banner_copy; ?>

</div>