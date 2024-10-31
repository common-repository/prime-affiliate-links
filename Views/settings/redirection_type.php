
<input type="radio" name="<?php echo esc_attr( $setting ) ?>"
       id="<?php echo esc_attr( $setting ) ?>"
       class="option-field "
       style="" value="302" <?php if ( $value == '302' ) : ?> checked <?php endif; ?>>
<label class="<?php echo esc_attr( $setting ) ?>">302 Temporary</label>

<br>

<input type="radio" name="<?php echo esc_attr( $setting ) ?>"
       id="<?php echo esc_attr( $setting ) ?>"
       class="option-field "
       style="" value="307" <?php if ( $value == '307' ) : ?> checked <?php endif; ?>>
<label class="<?php echo esc_attr( $setting ) ?>">307 Temporary (alternative)</label>

<br>

<input type="radio" name="<?php echo esc_attr( $setting ) ?>"
       id="<?php echo esc_attr( $setting ) ?>"
       class="option-field "
       style="" value="301" <?php if ( $value == '301' ) : ?> checked <?php endif; ?>>
<label class="<?php echo esc_attr( $setting ) ?>">301 Permanent</label>

<br>

<p class="prime-affiliate-links-form-notification"><i><span class="dashicons dashicons-info-outline"></span> This is the type of redirect Prime Affiliate Links will use to redirect the user to your affiliate
        link</i></p>