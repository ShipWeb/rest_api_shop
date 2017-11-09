<?php

/**
 * Вывод дампа
 *
 * @param $dump
 */
function d($dump) {

	echo '<pre>';
	print_r($dump);
	echo '</pre>';
}

/**
 * Вывод месяца на русском языке
 *
 * @param $date
 *
 * @return mixed
 */
function rdate($date) {

	$MonthNames = [
		"January" => "Января",
		"February" => "Февраля",
		"March" => "Марта",
		"April" => "Апреля",
		"June" => "Июня",
		"July" => "Июля",
		"August" => "Августа",
		"September" => "Сентября",
		"October" => "Октября",
		"November" => "Ноября",
		"December" => "Декабря",
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
		"Dec" => "Декабря",
	];
	foreach ($MonthNames as $name => $replace) {
		$date = str_replace($name, $replace, $date);
	}

	return $date;
}

/**
 * Добавить параметр в текущий url
 *
 * @param $param
 * @param $value
 *
 * @return mixed|string
 */
function insertValueInUrl($param,$value ) {

	$url = $_SERVER['REQUEST_URI'];

	if (!empty($_REQUEST[$param])) {

		return str_replace($param . '=' . $_REQUEST[$param], $param . '=' . $value, $url);
	} elseif (strpos($url, '&') !== false || strpos($url, '?') !== false) {

		return $url . '&' . $param . '=' . $value;
	} else {
		return $url . '?' . $param . '=' . $value;

	}

}

?>