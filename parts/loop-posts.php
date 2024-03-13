<div class="single-blog-in-archive-wrapper col-12 col-md-6 col-xl-4">
    <div class="taxonomy-btns">
        <?php if ($categories = get_the_category()) : ?>
            <?php foreach ($categories as $category) : ?>
                <a class="btn-taxonomy <?php echo $category->slug ?>" href="#">
                    <?php echo $category->name; ?>
                </a>
            <?php endforeach;
        endif ?>
    </div>
    <a class="single-blog-in-archive" href="<?php the_permalink(); ?>">
        <div class="top-image-wrapper">
            <?php the_post_thumbnail('large', array('class' => 'projecten__slider--thumbnail')); ?>
        </div>
        <p class="post-date"><?php echo get_the_date('d-m-Y'); ?></p>
        <?php the_title('<h6 class="blog-title">', '</h6>'); ?>
        <p class="blog-excerpt"><?php echo get_the_excerpt() ?></p>
        <div class="more-info"><span>Meer Informatie</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16" fill="none">
                <path d="M5.68248e-07 8L20 8M20 8L13.5 1.5M20 8L13.5 14.5" stroke="#36A9E1" stroke-width="1.6" />
            </svg>
        </div>
    </a>

</div>