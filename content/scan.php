<?php
$sources = disk_scandir($fol = SITEPATH . '/repos/sources/');
$all = [];

echo '<h1>Scanning: ' . $fol . '</h1>';

foreach ($sources as $name) {
	if ($name[0] == '.') continue;
	$file = $fol . $name;
	$name = str_replace('.json', '', $name);
	echo '<h2>' . $name . '</h1>';
	$json = json_to_array($file);
	echo '<h3>Source</h3>';
	echo '<textarea style="width: 100%; height: 150px;">' . print_r($json, 1) . '</textarea>';
	$op = [];
	foreach ($json['values'] as $ix => $item) {
		$op[] = [
			'account' => $name,
			'name' => $item['full_name'],
			'link' => $item['links']['html']['href'],
			'icon' => $item['links']['avatar']['href'],
			'name' => $item['name'],
			'description' => $item['description'],
			'website' => $item['website'],
		];
	}
	echo '<h3>Output</h3>';
	echo '<textarea style="width: 100%; height: 150px;">' . print_r($op, 1) . '</textarea>';
	$all = array_merge($all, $op);
}

$all = json_encode($all, JSON_PRETTY_PRINT);
file_put_contents($fol . '.scans/repos-' . time() . '.json', $all);
file_put_contents(SITEPATH . '/assets/repos.json', $all);

?>