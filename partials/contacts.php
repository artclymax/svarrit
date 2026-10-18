<?php
$label = get_field('contacts_section_label') ?? '';
$title = get_field('contacts_section_title') ?? '';
$descr = get_field('contacts_section_descr') ?? '';
$contacts_title = get_field('contacts_box_title') ?? '';
$company = get_field('contacts_box_company') ?? '';
$company_descr = get_field('contacts_box_company_descr') ?? '';

$form_title = get_field('contacts_section_form_title') ?? '';
$form = get_field('contacts_section_form') ?? '';
$image = get_field('contacts_section_image') ?? '';

?>
<section class="section contacts" id="contacts">
	<div class="container contacts__container">
		<div class="contacts__content">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr,
				'class' => 'decor-line-2'
			]); ?>
			<div class="contacts__contacts-box contacts-box">
				<?php if (!empty($contacts_title)): ?>
					<h3 class="contacts-box__title title-4">
						<?php echo esc_html($contacts_title) ?>
					</h3>
				<?php endif; ?>
				<?php if (!empty($company)): ?>
					<h4 class="contacts-box__company">
						<?php echo esc_html($company) ?>
					</h4>
				<?php endif; ?>
				<?php if (!empty($company_descr)): ?>
					<div class="contacts-box__descr descr">
						<?php echo wp_kses_post($company_descr) ?>
					</div>
				<?php endif; ?>
				<?php get_template_part('partials/contacts-box-list'); ?>
			</div>
		</div>
		<?php if (!empty($form)): ?>
			<div class="contacts__form contacts-form">
				<?php if (!empty($form_title)): ?>
					<h3 class="contacts-form__title title-4">
						<?php echo esc_html($form_title) ?>
					</h3>
				<?php endif; ?>
				<?php echo do_shortcode($form) ?>
				<div class="contacts-form__bg"></div>
			</div>
		<?php endif; ?>
	</div>
	<?php if (!empty($image)): ?>
		<div class="contacts__image image-box">
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