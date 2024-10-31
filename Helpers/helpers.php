<?php

if ( ! function_exists('monowp_dd') ) {
	function monowp_dd( $var ) {
		echo '<pre>';
		var_dump( $var );
		echo '<pre>';
		die;
	}
}

if ( ! function_exists( 'monowp_rand_string' ) ) {
	function monowp_rand_string($length = 5) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}

if ( ! function_exists( 'monowp_number_format' ) ) {
	function monowp_number_format( $num ) {
		if($num>1000) {

			$x = round($num);
			$x_number_format = number_format($x);
			$x_array = explode(',', $x_number_format);
			$x_parts = array('K', 'M', 'B', 'T');
			$x_count_parts = count($x_array) - 1;
			$x_display = $x;
			$x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
			$x_display .= $x_parts[$x_count_parts - 1];

			return $x_display;

		}

		return $num;
	}
}