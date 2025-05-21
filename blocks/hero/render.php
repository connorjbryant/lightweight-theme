<?php
/**
 * Server-side rendering for the hero block
 */

$attributes = $attributes ?? [];
$title = isset($attributes['title']) ? esc_html($attributes['title']) : '';
$subtitle = isset($attributes['subtitle']) ? esc_html($attributes['subtitle']) : '';
$backgroundImage = isset($attributes['backgroundImage']) ? esc_url($attributes['backgroundImage']) : '';

$style = $backgroundImage ? "background-image:url('$backgroundImage');background-size:cover;background-position:center;" : '';
?>
<div class="wp-block-lightweight-theme-hero" data-aos="fade-up" style="<?php echo esc_attr($style); ?>">
  <?php if ($title): ?>
    <h1><?php echo $title; ?></h1>
  <?php endif; ?>
  <?php if ($subtitle): ?>
    <p><?php echo $subtitle; ?></p>
  <?php endif; ?>
</div>
