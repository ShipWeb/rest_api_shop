<?php foreach ($range as $key => $value): ?>
	<?= $value['property_title'][0] ?>
	<?= $value['property_name'][0] ?>
	<?php foreach ($value[$value['value']] as $k => $v): ?>
		<?= $v ?>
		<br>
	<?php endforeach; ?>
	<br>
<?php endforeach; ?>

<?php foreach ($list as $key => $value): ?>
	<?= $value['property_title'][0] ?>
	<?= $value['property_name'][0] ?>
	<?php foreach ($value[$value['value']] as $k => $v): ?>
		<?= $v ?>
		<br>
	<?php endforeach; ?>
	<br>
<?php endforeach; ?>

<?php foreach ($select as $key => $value): ?>
	<?= $value['property_title'][0] ?>
	<?= $value['property_name'][0] ?>
	<?php foreach ($value[$value['value']] as $k => $v): ?>
		<?= $v ?>
		<br>
	<?php endforeach; ?>
	<br>
<?php endforeach; ?>

<?php foreach ($multiselect as $key => $value): ?>
	<?= $value['property_title'][0] ?>
	<?= $value['property_name'][0] ?>
	<?php foreach ($value[$value['value']] as $k => $v): ?>
		<?= $v ?>
		<br>
	<?php endforeach; ?>
	<br>
<?php endforeach; ?>
