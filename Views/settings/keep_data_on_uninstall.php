
<input type="radio" name="<?php echo esc_attr( $setting ) ?>>"
       id="<?php echo esc_attr( $setting ) ?>>"
       class="option-field " style="" value="1" <?php echo $value == 1 ? 'checked' : '' ?>>
<label class="<?php echo esc_attr( $setting ) ?>>">Yes</label>

<br>

<input type="radio" name="<?php echo esc_attr( $setting ) ?>>"
       id="<?php echo esc_attr( $setting ) ?>>"
       class="option-field " style="" value="0" <?php echo $value == 0 ? 'checked' : '' ?>>
<label class="<?php echo esc_attr( $setting ) ?>>">No</label>

<br>

<p class="prime-affiliate-links-form-notification"><i><span class="dashicons dashicons-info-outline"></span> Should plugin data be kept even after uninstalling the plugin?</i></p>
