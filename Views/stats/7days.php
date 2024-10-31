<div class="wrap">
    <div class="prime-affiliate-links-stats-wrapper">
		<?php

		( new \Mono_WP\Prime_Affiliate_Links\Controllers\Stats_Controller() )->generate_stats();
		?>
        <canvas id="prime-affiliate-links-stats"></canvas>
    </div>
</div>