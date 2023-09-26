<section class="main-text">
	<div class="container">
		<?php get_template_part('/layouts/partials/title', null, array(
			'class' => 'title--normal main-text__title',
			'title' => get_sub_field('title')
		)); ?>

		<div class="main-text__text"><?php the_sub_field( 'text' ); ?></div>
	</div>
</section>
