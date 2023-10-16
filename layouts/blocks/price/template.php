<section class="price" id="price">
	<div class="container">
        <?php get_template_part('/layouts/partials/title', null, array(
            'class' => 'price__title',
            'title' => get_sub_field('title')
        )); ?>

		<div class="price__label">
			Стоимость тренировок:<br>
			групповые и персональные тренировки
		</div>

		<?php
			$price = get_sub_field( 'price' );
			if ( $price ) :
		?>
			<ul class="reset-list price__list">
				<?php foreach ( $price as $item ) : ?>
					<li class="price__item">
						<button class="price__item-btn<?php echo ( $item['desc'] ) ? ' js-accordion-btn' : ''; ?>" type="button">
							<svg width="32" height="32" class="price__item-arrow"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-circle"></use></svg>

							<div class="price__item-label"><?php echo $item['label']; ?></div>

							<div class="price__item-value"><?php echo number_format($item['value'], 0, ',', ' '); ?> р.</div>
						</button>

						<div class="price__item-desc"><?php echo $item['desc']; ?></div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<button class="btn-circle price__button" type="button" data-fancybox data-src="#callback">
			Узнать расписание занятий
			<svg width="21" height="21"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-cursor"></use></svg>
		</button>
	</div>
</section>
