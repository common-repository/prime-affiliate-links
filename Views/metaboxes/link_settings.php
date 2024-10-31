<?php

use  Mono_WP\Prime_Affiliate_Links\Plugin ;
?>

<!-- Link Keywords -->
<div class="form-field form-required prime-affiliate-links-form-group">
        <label for="<?php 
echo  esc_attr( $prefix ) ;
?>link_url">Autolink Keywords</label>

    <?php 
?>

	<?php 

if ( $is_not_paying ) {
    ?>
        <input type="text" disabled style="margin-bottom: 5px;">
        <strong><a href="<?php 
    echo  esc_attr( $upgrade_link ) ;
    ?>">This feature is only availbale in the Pro version of
                Prime Affiliate Links. Click to upgrade and access all pro feaures.</a></strong>
	<?php 
}

?>


        <p class="prime-affiliate-links-form-help-text">The keywords you want to auto link to replace with a link to this
            affiliate
            link in posts and pages. Separate
            each keyword with a comma (,) Eg. make money, fashion, email marketing</p>
</div>

<!-- Link Expiration -->
<!--<div class="form-field form-required prime-affiliate-links-form-group">-->
<!--	--><?php 
// if ( Plugin::get_instance()->has_valid_licence() ) :
?>
<!--        <label for="--><?php 
// echo $prefix
?><!--link_expiration_chooser">Link Expiration</label>-->
<!---->
<!--        <input type="hidden" name="--><?php 
// echo $prefix
?><!--link_expiration" id="--><?php 
// echo $prefix
?><!--link_expiration"-->
<!--               value="0">-->
<!---->
<!--        <select name="--><?php 
// echo $prefix
?><!--link_expiration_chooser" id="--><?php 
// echo $prefix
?><!--link_expiration_chooser">-->
<!--            <option value="never">Never</option>-->
<!--            <option value="date">Set Expiration Date</option>-->
<!--        </select>-->
<!---->
<!--        <div id="--><?php 
// echo $prefix
?><!--link_expiration_settings" style="display: none;">-->
<!--            <div style="display: flex; margin-top: 15px;">-->
<!--                <p style="margin-right: 10px; font-weight: 400; width: 12%">Set Expiration Date</p>-->
<!--                <input type="date" id="--><?php 
// echo $prefix
?><!--link_expiration_date" size="40" style="width: 40%">-->
<!--            </div>-->
<!---->
<!--            <div style="display: flex; margin-top: 15px;">-->
<!--                <p style="margin-right: 10px; font-weight: 400; width: 12%">Set Expiration Redirect Link</p>-->
<!--                <input type="url" id="--><?php 
// echo $prefix
?><!--link_expiration_link"-->
<!--                       name="--><?php 
// echo $prefix
?><!--link_expiration_link" style="width: 40%">-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!---->
<!--        <p class="prime-affiliate-links-form-help-text">You can set your expire after a set date. You can also configure a url to-->
<!--            redirect to after expiration.</p>-->
<!--	--><?php 
// endif;
?>
<!---->
<!--	--><?php 
// if ( ! Plugin::get_instance()->has_valid_licence() ):
?>
<!--        <p><strong>Keywords auto-linking feature only available in PRO version. <a-->
<!--                        href="--><?php 
// echo \Mono_WP\Prime_Affiliate_Links\Plugin::get_instance()->upgrade_link()
?><!--">Upgrade-->
<!--                    now to access all features!</a></strong></p>-->
<!--	--><?php 
// endif;
?>
<!--</div>-->

<!-- Link Password -->
<div class="form-field form-required prime-affiliate-links-form-group">
        <label for="<?php 
echo  esc_attr( $prefix ) ;
?>link_password_chooser">Password Protect Link</label>

        <?php 
?>

	<?php 

if ( $is_not_paying ) {
    ?>
        <input type="text" disabled style="margin-bottom: 5px;">
        <strong><a href="<?php 
    echo  esc_attr( $upgrade_link ) ;
    ?>">This feature is only availbale in the Pro version of
                Prime Affiliate Links. Click to upgrade and access all pro feaures.</a></strong>
	<?php 
}

?>


        <p class="prime-affiliate-links-form-help-text">You can protect this link with a password which will be required
            before
            users can be redirected.</p>

</div>

