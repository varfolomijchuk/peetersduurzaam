<div class="single-project col-12 col-md-6 col-xl-4">
    <div class="taxonomy-btns">
        <?php if ($tags = get_the_tags()) : ?>
            <?php foreach ($tags as $tag) : ?>
                <a class="btn-taxonomy <?php echo $tag->slug ?>" href="#">
                    <?php echo $tag->name; ?>
                </a>
            <?php endforeach;
        endif ?>
        <?php if ($categories = get_the_category()) : ?>
            <?php foreach ($categories as $category) : ?>
                <a class="btn-taxonomy <?php echo $category->slug ?>" href="#">
                    <?php echo $category->name; ?>
                </a>
            <?php endforeach;
        endif ?>
    </div>
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('large', array('class' => 'projecten__slider--thumbnail')); ?>
        <div class="overlay overlay-project"></div>
        <?php the_title('<h4>', '</h4>'); ?>
    </a>

</div>
