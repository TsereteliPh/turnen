<?php
	$medal = get_sub_field( 'medal' );
	$text = get_sub_field( 'text' );
	$tagline = get_sub_field( 'tagline' );
	$social = get_sub_field( 'social' );
?>

<section class="medal<?php echo ( $medal == 'silver' ) ? ' medal--silver' : ''; ?>">
	<div class="container medal__container<?php echo ( get_sub_field( 'indent' ) ) ? ' medal__container--indent' : ''; ?>">

		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/medal--<?php echo $medal; ?>.png" alt="Серебрянная медаль школы turnen" width="435" height="325">

		<?php if ( $text && $medal == 'gold' ) : ?>
			<div class="medal__text<?php echo ( !$tagline ) ? ' medal__text--lonely' : ''; ?>"><?php echo $text; ?></div>
		<?php endif; ?>

		<?php if ( $tagline && $medal == 'gold' ) : ?>
			<div class="medal__tagline"><?php echo $tagline; ?></div>
		<?php endif; ?>

		<?php
			if ( $social && $medal == 'silver' ) :
				$currentSocial = get_field( $social, 'options' );

				$beforeSocialLink;
				$socialLink;

				if ( $social == 'telegram') {
					$beforeSocialLink = 'https://t.me/';

					if ( $currentSocial['type'] == 'link' ) {
						$socialLink = preg_replace('/@/', '', $telegram['link']);
					} else {
						$socialLink = preg_replace('/[^0-9,+]/', '', $telegram['number']);
					}
				} else if ( $social == 'whatsapp' ) {
					$beforeSocialLink = 'https://wa.me/';
					$socialLink = preg_replace('/[^0-9,+]/', '', $currentSocial['link']);
				} else if ( $social == 'phone' ) {
					$beforeSocialLink = 'tel:';
					$socialLink = preg_replace('/[^0-9,+]/', '', $currentSocial['link']);
				}
		?>
			<div class="medal__social">
				<a href="<?php echo $beforeSocialLink . $socialLink; ?>" class="medal__link" target="_blank">
					<svg width="40" height="40"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#icon-<?php echo $social; ?>"></use></svg>
					<?php echo $currentSocial['link']; ?>
				</a>
				<?php
					if ( $currentSocial['desc'] ) {
						echo $currentSocial['desc'];
					}
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
