<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_650db1a622dea',
	'title' => 'Block:map',
	'fields' => array(
		array(
			'key' => 'field_652e50a83190c',
			'label' => 'Текст над заголовком',
			'name' => 'text',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Мы находимся в торговом центре Соле Молл',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'acfe_field_group_condition' => 0,
		),
		array(
			'key' => 'field_652e508a3190b',
			'label' => 'Заголовок',
			'name' => 'title',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Как до нас добраться',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'acfe_field_group_condition' => 0,
		),
		array(
			'key' => 'field_650db228708ee',
			'label' => '',
			'name' => '',
			'aria-label' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Адрес автоматически добавляется я из вкладки "Настройки темы"',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
			'acfe_field_group_condition' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => false,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_autosync' => array(
		0 => 'php',
	),
	'acfe_form' => 0,
	'acfe_display_title' => '',
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1707720022,
));

endif;