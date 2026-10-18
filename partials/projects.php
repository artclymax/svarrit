<?php
$label = get_field('projects_label');
$title = get_field('projects_title');
$descr = get_field('projects_descr');
$cta = get_field('projects_cta');
$gallery = get_field('projects_gallery');
?>
<?php if (!empty($descr) || !empty($cta) || !empty($gallery)): ?>
	<section class="section projects" id="projects">
		<div class="container projects__container">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr,
				'class' => 'decor-line-2'
			]); ?>
		</div>
		<?php if (!empty($gallery)): ?>
			<div class="container projects__slider-container">
				<div class="projects__slider box-decor">
					<div class="swiper projects-swiper"
						data-swiper="{'slidesPerView': 'auto', 'spaceBetween': 12, 'rewind': true, 'breakpoints': { '768': { 'spaceBetween': 24 } }}">
						<div class="swiper-wrapper projects-swiper__wrapper">
							<?php foreach ($gallery as $item): ?>
								<?php if (!empty($item)): ?>
									<div class="swiper-slide projects-slide">
										<a class="projects-slide__wrapper-link image-box" href="<?= esc_attr($item['url']) ?>"
											data-fancybox="projects-gallery">
											<?php echo wp_get_attachment_image(
												$item['ID'],
												'large',
												false,
												array(
													'class' => 'img',
													'alt' => $item['alt'] ?: ''
												)
											); ?>
										</a>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
						<div class="swiper-pagination projects-swiper__pagination" data-swiper-pagination=".projects-swiper"></div>

					</div>
					<button class="swiper-btn swiper-btn__prev projects-swiper__btn projects-swiper__btn-prev" type="button"
						aria-label="Назад" data-swiper-btn-prev=".projects-swiper">
					<img src="<?= esc_url(get_template_directory_uri() . '/assets/images/icons/swiper-btn-prev.svg')?>" alt=""></button>
					<button class="swiper-btn swiper-btn__next projects-swiper__btn projects-swiper__btn-next" type="button"
						aria-label="Вперёд" data-swiper-btn-next=".projects-swiper">
					<img src="<?= esc_url(get_template_directory_uri() . '/assets/images/icons/swiper-btn-next.svg')?>" alt=""></button>
				</div>
			</div>
		<?php endif; ?>
		<?php if (!empty($cta)): ?>
			<div class="container projects__container">
				<?php
				$cta_image = $cta['image'] ?? '';
				$cta_title = $cta['title'] ?? '';
				$cta_descr = $cta['descr'] ?? '';
				$cta_btn = $cta['btn'] ?? '';

				get_template_part('partials/cta-block', null, [
					'image' => $cta_image,
					'title' => $cta_title,
					'descr' => $cta_descr,
					'btn' => $cta_btn
				]); ?>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>