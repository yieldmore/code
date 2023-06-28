<?php
include_once 'functions.php';

bootstrap([
	'name' => 'Amadeus Code Explorer',
	'byline' => 'An Amadeus Service',
	'safeName' => 'amadeus-code',
	'theme' => 'biz-land',
	'styles' => ['styles'],
	'social' => [ ['type' => 'github', 'link' => 'https://github.com/yieldmore/multigit.git'] ],
	'email' => 'amadeus@yieldmore.org', 'phone' => '+9841223313',
	'folder' => 'content/',
	'url' => 'http://localhost/code/',
	'path' => SITEPATH,

]);

render();
?>
