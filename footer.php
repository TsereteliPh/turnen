</main>

<footer class="footer">
	<div class="container footer__container">
		<a href="<?php echo bloginfo( 'url' ); ?>" class="footer__logo" aria-label="Логотип школы"></a>

		<a href="<?php echo get_privacy_policy_url(); ?>" class="footer__policy" target="_blank">Политика в отношении обработки персональных данных</a>

		<a href="<?php echo get_page_link( 31 ); ?>" class="footer__public-offer" target="_blank">Публичная оферта</a>

		<?php
			$phone = get_field( 'phone', 'options' );
			$telegram = get_field( 'telegram', 'options' );
			$whatsapp = get_field( 'whatsapp', 'options' );
		?>

		<div class="socials footer__socials">
			<?php if ( $phone ) : ?>
				<a href="tel:<?php echo preg_replace('/[^0-9,+]/', '', $phone['number']); ?>">
					<svg width="50" height="50"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-phone"></use></svg>
				</a>
			<?php endif; ?>

			<?php if ( $telegram ) : ?>
				<a href="https://t.me/<?php echo $telegram['link']; ?>" target="_blank">
					<svg width="50" height="50"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-telegram"></use></svg>
				</a>
			<?php endif; ?>

			<?php if ( $whatsapp ) : ?>
				<a href="https://wa.me/<?php echo $whatsapp['link']; ?>" target="_blank">
					<svg width="50" height="50"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-whatsapp"></use></svg>
				</a>
			<?php endif; ?>
		</div>

		<div class="footer__rights">© All Right Reserved. Turnen. 2023</div>
	</div>
</footer>

<?php get_template_part('layouts/partials/modals'); ?>

<?php wp_footer(); ?>

</body>
</html>
