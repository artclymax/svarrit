<?php
$page = 'option';

$phones = get_field('contacts_phones', $page) ?? '';

$btn = get_field('header_btn', $page) ?? [];
$text = get_field('header_text', $page) ?? '';
$class = $args['class'] ?? '';
?>

<header class="header <?= esc_attr($class) ?>" data-auto-calc="header, height">
	<div class="container header__container">
		<!-- LOGO -->
		<div class="header__logo logo">
			<?php mx_logo(); ?>
		</div>
		<!-- MENU -->
		<nav class="header__menu header-menu">

			<?php
			wp_nav_menu(array(
				'theme_location' => 'header-menu',
				'container' => false,
				'menu_class' => 'header-menu__list',
				'depth' => 1,
				'fallback_cb' => false
			));
			?>
			<div class="header-menu__box">

				<?php if ($phones): ?>
					<div class="header-menu__phones icon icon--phone">
						<ul class="header-menu__phones-list">
							<?php foreach ($phones as $phone): ?>
								<li>
									<a class="header-menu__phone link"
										href="tel:+<?php echo esc_attr(correct_phone($phone['phone'])); ?>">
										<?php echo esc_html($phone['phone']); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
				<?php if ($btn): ?>
					<a class="header-menu__btn link" href="<?php echo esc_html($btn['url']) ?>">
						<?php echo esc_html($btn['title']) ?>
					</a>
				<?php endif; ?>
			</div>
		</nav>

		<!-- VISIBLE MOBILE PHONE -->
		<?php if ($phones): ?>
			<a class="header__phone-btn phone-btn visible-tablet" aria-label="Телефон"
				href="tel:+<?php echo esc_attr(correct_phone($phones[0]['phone'])); ?>">
				<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M10.9722 6.6454C10.6978 5.72985 10.5091 4.79076 10.4085 3.84026C10.308 2.89263 9.48071 2.1875 8.52796 2.1875H4.1078C2.97077 2.1875 2.09544 3.16968 2.19526 4.3016C3.20304 15.7097 12.2903 24.7963 23.6984 25.8047C24.831 25.9045 25.8125 25.0324 25.8125 23.8954V19.9538C25.8125 18.5154 25.1074 17.6913 24.1597 17.5908C23.2093 17.4905 22.2702 17.302 21.3546 17.0278C20.8118 16.8668 20.2355 16.8557 19.6869 16.9958C19.1383 17.1358 18.6378 17.4217 18.2385 17.8231L16.3464 19.7152C12.9343 17.8666 10.1334 15.0657 8.28481 11.6536L10.1769 9.76152C10.5784 9.36229 10.8644 8.86183 11.0046 8.31322C11.1447 7.76461 11.1331 7.18829 10.9722 6.6454Z"
						fill="white" />
				</svg>
			</a>
		<?php endif; ?>

		<!-- BURGER -->
		<button class="header__burger-btn burger-btn visible-tablet" type="button" aria-label="Открыть/закрыть меню">
			<span></span>
		</button>
	</div>

</header>