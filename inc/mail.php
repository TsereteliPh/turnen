<?php

// Регистрация нового типа поста
add_action('init', 'register_post_types');
function register_post_types()
{
	register_post_type('mail', [
		'label' => null,
		"labels" => [
			"name" => "Заявки",
			"singular_name" => "Заявка",
			"menu_name" => "Заявки",
			"all_items" => "Все заявки",
			"add_new" => "Добавить заявку",
			"add_new_item" => "Добавить заявку",
			"edit_item" => "Редактировать заявку",
			"new_item" => "Новая заявку",
			"view_item" => "Смотреть заявку",
			"search_items" => "Найти заявку",
			"not_found" => "Не найдено",
			"not_found_in_trash" => "Не найдено в корзине",
		],
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => false,
		"query_var" => true,
		"menu_position" => 23,
		"menu_icon" => "dashicons-email-alt",
		"supports" => [""],
		'publicly_queryable' => false
	]);
}

// Регистрация страницы опцций ACF
if (function_exists('acf_add_options_page')) {
	acf_add_options_page([
		'page_title' => 'Формы',
		'menu_title' => 'Формы',
		'menu_slug' => 'forms',
		'post_id' => 'forms',
		'capability' => 'edit_posts',
		'position' => 64,
		'parent_slug' => '',
		'icon_url' => false,
		'update_button' => 'Обновить',
		'updated_message' => 'Настройки обновлены',
	]);
}

// Регистрация доп полей
add_action('acf/init', 'register_fields');
function register_fields()
{
	acf_add_local_field_group([
		'key' => 'group_5c18f89ca825f',
		'title' => 'Настройки форм',
		'fields' => [
			[
				'key' => 'field_5c18f8a29941c',
				'label' => 'Адреса для отправки почты',
				'name' => 'emails',
				'type' => 'repeater',
				'layout' => 'table',
				'button_label' => 'Добавить почту',
				'sub_fields' => [
					[
						'key' => 'field_5c18f8ba9941d',
						'label' => 'Email',
						'name' => 'emails_item',
						'type' => 'email',
					],
					[
						'key' => 'field_dfg45hhdg34rasdgf',
						'label' => 'Нужен ли трафик в письме?',
						'name' => 'emails_traffic',
						'type' => 'true_false',
						'ui' => 1,
					],
				],
			],
			[
				'key' => 'field_dfs2825hdsdf8234',
				'label' => 'Почта отправителя',
				'name' => 'sender-mail',
				'type' => 'email',
			]
		],
		'location' => [
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'forms',
				],
			],
		],
	]);
}

// подключаем функцию активации мета блока (mail_meta_box)
add_action('add_meta_boxes', 'mail_meta_box', 1);
function mail_meta_box()
{
	add_meta_box('mail_meta_box', 'Заявка', 'mail_meta_box_function', 'mail', 'normal', 'high');
}

// код мета блока
function mail_meta_box_function($post)
{
	$metaBody = get_post_meta($post->ID, 'metaBody', true);

	echo $metaBody;
}

// Отправка писем
add_action("wp_ajax_send_mail", "send_mail");
add_action("wp_ajax_nopriv_send_mail", "send_mail");
function send_mail()
{
	if (empty($_POST['form_name']) || empty($_POST['page_request'])) exit;

	$form_name = $_POST['form_name'];
	$mail = '';
	$mail = isset($_POST['client_name']) ? "Имя: " . strip_tags($_POST['client_name']) . "<br/>" : '';
	$mail .= isset($_POST['client_tel']) ? "Телефон: <a href='tel:" . strip_tags($_POST['client_tel']) . "'>" . strip_tags($_POST['client_tel']) . "</a><br/>" : '';
	$mail .= isset($_POST['client_email']) ? "Email: <a href='mailto:" . strip_tags($_POST['client_email']) . "'>" . strip_tags($_POST['client_email']) . "</a><br/>" : '';
	$mail .= isset($_POST['client_message']) ? "Сообщение: " . strip_tags($_POST['client_message']) . "<br/>" : '';
	$mail .= "Страница: $_POST[page_request] <br/>";

	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';

	$uploaded_images = array();

	if ($_FILES) {
		foreach ($_FILES as $file_id => $data) {
			$attach_id = media_handle_upload($file_id, 0);
			$mail .= "Файл: <a href='" . wp_get_attachment_url($attach_id) . "'>Ссылка на файл</a><br/>";
			// ошибка
			if (is_wp_error($attach_id))
				$uploaded_images[] = 'Ошибка загрузки файла `' . $data['name'] . '`: ' . $attach_id->get_error_message();
			else
				$uploaded_images[] = wp_get_attachment_url($attach_id);
		}
	}

	$post_data = [
		'post_title' => $form_name,
		'post_status' => 'pending',
		'post_author' => 1,
		'post_type' => 'mail',
	];
	$post_ID = wp_insert_post($post_data);

	if (have_rows('emails', 'forms')) {
		$subject = get_bloginfo('name') . ' - ' . $form_name;
		$headers = "Content-type: text/html; charset=\"utf-8\"";

		while (have_rows('emails', 'forms')) {
			the_row();
			$emailTo = get_sub_field('emails_item');
			$mailBody = $mail;

			if (get_sub_field('emails_traffic')) {
				$mailBody .= isset($_COOKIE['traffic_source']) ? "Трафик: $_COOKIE[traffic_source] <br/>" : '';
				$mailBody .= isset($_COOKIE['landing_page']) ? "Страница входа: $_COOKIE[landing_page] <br/>" : '';
				$mailBody .= isset($_COOKIE['category_urls']) ? "Посещенные страницы: $_COOKIE[category_urls]" : '';
			}

			wp_mail($emailTo, $subject, $mailBody, $headers);
		}
	}

	$metaBody = $mail;
	$metaBody .= isset($_COOKIE['traffic_source']) ? "Трафик: $_COOKIE[traffic_source] <br/>" : '';
	$metaBody .= isset($_COOKIE['landing_page']) ? "Страница входа: $_COOKIE[landing_page] <br/>" : '';
	$metaBody .= isset($_COOKIE['category_urls']) ? "Посещенные страницы: $_COOKIE[category_urls]" : '';

	update_post_meta($post_ID, 'metaBody', $metaBody);

	die();
}

// Добавляем счетчик не обработанных заявок
add_action('admin_menu', 'add_user_menu_bubble');
function add_user_menu_bubble()
{
	global $menu;

	// записи
	$count = wp_count_posts('mail')->pending; // на утверждении
	if ($count) {
		foreach ($menu as $key => $value) {
			if ($menu[$key][2] == 'edit.php?post_type=mail') {
				$menu[$key][0] .= ' <span class="awaiting-mod"><span class="pending-count">' . $count . '</span></span>';
				break;
			}
		}
	}
}

// Замена имени и почты отправителя писем
function change_name($name)
{
	return get_bloginfo('name');
}

add_filter('wp_mail_from_name', 'change_name');

function change_email($email)
{
	return get_field('sender-mail', 'forms');
}

add_filter('wp_mail_from', 'change_email');
