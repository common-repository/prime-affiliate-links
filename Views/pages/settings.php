<?php use Mono_WP\Prime_Affiliate_Links\Plugin;

settings_errors(); ?>

<div class="wrap">

    <nav class="nav-tab-wrapper">
        <a href="<?php esc_attr( admin_url( 'edit.php?post_type=' . Plugin::get_instance()->prefix . '&page=settings' ) ) ?>"
           class="nav-tab <?php if ( $tab == 'settings' ) : ?>nav-tab-active<?php endif; ?>">Settings</a>
        <a href="<?php esc_attr( admin_url( 'edit.php?post_type=' . Plugin::get_instance()->prefix . '&page=settings&tab=guide' ) ) ?>"
           class="nav-tab <?php if ( $tab == 'guide' ): ?>nav-tab-active<?php endif; ?>">User Guide</a>
    </nav>

    <div class="tab-content">
		<?php switch ( $tab ) :
			case 'settings': ?>
                <form action="options.php" method="post">
					<?php
					settings_fields( Plugin::get_instance()->prefix . 'settings' );
					do_settings_sections( Plugin::get_instance()->prefix . 'settings' );
					submit_button( 'Save Settings' );
					?>
                </form>
				<?php break;
			case 'guide':
				\Mono_WP\Prime_Affiliate_Links\Helpers\View::render( 'pages.guide' );
				break;
			case 'tools':
				\Mono_WP\Prime_Affiliate_Links\Helpers\View::render( 'settings.tools' );
				break;
		endswitch; ?>
    </div>


</div>
