<?php 
$page = 'option';

$phones = get_field('contacts_phones', $page) ?? '';
$emails = get_field('contacts_emails', $page) ?? '';
$address = get_field('contacts_address', $page) ?? '';
$time = get_field('contacts_time', $page) ?? '';
$has_icon = $args['has_icon'] ?? true;
?>
<ul class="contacts-box-list">
	<?php if (!empty($phones)): ?>
		<li class="contacts-box-list__item <?php echo $has_icon ? 'icon icon--phone' : ''?>">
			<ul class="contacts-box-list__sublist">
				<?php foreach ($phones as $phone): ?>
					<li class="contacts-box-list__subitem">
						<a class="contacts-box-list__link link" href="tel:+<?= esc_attr(correct_phone($phone['phone'])) ?>">
							<?= esc_html($phone['phone']) ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</li>
	<?php endif; ?>
	<?php if (!empty($emails)): ?>
		<li class="contacts-box-list__item <?php echo $has_icon ? 'icon icon--email' : ''?>">
			<ul class="contacts-box-list__sublist">
				<?php foreach ($emails as $email): ?>
					<li class="contacts-box-list__subitem">
						<a class="contacts-box-list__link link" href="tel:+<?= esc_attr($email['email']) ?>">
							<?= esc_html($email['email']) ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</li>
	<?php endif; ?>
	<?php if (!empty($address)): ?>
		<li class="contacts-box-list__item <?php echo $has_icon ? 'icon icon--address' : ''?>">
			<address class="contacts-box-list__descr descr">
				<?php echo wp_kses_post($address) ?>
			</address>
		</li>
	<?php endif; ?>
	<?php if (!empty($time)): ?>
		<li class="contacts-box-list__item <?php echo $has_icon ? 'icon icon--time' : ''?>">
			<div class="contacts-box-list__descr descr">
				<?php echo wp_kses_post($time) ?>
			</div>
		</li>
	<?php endif; ?>
</ul>