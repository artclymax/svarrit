<?php
$label = get_field('equipments_label');
$title = get_field('equipments_title');
$descr = get_field('equipments_descr');
$cta = get_field('equipments_cta');
$link = get_field('equipments_link');

$args = [
	'post_type' => 'equipment',
	'posts_per_page' => -1, // все записи
	'orderby' => 'menu_order',
	'order' => 'ASC'
];

$query = new WP_Query($args);
?>
<?php if ($query->have_posts()): ?>
	<section class="section equipments" id="equipments">
		<div class="container equipments__container">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr,
			]); ?>

			<ul class="equipments__list grid">
				<?php
				$index = 1;
				while ($query->have_posts()):
					$query->the_post();
					?>
					<li class="equipments__item equipments-item">
						<a class="equipments-item__link-wrapper" href="<?php echo esc_attr($link['url']) ?>"
							data-modal-input-data="<?php echo esc_attr(get_the_title()); ?>">
							<?php if (has_post_thumbnail()): ?>
								<div class="equipments-item__image image-box">
									<?php the_post_thumbnail('large', ['class' => 'img', 'alt' => get_the_title()]); ?>
								</div>
							<?php endif; ?>
							<div class=" equipments-item__content">
								<div class="equipments-item__num num">
									<?php echo esc_html($index < 9 ? 0 . $index : $index) ?>
								</div>
								<h3 class="equipments-item__title title-4">
									<?php the_title(); ?>
								</h3>
								<div class="equipments-item__descr descr">
									<?php the_content(); ?>
								</div>
								<?php if (!empty($link)): ?>
									<span class="equipments-item__link link-arrow">
										<?php echo esc_html($link['title']) ?>
									</span>
								<?php endif; ?>
							</div>
						</a>
					</li>
					<?php
					$index++;
				endwhile;
				wp_reset_postdata();
				?>
			</ul>

			<?php if (!empty($cta)):
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
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>