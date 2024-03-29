<div class="modal modal--success" id="success">
	<svg width="100" height="143"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-check"></use></svg>

	<div class="modal__title">Спасибо!</div>

	<div class="modal__text">Ваша заявка была успешно отправлена! Мы свяжемся с вами в ближайшее время.</div>
</div>

<div class="modal modal" id="callback">
	<div class="modal__title">Заявка на обратную связь</div>

	<div class="modal__text">Готовы ответить на все ваши вопросы или предоставить дополнительную информацию по вашему запросу.</div>

	<form method="POST" class="modal__form" name="Звонок">
		<?php wp_nonce_field( 'Звонок', 'callback_input' ); ?>

		<input type="text" class="hidden" name="page_request" value="<?php echo get_the_title(); ?>">

		<input type="text" class="input" name="client_name" placeholder="Ваше имя" required>

		<input type="tel" class="input" name="client_tel" placeholder="Ваш телефон" required>

		<textarea class="input modal__textarea" name="client_message" placeholder="Время и дата для связи и комментарий"></textarea>

		<button class="btn-circle modal__submit" type="submit">
			Отправить
			<svg width="21" height="21"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-cursor"></use></svg>
		</button>
	</form>

	<div class="modal__policy">
		Нажимая на кнопку ниже, вы соглашаетесь
		<a href="<?php echo get_privacy_policy_url(); ?>" target="_blank">с&nbsp;условиями передачи данных</a>
	</div>
</div>
