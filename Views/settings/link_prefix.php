<?php
$setting = get_option( $prefix . 'link_prefix' );

// TODO javascript for custom prefix
?>

<input type="hidden" name="<?php echo esc_html( $prefix ) ?>is_custom_link_prefix" value="0">

<select data-placeholder="Choose an option..." name="<?php echo esc_html( $prefix ) ?>link_prefix"
        id="<?php echo esc_attr( $prefix ) ?>link_prefix"
        class="option-field selectize-select " style="width:360px;">
    <!--    <option value="custom">-- custom --</option>-->
    <option value="recommends" <?php if ( $setting == 'r' ) : ?> selected <?php endif; ?>>r</option>
    <option value="recommends" <?php if ( $setting == 'a' ) : ?> selected <?php endif; ?>>a</option>
    <option value="recommends" <?php if ( $setting == 'recommends' ) : ?> selected <?php endif; ?>>recommends</option>
    <option value="refers" <?php if ( $setting == 'refers' ) : ?> selected <?php endif; ?>>refers</option>
    <option value="link" <?php if ( $setting == 'link' ) : ?> selected <?php endif; ?>>link</option>
    <option value="go" <?php if ( $setting == 'go' ) : ?> selected <?php endif; ?>>go</option>
    <option value="review" <?php if ( $setting == 'review' ) : ?> selected <?php endif; ?>>review</option>
    <option value="product" <?php if ( $setting == 'product' ) : ?> selected <?php endif; ?>>product</option>
    <option value="suggests" <?php if ( $setting == 'suggests' ) : ?> selected <?php endif; ?>>suggests</option>
    <option value="follow" <?php if ( $setting == 'follow' ) : ?> selected <?php endif; ?>>follow</option>
    <option value="endorses" <?php if ( $setting == 'endorses' ) : ?> selected <?php endif; ?>>endorses</option>
    <option value="proceed" <?php if ( $setting == 'proceed' ) : ?> selected <?php endif; ?>>proceed</option>
    <option value="fly" <?php if ( $setting == 'fly' ) : ?> selected <?php endif; ?>>fly</option>
    <option value="goto" <?php if ( $setting == 'goto' ) : ?> selected <?php endif; ?>>goto</option>
    <option value="get" <?php if ( $setting == 'get' ) : ?> selected <?php endif; ?>>get</option>
    <option value="find" <?php if ( $setting == 'find' ) : ?> selected <?php endif; ?>>find</option>
    <option value="act" <?php if ( $setting == 'act' ) : ?> selected <?php endif; ?>>act</option>
    <option value="click" <?php if ( $setting == 'click' ) : ?> selected <?php endif; ?>>click</option>
    <option value="move" <?php if ( $setting == 'move' ) : ?> selected <?php endif; ?>>move</option>
    <option value="offer" <?php if ( $setting == 'offer' ) : ?> selected <?php endif; ?>>offer</option>
    <option value="run" <?php if ( $setting == 'run' ) : ?> selected <?php endif; ?>>run</option>
    <option value="partners" <?php if ( $setting == 'partners' ) : ?> selected <?php endif; ?>>partners</option>
    <option value="affiliates" <?php if ( $setting == 'affiliates' ) : ?> selected <?php endif; ?>>affiliates</option>
    <option value="find" <?php if ( $setting == 'find' ) : ?> selected <?php endif; ?>>find</option>
</select>

<p>The prefix that comes before your cloaked link's slug.</p>
<p>eg. http://<?php echo esc_html( $_SERVER['HTTP_HOST'] ) ?>/<?php echo esc_html( $setting ) ?>
    /your-affiliate-link-name.</p>

<p style="margin-top: 20px;"><strong>Warning :</strong> Changing this setting after you've used links in a post could
    break those links. Be careful!</p>
