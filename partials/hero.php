<?php
$label = get_field('hero_label') ?? '';
$title = get_field('hero_title') ?? '';
$descr = get_field('hero_descr') ?? '';
$btn_first = get_field('hero_btn_first') ?? '';
$btn_second = get_field('hero_btn_second') ?? '';
$image = get_field('hero_image') ?? '';
?>
<section class="hero jarallax" id="hero">
	<div class="container hero__container">
		<div class="hero__wrapper">
			<?php if (!empty($label)): ?>
				<p class="hero__label label">
					<?php echo esc_html($label) ?>
				</p>
			<?php endif; ?>
			<h1 class="hero__title title-1">
				<?php echo esc_html($title) ?>
			</h1>
			<?php if (!empty($descr)): ?>
				<div class="hero__descr descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
			<?php endif; ?>
			<?php if (!empty($btn_first) || !empty($btn_second)): ?>
				<div class="hero__btn-box">
					<?php if (!empty($btn_first)): ?>
						<a class="hero__btn btn btn--arrow" href="<?= esc_attr($btn_first['url']) ?>">
							<span>
								<?php echo esc_html($btn_first['title']) ?>
							</span>
						</a>
					<?php endif; ?>
					<?php if (!empty($btn_second)): ?>
						<a class="hero__btn btn btn--stroke" href="<?= esc_attr($btn_second['url']) ?>">
							<?php echo esc_html($btn_second['title']) ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php get_template_part('partials/hero-benefits', null, ['class' => 'hidden-mobile']); ?>
		</div>
	</div>
	<?php if (!empty($image)): ?>
		<div class="hero__image image-box jarallax-img">
			<?php echo wp_get_attachment_image(
				$image['ID'],
				'large',
				false,
				array(
					'class' => 'img',
					'alt' => $image['alt'] ?: ''
				)
			); ?>
		</div>
	<?php endif; ?>
</section>
<div class="hero-benefits-mobile visible-mobile">
	<div class="container">
		<?php get_template_part('partials/hero-benefits'); ?>
	</div>
</div>