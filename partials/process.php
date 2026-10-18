<?php 
$label = get_field('process_label') ?? '';
$title = get_field('process_title') ?? '';
$descr = get_field('process_descr') ?? '';
$cta = get_field('process_cta') ?? '';
$list = get_field('process_list') ?? [];
?>
<?php if (!empty($list) || !empty($cta) || !empty($descr)): ?>
	<section class="section process" id="process">
		<div class="container process__container">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr,
			]); ?>
			<?php if (!empty($list)): ?>
				<ul class="process__list grid box-decor">
					<?php foreach ($list as $index => $item): ?>
						<li class="process__item process-item">
							<div class="process-item__num num"><?php echo esc_html(++$index < 9 ? '0' . $index : $index) ?></div>
							<?php if (!empty($item['image'])): ?>
								<div class="process-item__image">
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
								<h3 class="process-item__title title-3">
									<?php echo esc_html($item['title']) ?>
								</h3>
							<?php endif; ?>
							<?php if (!empty($item['descr'])): ?>
								<div class="process-item__descr descr">
									<?php echo wp_kses_post($item['descr']) ?>
								</div>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
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