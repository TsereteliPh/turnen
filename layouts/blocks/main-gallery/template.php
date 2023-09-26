<section class="main-gallery">
	<div class="container">
		<?php get_template_part('/layouts/partials/title', null, array(
			'class' => 'title--normal main-gallery__title',
			'title' => get_sub_field('title')
		)); ?>

		<?php
			$gallery = get_sub_field( 'gallery' );
			if( $gallery ) :
		?>
			<div class="gallery main-gallery__gallery">
				<?php foreach( $gallery as $img ) : ?>
					<a href="<?php echo $img['url']; ?>" class="gallery__link" data-fancybox="main-gallery-<?php echo $args['block_id']; ?>">
						<?php echo wp_get_attachment_image( $img['ID'], 'large', false ); ?>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
