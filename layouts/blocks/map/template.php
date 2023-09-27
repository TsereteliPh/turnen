<section class="map" id="map">
	<div class="container map__container">
		<div class="map__label">
			<h2 class="map__title">Как до нас добраться</h2>

			<div class="map__mall">Мы находимся в торговом центре Соле Молл</div>
		</div>

		<address class="map__address">
			<span>
				<svg width="18" height="22"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-marker"></use></svg>
			</span>
			<?php the_field( 'address', 'options' ); ?>
		</address>
	</div>

	<div class="map__wrapper">
		<?php
			$route = get_sub_field( 'route' );
			if ( $route ) :
		?>
			<div class="map__info">
				<ul class="reset-list map__list">
					<?php foreach ( $route as $item ) : ?>
						<li class="map__item">
							<svg width="24" height="24" style="color: <?php echo $item['color']; ?>;"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-metro"></use></svg>
							<?php echo $item['label']; ?>
							<span><?php echo $item['time']; ?> мин</span>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="map__parking">
					<svg width="24" height="24"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-parking"></use></svg>
					Пред зданием для вашего удобства предусмотрена парковка
				</div>

				<button class="map__info-btn" type="button"></button>
			</div>
		<?php endif; ?>

		<div id="map-holder" class="map__holder"></div>
	</div>

	<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
    <?php $map = get_field( 'map', 'options' ); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function (e) {
			function init(){
                <?php if ($map) : ?>
                    <?php $map = json_decode($map, true); ?>
                    const map = new ymaps.Map('map-holder', {
                        center: [<?php echo $map['center_lat'] ?>,<?php echo $map['center_lng'] ?>],
                        zoom: <?php echo $map['zoom']; ?>
                    });

                    <?php foreach ($map['marks'] as $mark): ?>
                        map.geoObjects.add(
                            new ymaps.Placemark([<?php echo $mark['coords'][0]; ?>, <?php echo $mark['coords'][1]; ?>], {
                                    balloonContent: '<?php echo $mark['content'] ?>'
                                },
                                {
                                    iconLayout: 'default#image',
                                    iconImageHref: '<?php echo get_template_directory_uri(); ?>/assets/images/logo-main.png',
                                    iconImageSize: [50, 50],
                                    iconImageOffset: [-25, -25]
                                })
                        );
                    <?php endforeach; ?>

                    map.controls.remove('geolocationControl'); // удаляем геолокацию
                    map.controls.remove('searchControl'); // удаляем поиск
                    map.controls.remove('trafficControl'); // удаляем контроль трафика
                    map.controls.remove('typeSelector'); // удаляем тип
                    map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
                    // map.controls.remove('zoomControl'); // удаляем контрол зуммирования
                    map.controls.remove('rulerControl'); // удаляем контрол правил
                    map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
                <?php endif; ?>
            }

			ymaps.ready(init);
        });
    </script>
</section>
