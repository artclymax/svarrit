<?php

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Контактные данные',
		'menu_title' => 'Контактные данные',
		'menu_slug' => 'opt-contacts',
	));

	//acf_add_options_page(array(
	//	'page_title' => 'Общие поля товаров',
	//	'menu_title' => 'Общие поля товаров',
	//	'menu_slug' => 'opt-products',
	//));

	acf_add_options_page(array(
		'page_title' => 'Шапка',
		'menu_title' => 'Шапка',
		'menu_slug' => 'opt-header',
	));

	acf_add_options_page(array(
		'page_title' => 'Подвал / Футер',
		'menu_title' => 'Подвал / Футер',
		'menu_slug' => 'opt-footer',
	));

	acf_add_options_page(array(
		'page_title' => 'Модальные окна',
		'menu_title' => 'Модальные окна',
		'menu_slug' => 'opt-modals',
	));

	acf_add_options_page(array(
		'page_title' => 'Страница благодарности',
		'menu_title' => 'Страница благодарности',
		'menu_slug' => 'opt-thank_you',
	));

	acf_add_options_page(array(
		'page_title' => 'Страница 404',
		'menu_title' => 'Страница 404',
		'menu_slug' => 'opt-page-404',
	));

}

// OPTIONS
add_action('acf/init', function () {
	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	// HEADER
	acf_add_local_field_group(array(
		'key' => 'group_header_settings',
		'title' => 'Поля шапки',
		'fields' => array(
			array(
				'key' => 'field_header_info_message',
				'name' => 'header_info_message',
				'type' => 'message',
				'message' => '<b>Логотип</b> - перейдите в Панель управления сайтом > Основные настройки > Логотип сайта.<br/><b>Меню</b> - перейдите в Панель управления сайтом > Меню > Меню шапки.<br/><b>Контакты</b> - перейдите в Панель управления сайтом > Редактирование контента > Основные секции > Контактные данные.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			// Кнопка
			array(
				'key' => 'field_header_btn',
				'label' => 'Кнопка в шапке',
				'name' => 'header_btn',
				'type' => 'link',
				'instructions' => 'Ссылка на модальное окно (якорь #modal-call) или страницу.',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-header',
				),
			),
		),
	));

	// FOOTER
	acf_add_local_field_group(array(
		'key' => 'flds_opt_footer',
		'title' => 'Поля футера',
		'fields' => array(
			array(
				'key' => 'footer_info_message',
				'name' => 'footer_info_message',
				'type' => 'message',
				'message' => '<b>Логотип</b> - перейдите в Панель управления сайтом > Основные настройки > Логотип сайта.<br/><b>Меню</b> - перейдите в Панель управления сайтом > Меню > Меню шапки / футера.<br/><b>Контакты</b> - перейдите в Панель управления сайтом > Редактирование контента > Основные секции > Контактные данные.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			array(
				'key' => 'footer_descr',
				'name' => 'footer_descr',
				'label' => 'Описание',
				'type' => 'textarea',
				'new_lines' => 'wpautop',
				'rows' => 2,
			),
			array(
				'key' => 'footer_company',
				'name' => 'footer_company',
				'label' => 'Название компании',
				'type' => 'text',
			),
			array(
				'key' => 'footer_copy',
				'name' => 'footer_copy',
				'label' => 'Копирайт',
				'type' => 'text',
			),
			array(
				'key' => 'footer_links',
				'name' => 'footer_links',
				'label' => 'Ссылки',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'footer_links_link',
						'name' => 'footer_links_link',
						'label' => 'Ссылка',
						'type' => 'link',
					),
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-footer',
				),
			),
		),
	));

	// CONTACTS
	acf_add_local_field_group(array(
		'key' => 'group_contacts_page',
		'title' => 'Страница: Контакты',
		'fields' => array(
			array(
				'key' => 'field_contacts_tab_phones',
				'label' => 'Телефон',
				'name' => 'contacts_tab_phones',
				'type' => 'tab',
			),
			array(
				'key' => 'field_contacts_phones',
				'label' => 'Телефоны',
				'name' => 'contacts_phones',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_contact_phone_number',
				'button_label' => 'Добавить телефон',
				'sub_fields' => array(
					array(
						'key' => 'field_contact_phone_number',
						'label' => 'Номер телефона',
						'name' => 'phone',
						'type' => 'text',
					),
				)
			),
			array(
				'key' => 'field_contacts_tab_email',
				'label' => 'Email',
				'name' => 'contacts_tab_email',
				'type' => 'tab',
			),
			array(
				'key' => 'field_contacts_emails',
				'label' => 'Email адреса',
				'name' => 'contacts_emails',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_contact_email_link',
				'button_label' => 'Добавить email',
				'sub_fields' => array(
					array(
						'key' => 'field_contact_email_link',
						'label' => 'Email',
						'name' => 'email',
						'type' => 'email',
					)
				)
			),
			array(
				'key' => 'field_contacts_tab_address_time',
				'label' => 'Адрес',
				'name' => 'contacts_tab_address_time',
				'type' => 'tab',
			),
			array(
				'key' => 'field_contacts_address',
				'label' => 'Адрес',
				'name' => 'contacts_address',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_contacts_tab_time_time',
				'label' => 'Время работы',
				'name' => 'contacts_tab_time_time',
				'type' => 'tab',
			),
			array(
				'key' => 'field_contacts_time',
				'label' => 'Время работы',
				'name' => 'contacts_time',
				'type' => 'wysiwyg',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-contacts'
				)
			)
		),
		'menu_order' => 0,
	));

	// MODALS
	acf_add_local_field_group(array(
		'key' => 'group_opt_modals',
		'title' => 'Глобальные модальные окна',
		'fields' => array(
			array(
				'key' => 'field_modals_list',
				'label' => 'Список модальных окон',
				'name' => 'modals',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_modal_id',
				'button_label' => 'Добавить модальное окно',
				'sub_fields' => array(
					array(
						'key' => 'field_modal_id',
						'label' => 'ID модального окна',
						'name' => 'id',
						'type' => 'text',
						'required' => 1,
						'maxlength' => 50,
						'instructions' => 'Только латиница, цифры, дефис. Пример: <code>order-form</code>. Используется в <code>id</code> и <code>data-modal</code>.',
						'prepend' => '#',
						'character_limit' => 50,
						'allow_custom' => 0,
					),
					array(
						'key' => 'field_modal_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_modal_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'wysiwyg',
					),
					array(
						'key' => 'field_modal_shortcode',
						'label' => 'Шорткод формы',
						'name' => 'shortcode',
						'type' => 'text',
						'placeholder' => '[contact-form-7 id="123"]',
						'instructions' => 'Вставьте шорткод форм (CF7, WPForms, Forminator и свой шорткод).',
					),
					array(
						'key' => 'field_modal_image',
						'label' => 'Фон',
						'name' => 'image',
						'type' => 'image',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-modals',
				),
			),
		),
	));


	// THANK YOU
	acf_add_local_field_group(array(
		'key' => 'flds_opt_thank_you',
		'title' => 'Страница благодарности',
		'fields' => array(
			array(
				'key' => 'field_thank_you_title',
				'name' => 'thank_you_title',
				'label' => 'Заголовок',
				'type' => 'text',
			),
			array(
				'key' => 'field_thank_you_descr',
				'name' => 'thank_you_descr',
				'label' => 'Описание',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_thank_you_btn',
				'name' => 'thank_you_btn',
				'label' => 'Кнопка',
				'type' => 'link',
			),
			array(
				'key' => 'field_thank_you_image',
				'name' => 'thank_you_image',
				'label' => 'Картинка',
				'type' => 'image',
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-thank_you',
				),
			),
		),
	));

	// PAGE 404 
	acf_add_local_field_group(array(
		'key' => 'flds_opt_page_404',
		'title' => 'Страница благодарности',
		'fields' => array(
			array(
				'key' => 'field_page_404_title',
				'name' => 'page_404_title',
				'label' => 'Заголовок',
				'type' => 'text',
			),
			array(
				'key' => 'field_page_404_descr',
				'name' => 'page_404_descr',
				'label' => 'Описание',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_page_404_btn',
				'name' => 'page_404_btn',
				'label' => 'Кнопка',
				'type' => 'link',
			),
			array(
				'key' => 'field_page_404_image',
				'name' => 'page_404_image',
				'label' => 'Картинка',
				'type' => 'image',
			),
			array(
				'key' => 'field_page_404_image_404',
				'name' => 'page_404_image_404',
				'label' => 'Картинка c цифрой 404',
				'type' => 'image',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-page-404',
				),
			),
		),
	));

	// SECTIONS
});


