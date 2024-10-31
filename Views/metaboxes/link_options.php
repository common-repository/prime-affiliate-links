

<!-- Redirection Type -->
<?php
    $redirection_attr =  $prefix . 'redirection_type';
    $global_redirection_type = get_option( $prefix . 'redirection_type' );
    $redirection_type = get_post_meta( $post->ID, 'redirection_type', true );
    $link_url = get_post_meta( $post->ID, 'link_url', true );
?>
<p><strong>Redirection Type</strong></p>
<input type="radio" name="<?php echo esc_attr( $redirection_attr ) ?>"
       id="<?php echo esc_attr( $redirection_attr ) ?>"
       class="option-field "
       style="" value="302" <?php if( ! $link_url ) echo $global_redirection_type == '302' ? 'checked' : ''; else  echo $redirection_type == '302' ? 'checked' : ''; ?>>
<label class="<?php echo esc_attr( $redirection_attr ) ?>">302 Temporary</label>

<br>

<input type="radio" name="<?php echo esc_attr( $redirection_attr ) ?>"
       id="<?php echo esc_attr( $redirection_attr ) ?>"
       class="option-field "
       style="" value="307" <?php if( ! $link_url ) echo $global_redirection_type == '307' ? 'checked' : ''; else echo $redirection_type == '307' ? 'checked' : ''; ?>>
<label class="<?php echo esc_attr( $redirection_attr ) ?>">307 Temporary (alternative)</label>

<br>

<input type="radio" name="<?php echo esc_attr( $redirection_attr ) ?>"
       id="<?php echo esc_attr( $redirection_attr ) ?>"
       class="option-field "
       style="" value="301" <?php if( ! $link_url ) echo $global_redirection_type == '301' ? 'checked' : ''; else echo $redirection_type == '301' ? 'checked' : ''; ?>>
<label class="<?php echo esc_attr( $redirection_attr ) ?>">301 Permanent</label>


<!-- No Follow Link -->
<?php
$add_no_follow_attr =  $prefix . 'add_no_follow';
$global_add_no_follow = get_option( $prefix . 'add_no_follow' );
$add_no_follow = get_post_meta( $post->ID, 'add_no_follow', true );
?>
<p><strong>No follow this link?</strong></p>

<input type="radio" name="<?php echo esc_attr( $add_no_follow_attr ) ?>"
       id="<?php echo esc_attr( $add_no_follow_attr ) ?>>"
       class="option-field " style=""
       value="1" <?php if( ! $link_url ) echo $global_add_no_follow == '1' ? 'checked' : ''; else echo $add_no_follow == '1' ? 'checked' : ''; ?>>
<label class="<?php echo esc_attr( $add_no_follow_attr ) ?>>">Yes</label>

<br>

<input type="radio" name="<?php echo esc_attr( $add_no_follow_attr ) ?>"
       id="<?php echo esc_attr( $add_no_follow_attr ) ?>>"
       class="option-field " style=""
       value="0" <?php if( ! $link_url ) echo $global_add_no_follow == '0' ? 'checked' : ''; else echo $add_no_follow == '0' ? 'checked' : ''; ?>>
<label class="<?php echo esc_attr( $add_no_follow_attr ) ?>>">No</label>

<!-- Open In New Tab -->
<?php
$open_in_new_tab_attr =  $prefix . 'open_in_new_tab';
$global_open_in_new_tab = get_option( $prefix . 'open_in_new_tab' );
$open_in_new_tab = get_post_meta( $post->ID, 'open_in_new_tab', true );
?>
<p><strong>Open link in new tab?</strong></p>

<input type="radio" name="<?php echo esc_attr( $open_in_new_tab_attr ) ?>"
       id="<?php echo esc_attr( $open_in_new_tab_attr ) ?>"
       class="option-field "
       style="" value="1" <?php if( ! $link_url ) echo $global_open_in_new_tab == '1' ? 'checked' : ''; else echo $open_in_new_tab == '1' ? 'checked' : ''; ?>>
<label class="<?php echo esc_attr( $open_in_new_tab_attr ) ?>">Yes</label>

<br>

<input type="radio" name="<?php echo esc_attr( $open_in_new_tab_attr ) ?>"
       id="<?php echo esc_attr( $open_in_new_tab_attr ) ?>"
       class="option-field "
       style="" value="0" <?php if( ! $link_url ) echo $global_open_in_new_tab == '0' ? 'checked' : ''; else echo $open_in_new_tab == '0' ? 'checked' : ''; ?>>
<label class="<?php echo esc_attr( $open_in_new_tab_attr ) ?>">No</label>


<!-- Forward Query Parameters -->
<?php
$forward_parameters_attr =  $prefix . 'forward_parameters';
$global_forward_parameters = get_option( $prefix . 'forward_parameters' );
$forward_parameters = get_post_meta( $post->ID, 'forward_parameters', true );
?>
<p><strong>Forward Query Parameters?</strong></p>

<input type="radio" name="<?php echo esc_attr( $forward_parameters_attr ) ?>"
       id="<?php echo esc_attr( $forward_parameters_attr ) ?>>"
       class="option-field "
       style="" value="1" <?php if( ! $link_url ) echo $global_forward_parameters == '1' ? 'checked' : ''; else echo $forward_parameters == '1' ? 'checked' : ''; ?>>
<label class="<?php echo esc_attr( $forward_parameters_attr ) ?>>">Yes</label>

<br>

<input type="radio" name="<?php echo esc_attr( $forward_parameters_attr ) ?>"
       id="<?php echo esc_attr( $forward_parameters_attr ) ?>>"
       class="option-field "
       style="" value="0" <?php if( ! $link_url ) echo $global_forward_parameters == '0' ? 'checked' : ''; else echo $forward_parameters == '0' ? 'checked' : ''; ?>>
<label class="<?php echo esc_attr( $forward_parameters_attr ) ?>>">No</label>


<!-- Uncloak Links -->
<?php
$uncloak_attr =  $prefix . 'uncloak';
$global_uncloak = get_option( $prefix . 'uncloak' );
$uncloak = get_post_meta( $post->ID, 'uncloak', true );
?>
<p><strong>Uncloak Link?</strong></p>

<input type="radio" name="<?php echo esc_attr( $uncloak_attr ) ?>" id="<?php echo esc_attr( $uncloak_attr ) ?>>"
       class="option-field " style=""
       value="1" <?php if( ! $link_url ) echo $global_uncloak == '1' ? 'checked' : ''; else echo $uncloak == '1' ? 'checked' : ''; ?>>
<label class="<?php echo esc_attr( $uncloak_attr ) ?>>">Yes</label>

<br>

<input type="radio" name="<?php echo esc_attr( $uncloak_attr ) ?>" id="<?php echo esc_attr( $uncloak_attr ) ?>>"
       class="option-field " style=""
       value="0" <?php if( ! $link_url ) echo $global_uncloak == '0' ? 'checked' : ''; else echo $uncloak == '0' ? 'checked' : ''; ?>>
<label class="<?php echo esc_attr( $uncloak_attr ) ?>>">No</label>

