<section class="coaches-list">
	<div class="container">
		<?php
			get_template_part('/layouts/partials/title', null, array(
				'class' => 'title--normal coaches-list__title',
				'title' => get_sub_field('title')
			));

			$list = get_sub_field( 'list' );
			if ( $list ) :
		?>
			<ul class="reset-list coaches-list__list">
				<?php foreach ( $list as $item ) : ?>
					<li class="coaches-list__item">
						<?php
							if ( $item['photo'] ) {
								echo wp_get_attachment_image( $item['photo'], 'large', false, array(
									'class' => 'coaches-list__photo'
								) );
							} else {
								echo wp_get_attachment_image( 146, 'large', false, array(
									'class' => 'coaches-list__photo'
								) );
							}
						?>

						<?php if ( $item['text'] ) : ?>
							<div class="coaches-list__text"><?php echo $item['text']; ?></div>
						<?php endif; ?>

						<?php if ( $item['name'] ) : ?>
							<div class="coaches-list__name"><?php echo $item['name']; ?></div>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
