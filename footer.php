</main>

<footer class="footer">
	<div class="container footer__container">
		<a href="<?php echo bloginfo( 'url' ); ?>" class="footer__logo" aria-label="Логотип школы"></a>

		<div class="footer__links">
			<a href="<?php echo get_privacy_policy_url(); ?>" class="footer__policy" target="_blank">Политика в отношении обработки персональных данных</a>

			<a href="<?php echo get_page_link( 31 ); ?>" class="footer__public-offer" target="_blank">Публичная оферта</a>
		</div>

		<?php wp_nav_menu(array(
			'theme_location' => 'menu_footer',
			'container' => '',
			'menu_id' => 'menu-footer',
			'menu_class' => 'reset-list footer__menu'
		)); ?>

		<a href="#map" class="footer__map">
			<span>
				<svg width="18" height="22"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-marker"></use></svg>
			</span>
			Открыть карту проезда
		</a>

		<div class="footer__rights">© All Right Reserved. Turnen. <?php echo date( 'Y' ); ?></div>
	</div>
</footer>

<?php get_template_part('layouts/partials/modals'); ?>

<?php wp_footer(); ?>

</body>
</html>
