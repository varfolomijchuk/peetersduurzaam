<?php
/**
 * @var $small_title string
 * @var $title string
 * @var $text string
 * @var $buttons array
 * @var $image int
 * @var $image_position bool
 */
if ($title || $text || $image) : ?>
    <section class="single-post__image-text">
        <div class="container">
            <div class="row">
                <?php if ($title || $text) : ?>
                    <div class="<?php echo $image ? 'col-12 col-lg-6' : 'col' ?><?php echo $image_position ? ' order-lg-2 order-1' : null; ?>">
                        <div class="text-wrapper<?php echo $image_position ? ' ml-auto': null; ?>">
                            <?php if ($small_title) : ?>
                                <span class="small-title"><?php echo $small_title; ?></span>
                            <?php endif; ?>

                            <?php echo $title ? '<h2>' . $title . '</h2>' : null; ?>

                            <?php echo $text ?: null; ?>

                            <?php if ($buttons) : ?>
                                <div class="buttons-wrapper">
                                    <?php foreach ($buttons as $key => $button) :
                                        $btn = $button['button'];
                                        ?>
                                        <a href="<?php echo $btn['url'] ?: '#'; ?>"
                                           class="p-btn-primary"
                                           aria-label="<?php echo $btn['title'] ?: __('Button', 'unittheme') ?>"
                                           target="<?php echo $btn['target'] ?: '_self'; ?>"
                                        >
                                            <?php echo $btn['title'] ?: __('Button', 'unittheme') ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($image) : ?>
                    <div class="col-12 col-lg-6 order-2 order-lg-1">
                        <div class="image-wrapper">
                            <?php echo wp_get_attachment_image($image, 'large'); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

