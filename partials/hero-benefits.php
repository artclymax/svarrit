<?php
$list = get_field('hero_benefits') ?: [];
$class = $args['class'] ?? '';
?>
<?php if (!empty($list)): ?>
	<ul class="hero-benefits <?= esc_attr($class); ?>">
		<?php foreach ($list as $item): ?>
			<li class="hero-benefits__item hero-benefits-item">
				<?php if (!empty($item['image'])): ?>
					<div class="hero-benefits-item__image">
						<?php echo wp_get_attachment_image(
							$item['image']['ID'],
							'large',
							false,
							array(
								'class' => 'img',
								'alt' => $item['image']['alt'] ?: $item['title']
							)
						); ?>
					</div>
				<?php endif; ?>
				<?php if (!empty($item['title'])): ?>
					<h3 class="hero-benefits-item__title title-3">
						<?php echo esc_html($item['title']) ?>
					</h3>
				<?php endif; ?>
				<?php if (!empty($item['descr'])): ?>
					<div class="hero-benefits-item__descr descr">
						<?php echo wp_kses_post($item['descr']) ?>
					</div>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>