<?php use Mono_WP\Prime_Affiliate_Links\Plugin;

if ( Plugin::get_instance()->has_valid_licence() ) : ?>

    <div class="form-field form-required">
        <input type="hidden" name="<?php echo esc_attr( 'save_' . Plugin::get_instance()->cpt . 'meta' ) ?>" value="1">
        <label for="<?php echo esc_attr( $prefix ) ?>link_id">Affiliate Link ID</label>
        <input name="<?php echo esc_attr( $prefix ) ?>link_id" id="<?php echo esc_attr( $prefix ) ?>link_id"
               type="number"
               value="<?php echo esc_attr( get_post_meta( $post->ID, $prefix . 'link_id', true ) ) ?>" size="40"
               required>
        <p>The ID of the affiliate link you wish to insert.</p>
    </div>

    <div class="form-field form-required">
        <label for="<?php echo esc_attr( $prefix ) ?>link_text">Display Text</label>
        <input name="<?php echo esc_attr( $prefix ) ?>link_text" id="<?php echo esc_attr( $prefix ) ?>link_text"
               type="text"
               value="<?php echo esc_attr( get_post_meta( $post->ID, $prefix . 'link_text', true ) ? get_post_meta( $post->ID, $prefix . 'link_text', true ) : 'This post is sponsored by' ) ?>"
               size="40" required>
        <p>The text to display before the affiliate link banner.</p>
    </div>

    <div class="form-field form-required">
        <label for="<?php echo esc_attr( $prefix ) ?>link_text_classes">Additional CSS classes for display text</label>
        <input name="<?php echo esc_attr( $prefix ) ?>link_text_classes" id="<?php echo $prefix ?>link_text_classes"
               type="text"
               value="<?php echo esc_attr( get_post_meta( $post->ID, $prefix . 'link_text_classes', true ) ) ?>"
               size="40" required>
        <p>Separate ach class with a comma (,) EG class-one, class-two .</p>
    </div>

    <div class="form-field form-required">
        <label for="<?php echo esc_attr( $prefix ) ?>link_banner_classes">Additional CSS classes for link banner</label>
        <input name="<?php echo esc_attr( $prefix ) ?>link_banner_classes"
               id="<?php echo esc_attr( $prefix ) ?>link_banner_classes" type="text"
               value="<?php echo esc_attr( get_post_meta( $post->ID, $prefix . 'link_banner_classes', true ) ) ?>"
               size="40"
               required>
        <p>Separate ach class with a comma (,) EG class-one, class-two .</p>
    </div>

<?php endif; ?>

<?php if ( ! Plugin::get_instance()->has_valid_licence() ): ?>
    <p><strong>Affiliate links post sponsor feature only available in PRO version. <a
                    href="<?php echo esc_attr( \Mono_WP\Prime_Affiliate_Links\Plugin::get_instance()->upgrade_link() ) ?>">Upgrade
                now to access all features!</a></strong></p>
<?php endif; ?>
