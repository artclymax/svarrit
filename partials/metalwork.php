<?php 
$title = get_field('metalwork_title') ?? '';
$descr = get_field('metalwork_descr') ?? '';
$label = get_field('metalwork_label') ?? '';
$list = get_field('metalwork_list') ?? '';
?>
<?php if (!empty($list)): ?>
	<section class="section metalwork" id="metalwork">
		<div class="container metalwork__container">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr,
			]); ?>
			<ul class="metalwork__list grid box-decor">
				<?php foreach ($list as $item): ?>
					<li class="metalwork__item metalwork-item">
						<a class="metalwork-item__link-wrapper" href="<?php echo esc_attr($item['link']['url'] ?? '') ?>">
							<div class="metalwork-item__image image-box">
								<?php if (!empty($item['image']['url'])): ?>
									<img src="<?= esc_attr($item['image']['url']) ?>" alt="<?= esc_attr($item['image']['alt'] ?? '') ?>">
								<?php endif; ?>
							</div>
							<div class="metalwork-item__content">
								<?php if (!empty($item['icon'])): ?>
									<div class="metalwork-item__icon title-4">
										<?php echo wp_get_attachment_image(
											$item['icon']['ID'],
											'large',
											false,
											array(
												'class' => 'img',
												'alt' => $item['icon']['alt'] ?: $item['title']
											)
										); ?>
									</div>
								<?php endif; ?>

								<h3 class="metalwork-item__title title-4">
									<?php echo esc_html($item['title']) ?>
								</h3>
								<?php if (!empty($item['descr'])): ?>
									<div class="metalwork-item__descr descr">
										<?php echo wp_kses_post($item['descr']) ?>
									</div>
								<?php endif; ?>
								<span class="metalwork-item__link link-arrow">
									<?php echo esc_html($item['link']['title']) ?>
								</span>
							</div>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
<?php endif; ?>