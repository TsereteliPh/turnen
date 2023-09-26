<div class="modal modal--success" id="success">
	<svg width="100" height="143"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-check"></use></svg>

	<h3 class="modal__title">Спасибо!</h3>

	<div class="modal__text">Ваша заявка была успешно отправлена! Мы свяжемся с вами в ближайшее время.</div>
</div>

<div class="modal modal" id="callback">
	<h3 class="modal__title">Заявка на обратную связь</h3>

	<div class="modal__text">Готовы ответить на все ваши вопросы или предоставить дополнительную информацию по вашему запросу.</div>

	<form method="POST" class="modal__form">
		<input type="text" class="input" name="client_name" placeholder="Ваше имя" required>

		<input type="tel" class="input" name="client_phone" placeholder="Ваш телефон" required>

		<button class="btn-circle modal__submit" type="submit">Отправить</button>
	</form>

	<div class="modal__policy">
		Нажимая на кнопку ниже, вы соглашаетесь
		<a href="<?php echo get_privacy_policy_url(); ?>" target="_blank">с условиями передачи данных</a>
	</div>
</div>
