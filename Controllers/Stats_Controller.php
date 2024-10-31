<?php

namespace Mono_WP\Prime_Affiliate_Links\Controllers;

use Mono_WP\Prime_Affiliate_Links\Models\Affiliate_Link;
use Mono_WP\Prime_Affiliate_Links\Models\Click;

class Stats_Controller extends Base_Controller {

	private function get_days( $days ) {
		$m  = date( 'm' );
		$de = date( 'd' );
		$y  = date( 'Y' );

		$date_arr = [];

		for ( $i = 0; $i <= $days - 1; $i ++ ) {
			$date_arr[] = date( 'd M Y', mktime( 0, 0, 0, $m, ( $de - $i ), $y ) );
		}

		return array_reverse( $date_arr );
	}

	public function generate_stats_days( $view = '7days', $type = 'all', $link_id = 0 ) {
		switch ( $view ) {
			case '7days':
				return $this->get_clicks_days( $this->get_days( '7' ), $type, $link_id );
				break;
			case '14days':
				return $this->get_clicks_days( $this->get_days( '14' ), $type, $link_id );
				break;
			case '30days':
				return $this->get_clicks_days( $this->get_days( '30' ), $type, $link_id );
				break;
		}

	}

	public function generate_stats_links( $view = '7days', $type = 'all', $link_id = 0 ) {
		switch ( $view ) {
			case '7days':
				return $this->get_clicks_links( $this->get_days( '7' ), $type, $link_id );
				break;
			case '14days':
				return $this->get_clicks_links( $this->get_days( '14' ), $type, $link_id );
				break;
			case '30days':
				return $this->get_clicks_links( $this->get_days( '30' ), $type, $link_id );
				break;
		}

	}

	public function generate_stats_countries( $view = '7days', $type = 'all', $link_id = 0 ) {
		switch ( $view ) {
			case '7days':
				return $this->get_clicks_countries( $this->get_days( '7' ), $type, $link_id );
				break;
			case '14days':
				return $this->get_clicks_countries( $this->get_days( '14' ), $type, $link_id );
				break;
			case '30days':
				return $this->get_clicks_countries( $this->get_days( '30' ), $type, $link_id );
				break;
		}

	}

	private function get_clicks_days( $days, $type, $link_id ) {
		$clicks     = Click::all();
		$clicks_arr = [];

		foreach ( $days as $day ) {
			$clicks_arr[ $day ] = 0;
		}

		foreach ( $clicks as $click ) {
			$click_o = new Click( $click->ID );
			foreach ( $days as $day ) {
				if ( $type != 'all' ) {
					if ( $click_o->get( 'link_id' ) != $link_id ) {
						continue;
					}
				}
				if ( $click_o->get( 'date' ) == $day ) {
					$clicks_arr[ $day ] ++;
				}
			}
		}

		return $clicks_arr;
	}

	private function get_clicks_links( $days, $type, $link_id ) {
		$clicks     = Click::all();
		$clicks_arr = [];

		foreach ( $clicks as $click ) {
			$click_o = new Click( $click->ID );
			foreach ( $days as $day ) {
				if ( $click_o->get( 'date' ) == $day ) {
					if ( empty( $clicks_arr[ ( new Affiliate_Link( $click_o->get( 'link_id' ) ) )->title ] ) ) {
						$clicks_arr[ ( new Affiliate_Link( $click_o->get( 'link_id' ) ) )->title ] = 1;
					} else {
						$clicks_arr[ ( new Affiliate_Link( $click_o->get( 'link_id' ) ) )->title ] ++;
					}
				}
			}
		}

		return $clicks_arr;
	}

	private function get_clicks_countries( $days, $type, $link_id ) {
		$clicks     = Click::all();
		$clicks_arr = [];

		foreach ( $clicks as $click ) {
			$click_o = new Click( $click->ID );
			foreach ( $days as $day ) {
				if ( $click_o->get( 'date' ) == $day ) {
					if ( $type != 'all' ) {
						if ( $click_o->get( 'link_id' ) != $link_id ) {
							continue;
						}
					}
					if ( empty( $clicks_arr[ $click_o->get( 'country' ) ] ) ) {
						$clicks_arr[ $click_o->get( 'country' ) ] = 1;
					} else {
						$clicks_arr[ $click_o->get( 'country' ) ] ++;
					}
				}
			}
		}

		return $clicks_arr;
	}

}