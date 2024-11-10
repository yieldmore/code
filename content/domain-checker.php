
<?php
if (isset($_GET['page'])) {
	$page = $_GET['page'];
	$wants = false;

	if ($page == 'main')
		$wants = '/_main.html';
	else if ($page == 'home')
		$wants = '/_home.html';

	if ($wants) {
		renderAny(__DIR__ . $wants, ['raw' => true]);
		return;
	}

	$thisRelative = concatSlugs(['', 'amadeusweb', 'code', 'content'], DIRECTORY_SEPARATOR);
	$base = replaceItems(__DIR__, [$thisRelative => '']) . DIRECTORY_SEPARATOR;

	$sheet = get_sheet('all-domains', false);
	$cols = $sheet->columns;

	$linkFormat = '<a href="%s">%s</a>';

	//$r = '<table style="width: 100%"><tr><th>Server</th><th>Local</th><th>Comments</th></tr>';
	$r = '<ol>' . am_var('nl');
	foreach ($sheet->rows as $item) {
		$domain = $item[$cols['Domain']];

		if ($domain == '') { echo '<hr />' . am_var('2nl'); continue; }
		if (startsWith($domain, '~ ')) { $r .= am_var('nl') . $domain; continue; }

		$folder = $item[$cols['DocumentRoot']];

		$server = sprintf($linkFormat, 'https://' . $domain . '/', $domain);
		$local = sprintf($linkFormat, 'http://localhost/' . $folder . '/', 'local');
		$exists = disk_is_dir($fol = $base . $folder) ? 'exists' : '<b style="color: red;">missing</b>';
		//$r .= '<tr><td>' . $server . '</td><td>' . $local . ' &mdash; ' . $exists . '</td><td>' . $item[$cols['Comments']] . '</td></tr>';
		$r .= '		<li>' . $server . am_var('nl')
			. '			(' . $local . ' - <span title="' . $fol . '">' . $exists . '</span>)' . am_var('nl')
			//. '			&mdash; <u>' . $item[$cols['Comments']] . '</u>'
			. '</li>' . am_var('2nl');
	}
	//$r .= '</table>';
	$r .= '</table>';

	$r = renderAny(__DIR__ . '/_menu.html', ['raw' => true, 'replaces' => ['links' => $r], 'echo' => false]);
	$r = str_replace(' target="_blank"', '', $r);
	echo $r;

	return;
}

echo '<iframe style="height: 90vh; width: 100%" src="' . am_var('url') . 'domain-checker/?page=main"></iframe>';

