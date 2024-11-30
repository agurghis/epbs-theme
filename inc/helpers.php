<?php

if (! function_exists('epbs_get_wp_parent_theme')) {
	function epbs_get_wp_parent_theme() {
		return apply_filters('epbs_get_wp_theme', wp_get_theme(get_template()));
	}
}