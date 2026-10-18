<?php 
$image = $args['image'] ?? '';
$title = $args['title'] ?? '';
$descr = $args['descr'] ?? '';
$btn = $args['btn'] ?? '';
?>
<div class="equipments-cta" style="--cta-image-bg: url('<?= $image['url'] ?>');">
	<div class="equipments-cta__wrapper">
		<?php if (!empty($title)): ?>
			<h3 class="equipments-cta__title title-3">
				<?php echo esc_html($title) ?>
			</h3>
		<?php endif; ?>
		<?php if (!empty($descr)): ?>
			<div class="equipments-cta__descr descr">
				<?php echo wp_kses_post($descr) ?>
			</div>
		<?php endif; ?>
		<?php if (!empty($btn)): ?>
			<a class="equipments-cta__btn btn btn--arrow" href="<?php echo esc_attr($btn['url']) ?>">
				<?php echo esc_html($btn['title']) ?>
			</a>
		<?php endif; ?>
	</div>
</div>