<article class="article-small" data-aos="fade-up" data-aos-offset="10">
    <div class="title text-center mb-2">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>
    <a href="<?php the_permalink(); ?>" class="thumbnail">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium', array('class' => 'img-fluid')); ?>" alt="thumbnail" class="img-fluid">
    </a>
    <div class="text-center mt-1">
        <p><?php the_excerpt(); ?></p>
    </div>
    <div class="row mt-3 align-items-end">
        <div class="col-7"></div>
        <div class="col-5 text-right">
            <a href="<?php the_permalink(); ?>"
               class="read-more"><?php _e('read more', 'custom'); ?></a>
        </div>
    </div>
</article>