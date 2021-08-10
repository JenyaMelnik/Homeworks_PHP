<?php

function dump($array, $stop = false) {
	echo '<pre>'.print_r($array, 1).'</pre>';
	if(!$stop) {
		exit();
	}
}

function dd($var) {
	echo '<pre>'.print_r($var, 1).'</pre>';
	exit();
}

/**
 * Create absolute URL
 *
 * @param array $params
 * @return string
 */
function createAbsoluteUrl(array $params):string {
	return URI.createUrl($params);
}

/**
 * Create URL
 *
 * @param array $params
 * @return string
 */
function createUrl(array $params):string {
	return 'index.php?'.http_build_query($params);
}