<?php
// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'last-projects-slider';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

?>
<section class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <h3>HELLO FROM ACF</h3>
    </div>
</section>