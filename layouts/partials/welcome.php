<?php $welcome = get_field( 'welcome' ); ?>
<section class="welcome" data-text="<?php echo $welcome['bg-text']; ?>">
	<video class="welcome__video" src="<?php echo get_template_directory_uri(); ?>/assets/videos/welcome-video.mp4" type="video/mp4" autoplay muted loop></video>

	<div class="container welcome__container">
		<div class="st-hypten welcome__desc"><?php echo $welcome['desc']; ?></div>

		<button class="btn-circle welcome__button" type="button" data-fancybox data-src="#callback">Узнать расписание занятий</button>

		<h1 class="welcome__title"><?php echo $welcome['title']; ?></h1>
	</div>
</section>
