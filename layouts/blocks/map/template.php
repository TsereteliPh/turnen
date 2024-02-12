<section class="map" id="map">
	<div class="container map__container">
		<div class="map__label">
			<div class="map__before-title"><?php the_sub_field( 'text' ); ?></div>

			<h2 class="map__title"><?php the_sub_field( 'title' ); ?></h2>
		</div>

		<address class="map__address">
			<span>
				<svg width="18" height="22"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-marker"></use></svg>
			</span>
			<?php the_field( 'address', 'options' ); ?>
		</address>
	</div>

	<div class="map__wrapper">
		<div class="map__info">
			<div class="map__info-label">Выберите, как будете добираться:</div>

			<ul class="reset-list map__info-tabs js-tabs">
				<li class="map__info-tab active" data-tab="map-bus">
					<svg width="40" height="39"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-bus"></use></svg>
					На автобусе
				</li>

				<li class="map__info-tab" data-tab="map-car">
					<svg width="44" height="31"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-car"></use></svg>
					На машине
				</li>

				<li class="map__info-tab" data-tab="map-pedestiran">
					<svg width="31" height="43"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-pedestrian"></use></svg>
					Пешком
				</li>
			</ul>

			<ul class="reset-list map__list active" id="map-bus">
				<li class="map__item">
					<svg width="24" height="24" style="color: #62B212;"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-metro"></use></svg>
					ВДНХ
					<span>19 мин</span>
				</li>

				<li class="map__item">
					<svg width="24" height="24" style="color: #1944C5;"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-metro"></use></svg>
					Свиблово
					<span>26 мин</span>
				</li>

				<li class="map__item">
					<svg width="24" height="24" style="color: #B16CCD;"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-metro"></use></svg>
					Бабушкинская
					<span>28 мин</span>
				</li>

				<li class="map__item">
					<svg width="24" height="24" style="color: #ffbf00;"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-metro"></use></svg>
					Ростокино (МЦК)
					<span>15 мин</span>
				</li>

				<li class="map__item">
					<svg width="24" height="24" style="color: #ff7f00;"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-metro"></use></svg>
					Алексеевская
					<span>27 мин</span>
				</li>
			</ul>

			<ul class="reset-list map__list" id="map-car">
				<li class="map__item">
					<svg width="24" height="24" style="color: #62B212;"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-metro"></use></svg>
					ВДНХ
					<span>14 мин</span>
				</li>

				<li class="map__item">
					<svg width="24" height="24" style="color: #1944C5;"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-metro"></use></svg>
					Свиблово
					<span>12 мин</span>
				</li>

				<li class="map__item">
					<svg width="24" height="24" style="color: #B16CCD;"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-metro"></use></svg>
					Бабушкинская
					<span>18 мин</span>
				</li>

				<li class="map__item">
					<svg width="24" height="24" style="color: #ffbf00;"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-metro"></use></svg>
					Ростокино (МЦК)
					<span>13 мин</span>
				</li>

				<li class="map__item">
					<svg width="24" height="24" style="color: #ff7f00;"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-metro"></use></svg>
					Алексеевская
					<span>22 мин</span>
				</li>
			</ul>

			<ul class="reset-list map__list" id="map-pedestiran">
				<li class="map__item">
					<svg width="24" height="24" style="color: #23cc77;"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-metro"></use></svg>
					Лосиноостровская
					<span>5 мин</span>
				</li>
			</ul>

			<div class="map__parking">
				<svg width="24" height="24"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-parking"></use></svg>
				Пред зданием для вашего удобства предусмотрена парковка
			</div>
		</div>

		<div class="map__holder"></div>
	</div>
</section>
