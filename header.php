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
	<div class="container header__container">
		<a class="header__logo" aria-label="Логотип школы"></a>

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

	<div class="container header__drop">
		<ul class="reset-list header__drop-menu">
			<li class="header__menu-item">Мы на карте</li>
			<li class="header__menu-item">Тренеры</li>
			<li class="header__menu-item">Цены</li>
			<li class="header__menu-item">Наш зал</li>
			<li class="header__menu-item">Контакты</li>
		</ul>

		<ul class="header__socials">

		</ul>
	</div>
</header>

<main class="main">
