<?php
include_once 'functions.php';
am_var('local', $local = startsWith($_SERVER['HTTP_HOST'], 'localhost'));

bootstrap([
	'name' => 'Amadeus Code Explorer',
	'byline' => 'An Amadeus Service',
	'safeName' => 'amadeus-code',

	'theme' => 'biz-land',
	'version' => [ 'id' => '2.0.2', 'date' => '10 Nov 2024' ],

	'styles' => [
		'styles',
		'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min',
		'https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min',
		'https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min',
	],

	'scripts' => [
		//FROM - view-source:https://cdpn.io/RedJokingInn/fullpage/bGoppqP?anon=true&view= -->
		'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min',
		'https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min',
		'https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min',
		'https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min',
		'https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min',
		'https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min',
		'https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min',
		'https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min',
		'https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min',
		'https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts',
		'https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min',
		'datatables-loader',
	],

	'social' => [ ['type' => 'github', 'link' => 'https://github.com/yieldmore/multigit.git'] ],
	'email' => 'amadeus@yieldmore.org', 'phone' => '+919841223313',

	'folder' => 'content/',
	'url' => $local ? 'http://localhost/amadeusweb/code/' : 'https://code.amadeusweb.com/',
	'path' => SITEPATH,

]);

render();
?>
