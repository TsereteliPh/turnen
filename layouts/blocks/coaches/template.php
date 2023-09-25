<section class="coaches">
	<div class="container">
		<div class="coaches__info">
			<?php get_template_part('/layouts/partials/title', null, array(
				'class' => 'coaches__title',
				'title' => get_sub_field('title')
			)); ?>

			<div class="coaches__text">С вашим ребенком будут заниматься</div>
		</div>

		<?php
			$coaches = get_sub_field( 'coaches' );
			if ( $coaches ) :
		?>
			<div class="coaches__slider">
				<div class="coaches__slider-wrapper swiper">
					<ul class="reset-list coaches__slider-list swiper-wrapper">
						<?php
							foreach ( $coaches as $post ) :
							setup_postdata( $post );
						?>
							<li class="coaches__slider-item swiper-slide">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail( 'medium', array(
											'class' => 'coaches__slider-img'
										) );
									} else {
										echo wp_get_attachment_image( 146, 'medium', false, array(
											'class' => 'coaches__slider-img'
										) );
									}
								?>

								<div class="coaches__slider-info">
									<div class="coaches__slider-name"><?php the_title(); ?></div>

									<div class="coaches__slider-experience">
										<span></span>
										Стаж более <?php endingExperience( get_field( 'experience' ) ); ?>
									</div>
								</div>
							</li>
						<?php
							endforeach;
							wp_reset_postdata();
						?>
					</ul>
				</div>

				<div class="btn-prev coaches__slider-prev">
					<svg width="24" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
				</div>

				<div class="btn-next coaches__slider-next">
					<svg width="24" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
				</div>

				<div class="coaches__slider-pagination swiper-pagination"></div>
			</div>

			<div class="coaches__person swiper">
				<ul class="reset-list coaches__person-list swiper-wrapper">
					<?php
						foreach ( $coaches as $post ) :
						setup_postdata( $post );
					?>
						<li class="coaches__person-item swiper-slide">
							<?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'large', array(
                                        'class' => 'coaches__person-img'
                                    ) );
                                } else {
                                    echo wp_get_attachment_image( 146, 'large', false, array(
                                        'class' => 'coaches__person-img'
                                    ) );
                                }
                            ?>

                            <div class="coaches__person-info">
								<?php if ( get_field( 'job' ) ) : ?>
									<div class="coaches__person-job"><?php the_field( 'job' ); ?></div>
								<?php endif; ?>

                                <div class="coaches__person-name"><?php the_title(); ?></div>

                                <div class="coaches__person-experience">Стаж работы в тренерской деятельности более <?php endingExperience( get_field( 'experience' ) ); ?></div>

								<?php if ( get_field( 'achievements' ) ) : ?>
									<div class="coaches__person-achievements">
										<span>
											<svg width="20" height="24"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-medal"></use></svg>
										</span>

										<?php the_field( 'achievements' );?>
									</div>
								<?php endif; ?>
                            </div>

							<?php
								$gallery = get_field( 'gallery', $post );
								if ( $gallery ) :
							?>
								<div class="coaches__gallery">
									<div class="coaches__gallery-wrapper swiper">
										<div class="coaches__gallery-list swiper-wrapper">
											<?php foreach ( $gallery as $item ) : ?>
												<a href="<?php echo $item['url']; ?>" class="coaches__gallery-item swiper-slide" data-fancybox="coach-gallery-<?php echo $post; ?>">
													<?php echo wp_get_attachment_image( $item['id'], 'medium', false ); ?>
												</a>
											<?php endforeach; ?>
										</div>
									</div>

									<div class="btn-prev coaches__gallery-prev">
										<svg width="24" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-left"></use></svg>
									</div>

									<div class="btn-next coaches__gallery-next">
										<svg width="24" height="16"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-arrow-right"></use></svg>
									</div>
								</div>
							<?php endif; ?>
						</li>
					<?php
						endforeach;
						wp_reset_postdata();
					?>
				</ul>
			</div>
		<?php endif; ?>
	</div>
</section>
