These repo details are loaded from bitbucket api scanned into a single repos.json and rendered using datatables...

<?php
$repos = json_to_array(SITEPATH . '/assets/repos.json');
function item_r($col, $item) { echo $item[$col]; }
?>
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Website</th>
			<th>Project</th>
			<th>Account</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($repos as $item) {?>
		<tr>
			<td><a href="<?php item_r('link', $item); ?>" target="_blank"><img src="<?php item_r('icon', $item); ?>" height="60" /> <?php item_r('name', $item); ?></a></td>
			<td><?php item_r('description', $item); ?></td>
			<td><a href="<?php item_r('website', $item); ?>" target="_blank"><?php item_r('website', $item); ?></a></td>
			<td><?php item_r('project', $item); ?></td>
			<td><?php item_r('account', $item); ?></td>
		</tr>
<?php } ?>
	</tbody>
</table>

<style>
.table-bordered.card {
	border: 0 !important;
}
.card thead {
	display: none;
}

.card tbody tr {
	float: left;
	width: 25em;
	margin: 0.5em;
	border: 1px solid #bfbfbf;
	border-radius: 0.5em;
	background-color: transparent !important;
	box-shadow: 0.25rem 0.25rem 0.5rem rgba(0, 0, 0, 0.25);
}
.card tbody tr td {
	display: block;
	border: 0;
}
</style>
