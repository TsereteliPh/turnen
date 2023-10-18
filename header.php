<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/logo-main.png" type="image/x-icon">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header<?php echo ( is_front_page() ) ? ' header--index' : ''; ?>">
	<div class="header__content">
		<div class="container header__container">
			<a href="<?php echo bloginfo( 'url' ); ?>" class="header__logo" aria-label="Логотип школы"></a>

			<div class="header__separator"></div>


			<?php
				$blocks = get_field( 'blocks', 2 );
				$menu = array(
					'map' => 'Мы на карте',
					'coaches' => 'Тренеры',
					'price' => 'Цены',
					'album' => 'Наш зал',
					'contacts' => 'Контакты'
				);
				if ( $blocks ) :
			?>
				<ul class="reset-list header__menu">
					<?php
						foreach ( $blocks as $block ) :
							if ( isset( $menu[ $block['acf_fc_layout'] ] ) ) :
					?>
								<li class="header__menu-item">
									<a href="<?php echo ( is_front_page() ) ? '#' . $block['acf_fc_layout'] : bloginfo( 'url' ) . '/#' . $block['acf_fc_layout']; ?>">
										<?php echo $menu[ $block['acf_fc_layout'] ]; ?>
									</a>
								</li>
					<?php
							endif;
						endforeach;
					?>
				</ul>
			<?php endif; ?>

			<button class="header__burger" type="button" aria-label="Открыть меню">
				<span></span>
			</button>

			<?php
				$phone = get_field( 'phone', 'options' );
				$telegram = get_field( 'telegram', 'options' );
				$whatsapp = get_field( 'whatsapp', 'options' );
			?>

			<div class="header__content-socials">
				<?php if ( $whatsapp ) : ?>
					<a href="https://wa.me/<?php echo preg_replace('/[^0-9,+]/', '', $whatsapp['link']); ?>" class="header__content-social" target="_blank" aria-label="Ссылка на WhatsApp">
						Написать в Вотсап
						<svg width="50" height="50"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-whatsapp"></use></svg>
					</a>
				<?php endif; ?>

				<?php if ( $phone ) : ?>
					<a href="tel:<?php echo preg_replace('/[^0-9,+]/', '', $phone['number']); ?>" class="header__content-social" aria-label="Позвонить по номеру: <?php echo $phone['number']; ?>">
						Позвонить
						<svg width="50" height="50"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-phone"></use></svg>
					</a>
				<?php endif; ?>

				<?php
					if ( $telegram ) :
					if ( $telegram['type'] == 'link' ) {
						$tgLink = preg_replace('/@/', '', $telegram['link']);
					} else {
						$tgLink = preg_replace('/[^0-9,+]/', '', $telegram['number']);
					}
				?>
					<a href="https://t.me/<?php echo $tgLink; ?>" target="_blank" class="header__content-social" aria-label="Ссылка на Telegram">
						Подписаться на Телеграм
						<svg width="50" height="50"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-telegram"></use></svg>
					</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="header__drop">
		<div class="container">
			<?php if ( $blocks ) : ?>
				<ul class="reset-list header__drop-list">
					<?php
						foreach ( $blocks as $block ) :
							if ( isset( $menu[ $block['acf_fc_layout'] ] ) ) :
					?>
								<li class="header__drop-item">
									<a href="<?php echo ( is_front_page() ) ? '#' . $block['acf_fc_layout'] : bloginfo( 'url' ) . '/#' . $block['acf_fc_layout']; ?>">
										<?php echo $menu[ $block['acf_fc_layout'] ]; ?>
									</a>
								</li>
					<?php
							endif;
						endforeach;
					?>
				</ul>
			<?php endif; ?>


			<div class="header__drop-info">
				<a href="#map" class="header__map">
					<span>
						<svg width="18" height="22"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-marker"></use></svg>
					</span>
					Открыть карту проезда
				</a>

				<div class="socials header__socials">
					<?php if ( $phone ) : ?>
						<a href="tel:<?php echo preg_replace('/[^0-9,+]/', '', $phone['number']); ?>" aria-label="Позвонить по номеру: <?php echo $phone['number']; ?>">
							<svg width="50" height="50"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-phone"></use></svg>
						</a>
					<?php endif; ?>

					<?php if ( $telegram ) : ?>
						<a href="https://t.me/<?php echo $tgLink; ?>" target="_blank" aria-label="Ссылка на Telegram">
							<svg width="50" height="50"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-telegram"></use></svg>
						</a>
					<?php endif; ?>

					<?php if ( $whatsapp ) : ?>
						<a href="https://wa.me/<?php echo preg_replace('/[^0-9,+]/', '', $whatsapp['link']); ?>" target="_blank" aria-label="Ссылка на WhatsApp">
							<svg width="50" height="50"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-whatsapp"></use></svg>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</header>

<?php if( !is_front_page() && function_exists( 'yoast_breadcrumb' ) ) : ?>
	<div class="breadcrumb">
		<div class="container">
			<?php echo yoast_breadcrumb(); ?>
		</div>
	</div>
<?php endif ?>

<main class="main<?php echo ( is_front_page() ) ? ' main--index' : ''; ?>">
	<?php if ( is_front_page() ) get_template_part( 'layouts/partials/welcome' ); ?>
