<div class="wrap">
    <h1>
        Links Performance -
		<?php if ( is_null( $link ) ): ?>
            All Links
		<?php else : ?>
			<?php echo esc_html( $link->title ) ?>
		<?php endif; ?>
    </h1>
    <!--    <p>You can view your link stats</p>-->
    <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 20px;">
		<?php if ( is_null( $link ) ): ?>
            <select name="" id="bl-stats-selector" style="width: 700px">
                <option value="">Last 7 Days</option>
                <option value="14days" <?php echo ! empty( $_GET['view'] ) && $_GET['view'] == '14days' ? 'selected' : ''; ?>>
                    Last 14 Days
                </option>
                <option value="30days" <?php echo ! empty( $_GET['view'] ) && $_GET['view'] == '30days' ? 'selected' : ''; ?>>
                    Last 30 Days
                </option>
            </select>
		<?php else : ?>
            <select name="" id="bl-stats-link-selector" style="width: 700px" data-link="<?php echo $link->id ?>">
                <option value="">Last 7 Days</option>
                <option value="14days" <?php echo ! empty( $_GET['view'] ) && $_GET['view'] == '14days' ? 'selected' : ''; ?>>
                    Last 14 Days
                </option>
                <option value="30days" <?php echo ! empty( $_GET['view'] ) && $_GET['view'] == '30days' ? 'selected' : ''; ?>>
                    Last 30 Days
                </option>
            </select>
		<?php endif; ?>
    </div>

    <h2 class="prime-affiliate-links-stats-header">Total Link Clicks By Date</h2>
    <div class="prime-affiliate-links-stats-wrapper">
        <canvas id="prime-affiliate-links-stats-dates" data-clicks='<?php echo esc_attr( $clicks_dates ); ?>' height="350"
                width="800"></canvas>
    </div>

	<?php if ( empty( $_GET['type'] ) ) : ?>
        <h2 class="prime-affiliate-links-stats-header">Total Link Clicks By Links</h2>
        <div class="prime-affiliate-links-stats-wrapper">
            <canvas id="prime-affiliate-links-stats-links" data-clicks='<?php echo esc_attr( $clicks_links ); ?>'
                    height="350" width="800"></canvas>
        </div>
	<?php endif; ?>

    <h2 class="prime-affiliate-links-stats-header">Total Link Clicks By Location</h2>
    <div class="prime-affiliate-links-stats-wrapper">
        <canvas id="prime-affiliate-links-stats-countries" data-clicks='<?php echo esc_attr( $clicks_countries ); ?>'
                height="350" width="800"></canvas>
    </div>
</div>