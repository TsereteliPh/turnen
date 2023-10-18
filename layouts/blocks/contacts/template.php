<section class="contacts" id="contacts">
	<div class="btn-arrow">
		<svg width="60" height="60"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-circle--yellow"></use></svg>
	</div>

	<div class="container contacts__container">
		<?php get_template_part('/layouts/partials/title', null, array(
			'class' => 'contacts__title',
			'title' => get_sub_field('title')
		)); ?>

		<div class="contacts__info">
			<div class="contacts__label">Как с нами связаться</div>

			<?php
				$phone = get_field( 'phone', 'options' );
				$telegram = get_field( 'telegram', 'options' );
				$whatsapp = get_field( 'whatsapp', 'options' );
			?>

			<div class="contacts__socials">
				<?php if ( $phone ) : ?>
					<div class="st-hypten contacts__socials-wrapper">
						<a href="tel:<?php echo preg_replace('/[^0-9,+]/', '', $phone['number']); ?>" class="contacts__socials-link">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-phone.svg" alt="Иконка телефона" width="45" height="45">
							<svg width="40" height="40"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-phone"></use></svg>
							<?php echo $phone['number']; ?>
						</a>

						<?php if ( $phone['desc'] ) : ?>
							<div class="contacts__socials-desc"><?php echo $phone['desc']; ?></div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( $whatsapp ) : ?>
					<div class="st-hypten contacts__socials-wrapper">
						<a href="https://wa.me/<?php echo preg_replace('/[^0-9,+]/', '', $whatsapp['link']); ?>" class="contacts__socials-link" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-whatsapp.svg" alt="Иконка whatsapp" width="45" height="45">
							<svg width="40" height="40"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-whatsapp"></use></svg>
							<?php echo $whatsapp['link']; ?>
						</a>

						<?php if ( $whatsapp['desc'] ) : ?>
							<div class="contacts__socials-desc"><?php echo $whatsapp['desc']; ?></div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php
					if ( $telegram ) :
					if ( $telegram['type'] == 'link' ) {
						$tgLink = preg_replace('/@/', '', $telegram['link']);
					} else {
						$tgLink = preg_replace('/[^0-9,+]/', '', $telegram['number']);
					}
				?>
					<div class="st-hypten contacts__socials-wrapper">
						<a href="https://t.me/<?php echo $tgLink; ?>" class="contacts__socials-link contacts__socials-link--telegram" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-telegram.svg" alt="Иконка телеграма" width="45" height="45">
							<svg width="40" height="40"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-telegram"></use></svg>
							<?php echo $telegram[$telegram['type']]; ?>
						</a>

						<?php if ( $telegram['desc'] ) : ?>
							<div class="contacts__socials-desc"><?php echo $telegram['desc']; ?></div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="modal contacts__form">
			<h3 class="modal__title">Приходите к нам</h3>

			<?php if ( get_sub_field( 'text' ) ) : ?>
				<div class="modal__text"><?php the_sub_field( 'text' ); ?></div>
			<?php endif; ?>

			<form method="POST" class="modal__form" name="Контакты">
				<?php wp_nonce_field( 'Контакты', 'contacts_input' ); ?>

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
	</div>
</section>
