<?php
	$medal = get_sub_field( 'medal' );
	$text = get_sub_field( 'text' );
	$tagline = get_sub_field( 'tagline' );
?>

<section class="medal<?php echo ( $medal == 'silver' ) ? ' medal--silver' : ''; ?>">
	<div class="container medal__container<?php echo ( get_sub_field( 'indent' ) ) ? ' medal__container--indent' : ''; ?>">

		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/medal--<?php echo $medal; ?>.png" alt="Серебрянная медаль школы turnen" width="435" height="325">

		<?php if ( $text ) : ?>
			<div class="medal__text<?php echo ( !$tagline ) ? ' medal__text--lonely' : ''; ?>"><?php echo $text; ?></div>
		<?php endif; ?>

		<?php if ( $tagline ) : ?>
			<div class="medal__tagline"><?php echo $tagline; ?></div>
		<?php endif; ?>
	</div>
</section>
