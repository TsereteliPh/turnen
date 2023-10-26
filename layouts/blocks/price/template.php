<section class="price" id="price">
	<div class="container">
        <?php
			get_template_part('/layouts/partials/title', null, array(
				'class' => 'price__title',
				'title' => get_sub_field('title')
			));

			$afterTitle = get_sub_field( 'after_title' );
			if ( $afterTitle ) :
		?>
			<div class="price__label"><?php echo $afterTitle; ?></div>
		<?php endif; ?>

		<?php
			$price = get_sub_field( 'price' );
			$columns = get_sub_field( 'columns' );
			if ( $price ) :
		?>
			<ul class="reset-list price__list<?php echo ( !$afterTitle ) ? ' price__list--indent' : ''; echo ( $columns == 'two' ) ? ' price__list--grid' : ''; ?>">
				<?php foreach ( $price as $item ) : ?>
					<li class="price__item">
						<button class="price__item-btn<?php echo ( $item['desc'] && get_sub_field( 'accordion' ) ) ? ' js-accordion-btn' : ''; ?>" type="button">
							<svg width="32" height="32" class="price__item-arrow<?php echo ( $item['desc'] ) ? ' price__item-arrow--rotate' : ''; ?>"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-circle"></use></svg>

							<div class="price__item-label"><?php echo $item['label']; ?></div>

							<?php if ( $item['value'] ) : ?>
								<div class="price__item-value"><?php echo number_format($item['value'], 0, ',', ' '); ?> р.</div>
							<?php endif; ?>
						</button>

						<?php if ( $item['desc'] ) : ?>
							<div class="price__item-desc"><?php echo $item['desc']; ?></div>
						<?php endif; ?>
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
