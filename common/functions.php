<?php

/*
 * Вывод дампа
 */
function d($dump) {

	echo '<pre>';
	print_r($dump);
	echo '</pre>';
}

function rdate($date) {

	$MonthNames = [
		"Jan" => "Января",
		"Feb" => "Февраля",
		"Mar" => "Марта",
		"Apr" => "Апреля",
		"May" => "Мая",
		"Jun" => "Июня",
		"Jul" => "Июля",
		"Aug" => "Августа",
		"Sep" => "Сентября",
		"Oct" => "Октября",
		"Nov" => "Ноября",
		"Dec" => "Декабря"
	];
	foreach ($MonthNames as $name => $replace) {
		$date = str_replace($name, $replace, $date);
	}

	return $date;
}

?>