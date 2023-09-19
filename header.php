<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
	<div class="header__content">
		<div class="container header__container">
			<a href="<?php echo bloginfo( 'url' ); ?>" class="header__logo" aria-label="Логотип школы"></a>

			<div class="header__separator"></div>

			<ul class="reset-list header__menu">
				<li class="header__menu-item">Мы на карте</li>
				<li class="header__menu-item">Тренеры</li>
				<li class="header__menu-item">Цены</li>
				<li class="header__menu-item">Наш зал</li>
				<li class="header__menu-item">Контакты</li>
			</ul>

			<button class="header__burger" type="button" aria-label="Открыть меню">
				<span></span>
			</button>
		</div>
	</div>

	<div class="header__drop">
		<div class="container">
			<ul class="reset-list header__drop-list">
				<li class="header__drop-item">Мы на карте</li>
				<li class="header__drop-item">Тренеры</li>
				<li class="header__drop-item">Цены</li>
				<li class="header__drop-item">Наш зал</li>
				<li class="header__drop-item">Контакты</li>
			</ul>

			<?php
				$phone = get_field( 'phone', 'options' );
				$telegram = get_field( 'telegram', 'options' );
				$whatsapp = get_field( 'whatsapp', 'options' );
			?>

			<div class="header__socials">
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
		</div>
	</div>
</header>

<main class="main">
