<?php
$title = get_field('about_title') ?? '';
$descr = get_field('about_descr') ?? '';
$label = get_field('about_label') ?? '';
$list = get_field('about_list') ?? '';
$mobile_image = get_field('about_mobile_image') ?? '';
$image = get_field('about_image') ?? '';
$btn = get_field('about_btn') ?? '';
?>
<?php if (!empty($descr) || !empty($list)): ?>
	<section class="section about jarallax" id="about">
		<div class="container about__container">
			<div class="about__content">
				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr,
					'class' => 'decor-line-2'
				]); ?>
				<?php if (!empty($mobile_image)): ?>
					<div class="about__mobile-image image-box visible-mobile">
						<?php echo wp_get_attachment_image(
							$mobile_image['ID'],
							'large',
							false,
							array(
								'class' => 'img',
								'alt' => $mobile_image['alt'] ?: '',
								'loading' => 'lazy'
							)
						); ?>
					</div>
				<?php endif; ?>
				<?php if (!empty($list)): ?>
					<ul class="about__list">
						<?php foreach ($list as $item): ?>
							<li class="about__item about-item">
								<?php if (!empty($item['image'])): ?>
									<div class="about-item__image">
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
								<div class="about-item__content">
									<h3 class="about-item__title title-3">
										<?php echo esc_html($item['title']) ?>
									</h3>
									<?php if (!empty($item['descr'])): ?>
										<div class="about-item__descr descr">
											<?php echo wp_kses_post($item['descr']) ?>
										</div>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php if (!empty($btn)): ?>
					<a class="about__btn btn btn--arrow" href="<?php echo esc_attr($btn['url']) ?>">
						<?php echo esc_html($btn['title']) ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
		<?php if (!empty($image)): ?>
			<div class="about__image image-box jarallax-img hidden-mobile" aria-hidden="true">
				<?php echo wp_get_attachment_image(
					$image['ID'],
					'large',
					false,
					array(
						'class' => 'img',
						'alt' => $image['alt'] ?: '',
						'loading' => 'lazy'
					)
				); ?>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>