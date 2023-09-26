<section class="contacts">
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
						<a href="tel:<?php echo preg_replace('/[^0-9,+]/', '', $phone['number']); ?>">
							<svg width="50" height="50"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-phone"></use></svg>
							<?php echo $phone['number']; ?>
						</a>

						<div class="contacts__socials-desc"><?php echo $phone['desc']; ?></div>
					</div>
				<?php endif; ?>

				<?php if ( $telegram ) : ?>
					<div class="st-hypten contacts__socials-wrapper">
						<a href="https://t.me/<?php echo $telegram['link']; ?>" target="_blank">
							<svg width="50" height="50"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-telegram"></use></svg>
							<?php echo preg_replace('/[^0-9,+]/', '', $telegram['link']); ?>
						</a>

						<div class="contacts__socials-desc"><?php echo $telegram['desc']; ?></div>
					</div>
				<?php endif; ?>

				<?php if ( $whatsapp ) : ?>
					<div class="st-hypten contacts__socials-wrapper">
						<a href="https://wa.me/<?php echo $whatsapp['link']; ?>" target="_blank">
							<svg width="50" height="50"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-whatsapp"></use></svg>
							<?php echo $whatsapp['link']; ?>
						</a>

						<div class="contacts__socials-desc"><?php echo $whatsapp['desc']; ?></div>
					</div>
				<?php endif; ?>
			</div>
		</div>


	</div>
</section>