add_action('acf/init', 'register_fields');
function register_fields()
{
	//! === HOME PAGE
	acf_add_local_field_group(array(
		'key' => 'group_hero_section',
		'title' => 'Секция: Первый экран (Hero)',
		'fields' => array(
			array(
				'key' => 'field_hero_label',
				'label' => 'Надзаголовок',
				'name' => 'hero_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_hero_title',
				'label' => 'Заголовок',
				'name' => 'hero_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_hero_descr',
				'label' => 'Описание',
				'name' => 'hero_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_hero_btn_first',
				'label' => 'Кнопка 1',
				'name' => 'hero_btn_first',
				'type' => 'link',
			),
			array(
				'key' => 'field_hero_btn_second',
				'label' => 'Кнопка 2',
				'name' => 'hero_btn_second',
				'type' => 'link',
			),
			array(
				'key' => 'field_hero_image',
				'label' => 'Изображение',
				'name' => 'hero_image',
				'type' => 'image',
				'return_format' => 'array',
			),
			array(
				'key' => 'field_hero_benefits',
				'label' => 'Преимущества',
				'name' => 'hero_benefits',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_hb_item_title',
				'button_label' => 'Добавить преимущество',
				'sub_fields' => array(
					array(
						'key' => 'field_hb_item_image',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
					),
					array(
						'key' => 'field_hb_item_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_hb_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 2,
						'new_lines' => 'wpautop',
					)
				)
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				)
			)
		),
		'menu_order' => 1,
	));

	// equipments
	acf_add_local_field_group(array(
		'key' => 'group_equipments_section',
		'title' => 'Секция: Оборудование',
		'fields' => array(
			// === Шапка секции ===
			array(
				'key' => 'field_equipments_label',
				'label' => 'Надзаголовок',
				'name' => 'equipments_label',
				'type' => 'text',
				'instructions' => 'Небольшой текст над заголовком',
			),
			array(
				'key' => 'field_equipments_title',
				'label' => 'Заголовок',
				'name' => 'equipments_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_equipments_descr',
				'label' => 'Описание',
				'name' => 'equipments_descr',
				'type' => 'wysiwyg',
				'tabs' => 'visual',
				'toolbar' => 'basic',
			),

			// === Ссылка для карточек оборудования ===
			array(
				'key' => 'field_equipments_link',
				'label' => 'Ссылка в карточках',
				'name' => 'equipments_link',
				'type' => 'link',
				'instructions' => 'Будет выводиться в каждой карточке оборудования',
			),
			array(
				'key' => 'field_equipments_note',
				'label' => 'Карточки оборудования',
				'name' => 'equipments_note',
				'type' => 'message',
				'message' => 'Карточки оборудования добавляется в меню > вкладка "Оборудование" или в меню > вкладка "Панель управления" > вкладка "Записи" > "Оборудование".<br/><a href="' . esc_url(home_url('/wp-admin/edit.php?post_type=equipment')) . '" target="_blank">Перейти</a>',
			),
			// === Блок CTA внизу секции ===
			array(
				'key' => 'field_equipments_cta',
				'label' => 'CTA-блок',
				'name' => 'equipments_cta',
				'type' => 'group',
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_equipments_cta_image',
						'label' => 'Фоновое изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
						'preview_size' => 'medium',
					),
					array(
						'key' => 'field_equipments_cta_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_equipments_cta_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'wysiwyg',
						'tabs' => 'visual',
						'toolbar' => 'basic',
					),
					array(
						'key' => 'field_equipments_cta_btn',
						'label' => 'Кнопка',
						'name' => 'btn',
						'type' => 'link',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				),
			),
		),
		'menu_order' => 2,
	));

	// about
	acf_add_local_field_group(array(
		'key' => 'group_about_section',
		'title' => 'Секция: О нас (About)',
		'fields' => array(
			// === Шапка секции ===
			array(
				'key' => 'field_about_label',
				'label' => 'Надзаголовок',
				'name' => 'about_label',
				'type' => 'text',
				'instructions' => 'Небольшой текст над заголовком',
			),
			array(
				'key' => 'field_about_title',
				'label' => 'Заголовок',
				'name' => 'about_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_about_descr',
				'label' => 'Описание',
				'name' => 'about_descr',
				'type' => 'wysiwyg',
			),

			// === Изображения ===
			array(
				'key' => 'field_about_mobile_image',
				'label' => 'Изображение (мобильная версия)',
				'name' => 'about_mobile_image',
				'type' => 'image',
				'return_format' => 'array',
				'instructions' => 'Показывается только на мобильных устройствах',
			),
			array(
				'key' => 'field_about_image',
				'label' => 'Изображение (десктоп)',
				'name' => 'about_image',
				'type' => 'image',
				'return_format' => 'array',
				'preview_size' => 'large',
				'instructions' => 'Основное изображение секции, показывается на десктопе',
			),

			// === Список преимуществ/пунктов ===
			array(
				'key' => 'field_about_list',
				'label' => 'Список пунктов',
				'name' => 'about_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_about_item_title',
				'button_label' => 'Добавить пункт',
				'sub_fields' => array(
					array(
						'key' => 'field_about_item_image',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
					),
					array(
						'key' => 'field_about_item_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_about_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					),
				),
			),

			// === Кнопка ===
			array(
				'key' => 'field_about_btn',
				'label' => 'Кнопка',
				'name' => 'about_btn',
				'type' => 'link',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				),
			),
		),
		'menu_order' => 3,
	));

	// metalwork
	acf_add_local_field_group(array(
		'key' => 'group_metalwork_section',
		'title' => 'Секция: Металлообработка',
		'fields' => array(
			// === Шапка секции ===
			array(
				'key' => 'field_metalwork_label',
				'label' => 'Надзаголовок',
				'name' => 'metalwork_label',
				'type' => 'text',
				'instructions' => 'Небольшой текст над заголовком',
			),
			array(
				'key' => 'field_metalwork_title',
				'label' => 'Заголовок',
				'name' => 'metalwork_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_metalwork_descr',
				'label' => 'Описание',
				'name' => 'metalwork_descr',
				'type' => 'wysiwyg',
			),

			// === Список услуг/направлений ===
			array(
				'key' => 'field_metalwork_list',
				'label' => 'Список направлений',
				'name' => 'metalwork_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_metalwork_item_title',
				'button_label' => 'Добавить направление',
				'instructions' => 'Если список пуст — секция не выведется',
				'sub_fields' => array(
					array(
						'key' => 'field_metalwork_item_image',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
					),
					array(
						'key' => 'field_metalwork_item_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image',
					),
					array(
						'key' => 'field_metalwork_item_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_metalwork_item_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					),
					array(
						'key' => 'field_metalwork_item_link',
						'label' => 'Ссылка',
						'name' => 'link',
						'type' => 'link',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				),
			),
		),
		'menu_order' => 4,
	));

	// process
	acf_add_local_field_group(array(
		'key' => 'group_process_section',
		'title' => 'Секция: Процесс (Process)',
		'fields' => array(
			// === Шапка секции ===
			array(
				'key' => 'field_process_label',
				'label' => 'Надзаголовок',
				'name' => 'process_label',
				'type' => 'text',
				'instructions' => 'Краткая метка над заголовком',
			),
			array(
				'key' => 'field_process_title',
				'label' => 'Заголовок',
				'name' => 'process_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_process_descr',
				'label' => 'Описание',
				'name' => 'process_descr',
				'type' => 'wysiwyg',
			),

			// === Список этапов ===
			array(
				'key' => 'field_process_list',
				'label' => 'Этапы процесса',
				'name' => 'process_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_process_item_title',
				'button_label' => 'Добавить этап',
				'sub_fields' => array(
					array(
						'key' => 'field_process_item_image',
						'label' => 'Изображение',
						'name' => 'image',
						'type' => 'image',
					),
					array(
						'key' => 'field_process_item_title',
						'label' => 'Заголовок этапа',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_process_item_descr',
						'label' => 'Описание этапа',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					),
				),
			),

			// === CTA-блок ===
			array(
				'key' => 'field_process_cta',
				'label' => 'CTA-блок',
				'name' => 'process_cta',
				'type' => 'group',
				'layout' => 'block',
				'instructions' => 'Призыв к действию внизу секции.',
				'sub_fields' => array(
					array(
						'key' => 'field_process_cta_image',
						'label' => 'Фоновое изображение',
						'name' => 'image',
						'type' => 'image',
					),
					array(
						'key' => 'field_process_cta_title',
						'label' => 'Заголовок CTA',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_process_cta_descr',
						'label' => 'Описание CTA',
						'name' => 'descr',
						'type' => 'textarea',
						'new_lines' => 'wpautop',
						'rows' => 3,
					),
					array(
						'key' => 'field_process_cta_btn',
						'label' => 'Кнопка CTA',
						'name' => 'btn',
						'type' => 'link',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				),
			),
		),
		'menu_order' => 5,
	));

	// projects
	acf_add_local_field_group(array(
		'key' => 'group_projects_section',
		'title' => 'Секция: Проекты (Projects)',
		'fields' => array(
			// === Шапка секции ===
			array(
				'key' => 'field_projects_label',
				'label' => 'Надзаголовок',
				'name' => 'projects_label',
				'type' => 'text',
				'instructions' => 'Краткая метка над заголовком',
			),
			array(
				'key' => 'field_projects_title',
				'label' => 'Заголовок',
				'name' => 'projects_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_projects_descr',
				'label' => 'Описание',
				'name' => 'projects_descr',
				'type' => 'wysiwyg',
			),

			// === Галерея для слайдера ===
			array(
				'key' => 'field_projects_gallery',
				'label' => 'Галерея проектов',
				'name' => 'projects_gallery',
				'type' => 'gallery',
				'mime_types' => 'jpg,jpeg,png,webp',
				'instructions' => 'Изображения будут выведены в слайдере. Порядок меняется перетаскиванием.',
			),

			// === CTA-блок ===
			array(
				'key' => 'field_projects_cta',
				'label' => 'CTA-блок',
				'name' => 'projects_cta',
				'type' => 'group',
				'layout' => 'block',
				'instructions' => 'Призыв к действию. Передается в partials/cta-block.php',
				'sub_fields' => array(
					array(
						'key' => 'field_projects_cta_image',
						'label' => 'Фоновое изображение',
						'name' => 'image',
						'type' => 'image',
						'return_format' => 'array',
						'preview_size' => 'large',
					),
					array(
						'key' => 'field_projects_cta_title',
						'label' => 'Заголовок CTA',
						'name' => 'title',
						'type' => 'text',
					),
					array(
						'key' => 'field_projects_cta_descr',
						'label' => 'Описание CTA',
						'name' => 'descr',
						'type' => 'wysiwyg',
						'tabs' => 'visual',
						'toolbar' => 'basic',
					),
					array(
						'key' => 'field_projects_cta_btn',
						'label' => 'Кнопка CTA',
						'name' => 'btn',
						'type' => 'link',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				),
			),
		),
		'menu_order' => 6,
	));

	// docs
	acf_add_local_field_group(array(
		'key' => 'group_docs_section',
		'title' => 'Секция: Документы',
		'fields' => array(
			array(
				'key' => 'field_docs_label',
				'label' => 'Надзаголовок',
				'name' => 'docs_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_docs_title',
				'label' => 'Заголовок',
				'name' => 'docs_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_docs_descr',
				'label' => 'Описание',
				'name' => 'docs_descr',
				'type' => 'wysiwyg',
				'tabs' => 'visual',
				'toolbar' => 'basic',
			),
			array(
				'key' => 'field_docs_image',
				'label' => 'Изображение секции',
				'name' => 'docs_image',
				'type' => 'image',
				'instructions' => 'Декоративное или иллюстративное изображение рядом со списком',
			),
			array(
				'key' => 'field_docs_message',
				'label' => 'Инструкция',
				'type' => 'message',
				'message' => '<b>Чтобы добавить Документы > Перейдите в Панель управления сайтом > Записи > Документы.</b><br/><a href="' . esc_url(home_url('/wp-admin/edit.php?post_type=document')) . '" target="_blank">Перейти</a>'
			)
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				),
			),
		),
		'menu_order' => 7,
	));

	// contacts
	acf_add_local_field_group(array(
		'key' => 'group_contacts_section',
		'title' => 'Секция: Контакты (Contacts)',
		'fields' => array(
			// === Шапка секции ===
			array(
				'key' => 'field_contacts_section_label',
				'label' => 'Надзаголовок',
				'name' => 'contacts_section_label',
				'type' => 'text',
			),
			array(
				'key' => 'field_contacts_section_title',
				'label' => 'Заголовок',
				'name' => 'contacts_section_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_contacts_section_descr',
				'label' => 'Описание',
				'name' => 'contacts_section_descr',
				'type' => 'wysiwyg',
			),

			// === Блок контактов ===
			array(
				'key' => 'field_contacts_box_title',
				'label' => 'Заголовок блока контактов',
				'name' => 'contacts_box_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_contacts_box_company',
				'label' => 'Название компании',
				'name' => 'contacts_box_company',
				'type' => 'text',
			),
			array(
				'key' => 'field_contacts_box_company_descr',
				'label' => 'Описание компании',
				'name' => 'contacts_box_company_descr',
				'type' => 'wysiwyg',
			),
			array(
				'key' => 'field_contacts_section_message',
				'label' => 'Инструкция',
				'type' => 'message',
				'message' => '<b>Чтобы изменить Контактные данные > Перейдите в Панель управления сайтом > Редактирование контента > Контактные данные.</b><br/><a href="' . esc_url(home_url('/wp-admin/admin.php?page=opt-contacts')) . '" target="_blank">Перейти к редактированию</a>'
			),
			// === Форма обратной связи ===
			array(
				'key' => 'field_contacts_section_form_title',
				'label' => 'Заголовок формы',
				'name' => 'contacts_section_form_title',
				'type' => 'text',
			),
			array(
				'key' => 'field_contacts_section_form',
				'label' => 'Шорткод формы',
				'name' => 'contacts_section_form',
				'type' => 'text',
				'instructions' => 'Вставьте шорткод плагина форм, например: [contact-form-7 id="123" title="Форма контактов"]',
			),
			array(
				'key' => 'field_contacts_section_image',
				'label' => 'Фон',
				'name' => 'contacts_section_image',
				'type' => 'image',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php'
				),
			),
		),
		'menu_order' => 8,
	));

	//! single-document
	acf_add_local_field_group(array(
		'key' => 'group_documents_single',
		'title' => 'Файл документа',
		'fields' => array(
			array(
				'key' => 'field_docs_single_file',
				'label' => 'Файл документа',
				'name' => 'docs_single_file',
				'type' => 'file',
				'return_format' => 'array',
				'library' => 'all',
				'instructions' => 'Загрузите PDF, Word, Excel или другой файл. Ссылка подтянется в шаблон автоматически.',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'document',
				),
			),
		),
		'menu_order' => 0,
	));
}
