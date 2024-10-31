<div class="prime-affiliate-links-sponsors-row">
	<?php

	use Mono_WP\Prime_Affiliate_Links\Models\Affiliate_Link;

	$count = 0;

	foreach ( $affiliateLinks as $affiliateLink ) :
		$affiliateLink = new Affiliate_Link( $affiliateLink->ID );
		if ( $widget['pinkLinksAtRandom'] == 'on' && $widget['limit'] == $count ) {
			break;
		}

		?>

        <div class="prime-affiliate-links-sponsors-column">
            <a href="<?php echo esc_attr( $affiliateLink->permalink ) ?>"
               target="<?php echo esc_attr( $affiliateLink->get_target() ) ?>"
               rel="<?php echo esc_attr( $affiliateLink->get_rel() ) ?>">
				<?php if ( $widget['showLinkTitle'] ): ?>
                    <p class="<?php echo esc_attr( implode( ' ', explode( ',', $widget['textClasses'] ) ) ) ?>">
                        <strong><?php echo esc_html( $affiliateLink->title ) ?></strong></p>
				<?php endif; ?>
                <img src="<?php echo esc_attr( $affiliateLink->get( 'link_banner' ) ) ?>" alt=""
                     class="<?php echo esc_attr( implode( ' ', explode( ',', $widget['bannerClasses'] ) ) ) ?>">
            </a>
        </div>

		<?php
		$count ++;
	endforeach;
	?>

</div>
