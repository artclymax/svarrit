<?php
$title = get_field('docs_title') ?? '';
$descr = get_field('docs_descr') ?? '';
$label = get_field('docs_label') ?? '';
$image = get_field('docs_image') ?? '';

$args = [
	'post_type' => 'document',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_status' => 'publish'
];

$query = new WP_Query($args);
?>
<?php if ($query->have_posts()): ?>
	<section class="section docs" id="docs">
		<div class="container docs__container">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr,
				'class' => 'decor-line-3'
			]); ?>
			<div class="docs__wrapper">
				<ul class="docs__list">
					<?php while ($query->have_posts()):
						$query->the_post();
						$url = get_field('docs_single_file')['url'] ?? '';
						?>
						<li class="docs__item docs-item ">
							<a class="docs-item__link-wrapper" href="<?php echo esc_attr($url); ?>" data-fancybox>
								<span class="docs-item__icon">
									<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/docs-icon.svg') ?>" alt="<?php the_title(); ?>">
								</span>
								<div class="docs-item__content">
									<h3 class="docs-item__title title-4">
										<?php the_title(); ?>
									</h3>
									<span class="docs-item__link link-arrow">
										Посмотреть документ
									</span>
								</div>
							</a>
						</li>
					<?php endwhile;
					wp_reset_postdata();
					?>
				</ul>

				<?php if (!empty($image)): ?>
					<div class="docs__image image-box">
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
			</div>
		</div>
	</section>
<?php endif; ?>