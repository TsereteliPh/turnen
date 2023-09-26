<?php $albums = get_sub_field( 'albums' ); ?>
<section class="album" id="album">
	<div class="container">
		<?php get_template_part('/layouts/partials/title', null, array(
			'class' => 'album__title',
			'title' => get_sub_field('title')
		)); ?>

		<div class="album__text">
			Где ваш ребенок будет заниматься
			<span>Выберите альбом:</span>
		</div>

		<?php if ( $albums ) : ?>
			<ul class="reset-list album__list js-tabs">
				<?php foreach ( $albums as $key => $album ) : ?>
                    <li class="album__item<?php echo ( $key == 0 ) ? ' active' : ''; ?>" data-tab="album-<?php echo $key + 1; ?>"><?php echo $album['label']; ?></li>
                <?php endforeach;?>
			</ul>

			<?php
				foreach ( $albums as $key => $album ) :
				$albumName = 'album-'. ($key + 1);
			?>
				<div class="gallery album__gallery<?php echo ( $key == 0 ) ? ' active' : ''; ?>" id="<?php echo $albumName ?>">
					<?php if ( $album['gallery'] ) : ?>
						<?php foreach ( $album['gallery'] as $photo ) : ?>
							<a href="<?php echo $photo['url']; ?>" class="gallery__link" data-fancybox="<?php echo $albumName; ?>">
								<?php echo wp_get_attachment_image( $photo['ID'], 'large', false ); ?>
							</a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>
