<?php

use Mono_WP\Prime_Affiliate_Links\Plugin;

?>
<div class="form-field form-required prime-affiliate-links-form-group">
    <input type="hidden" name="<?php echo esc_attr( 'save_' . Plugin::get_instance()->cpt . 'meta' ) ?>" value="1">
    <label for="<?php echo esc_attr( $prefix ) ?>link_url">Affiliate Link URL</label>
    <input name="<?php echo esc_attr( $prefix ) ?>link_url" id="<?php echo esc_attr( $prefix ) ?>link_url" type="url"
           value="<?php echo esc_attr( get_post_meta( $post->ID, 'link_url', true ) ) ?>" size="40" required>
    <p class="prime-affiliate-links-form-help-text">The affiliate link you wish to shorten.</p>
</div>

<div class="form-field form-required prime-affiliate-links-form-group">
    <label for="<?php echo esc_attr( $prefix ) ?>link_slug">Link Slug</label>
    <input name="<?php echo esc_attr( $prefix ) ?>link_slug" id="<?php echo esc_attr( $prefix ) ?>link_slug" type="text"
           value="<?php echo esc_attr( get_post_meta( $post->ID, 'link_slug', true ) ? get_post_meta( $post->ID, 'link_slug', true ) : monowp_rand_string(5) ) ?>" size="40" required <?php if( get_post_meta( $post->ID, 'link_slug', true ) ) : ?> readonly <?php endif; ?> >
    <p class="prime-affiliate-links-form-help-text">The slug to use for this link. This cannot be changed after the link is saved</p>
</div>

<div class="form-field form-required">
    <label style="display: block; margin-bottom: 5px;">Affiliate Link Banner Image</label>
    <button type="button" class="button button-primary" id="prime-affiliate-links-upload-link-banner-btn">Upload Image
    </button>
    <input type="hidden" id="prime-affiliate-links-link-banner" name="<?php echo esc_attr( $prefix ) ?>link_banner"
           value="<?php echo esc_attr( get_post_meta( $post->ID, 'link_banner', true ) ) ?>">
    <img src="<?php echo esc_attr( get_post_meta( $post->ID, 'link_banner', true ) ) ?>" alt=""
         id="prime-affiliate-links-link-banner-img"
         style="display: block; margin-top: 10px">
    <p>The banner image to use for this affiliate link.</p>
</div>
