<?php foreach ($range as $key => $value): ?>
	<div class="filter" style="position: relative">
		<a class="search_param" data-toggle="collapse" href="#collapseDate" aria-expanded="true" aria-controls="collapseExample">
			<i class="fa fa-angle-up" aria-hidden="true"></i> <?= $value['property_title'][0] ?>
		</a>
		<div class="collapse in" id="collapseDate">
			<div class="well">
				<div class="drop_scroll">
					<button type="button" id="btn_start" name="btn_start_<?= $value['property_name'][0] ?>" class="btn filter_btn filter_year"><?= $value[$value['value']][0] ?>
						<i class="fa fa-angle-down" aria-hidden="true"></i></button>
					<ul id="start" class="hover-menu years_begin scroll-pane">
						<?php foreach ($value[$value['value']] as $k => $v): ?>
							<a href="" onclick="$('button[name=\'btn_start_<?= $value['property_name'][0] ?>\']').html('<?= $v ?>&nbsp;<i class=\'fa fa-angle-down\' aria-hidden=\'true\'></i></button>') ;  $('#start').hide(); return false">
								<li id="<?= $value['property_name'][0] . $v ?>"><?= $v ?></li>
							</a>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="drop_scroll">
					<button type="button" id="btn_end" name="btn_end_<?= $value['property_name'][0] ?>" class="btn filter_btn filter_year"><?= $value[$value['value']][count($value[$value['value']]) - 1] ?>
						<i class="fa fa-angle-down" aria-hidden="true"></i></button>
					<ul id="end" class="hover-menu years_end scroll-pane">
						<?php foreach ($value[$value['value']] as $k => $v): ?>
							<a href="" onclick="$('button[name=\'btn_end_<?= $value['property_name'][0] ?>\']').html('<?= $v ?>&nbsp;<i class=\'fa fa-angle-down\' aria-hidden=\'true\'></i></button>') ;  $('#end').hide(); return false">
								<li id="<?= $value['property_name'][0] . $v ?>"><?= $v ?></li>
							</a>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>

	</div>
<?php endforeach; ?>


<?php foreach ($select as $key => $value): ?>
		<div class="filter">
			<a class="search_param" data-toggle="collapse" href="#<?= $value['property_name'][0] ?>" aria-expanded="true" aria-controls="collapseExample">
				<i class="fa fa-angle-up" aria-hidden="true"></i> <?= $value['property_title'][0] ?>
			</a>
			<div class="collapse in" id="<?= $value['property_name'][0] ?>">
				<div class="well">
		<?php foreach ($value[$value['value']] as $k => $v): ?>
						<input type="checkbox" class="check" id="<?= $v ?>" name="<?= $value['property_name'][0] ?>" value="<?= $v ?>">
						<label for="<?= $v ?>" class="label_check"><?= (!empty($value['value_ext_html'][$k])?$value['value_ext_html'][$k]:"").$v ?></label>
		<?php endforeach; ?>
			</div>
			</div>
		</div>
<?php endforeach; ?>

<script>
	var arr_multiselect={};
</script>
<?php foreach ($multiselect as $key => $value): ?>
<div class="filter">
	<a class="search_param" data-toggle="collapse" href="#<?= $value['property_name'][0] ?>" aria-expanded="true" aria-controls="collapseExample">
		<i class="fa fa-angle-up" aria-hidden="true"></i> <?= $value['property_title'][0] ?>
	</a>
	<div class="collapse in" id="<?= $value['property_name'][0] ?>">
		<div class="well filter_column">
			<input type="hidden" name="<?= $value['property_name'][0] ?>">
			<script>
				arr_multiselect['<?= $value['property_name'][0] ?>']="<?=count($value[$value['value']])?>";
			</script>
			<?php foreach ($value[$value['value']] as $k => $v): ?>
			<input type="checkbox" class="check" id="<?= $v ?>" name="<?= $value['property_name'][0].$k ?>" value="<?= $v ?>">
			<label for="<?= $v ?>" class="label_check"><?= (!empty($value['value_ext_html'][$k])?$value['value_ext_html'][$k]:"").$v ?></label>
		<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endforeach; ?>
