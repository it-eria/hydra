<?php
$term = get_queried_object();
$image = get_field('main_photo_page',$term);
if( !empty($image) ): ?>
<section class="banner pt-5">
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid" />
</section>
<?php endif; ?>