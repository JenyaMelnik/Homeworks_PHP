<?php
/**
 * @var $module string
 * @var $page string
 */

$modulePath = './modules/'.$module.'/'.$page.'.php';

if(!file_exists($modulePath)) {
	$module = 'errors';
	$page = '404';
	$modulePath = './modules/'.$module.'/'.$page.'.php';
}