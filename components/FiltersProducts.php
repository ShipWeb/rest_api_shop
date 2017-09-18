<?php

namespace app\components;

use yii\base\Widget;
use app\models\Properties;

class FiltersProducts extends Widget {

	public function init() {

		parent::init();

	}

	/**
	 * Получение всех фильтров
	 *
	 * @return string
	 */
	public function run() {

		$filters = Properties::getAllFilters();

		$select = self::FilterProperties($filters, 'SELECT');
		$multiselect = self::FilterProperties($filters, 'MULTISELECT');
		$list = self::FilterProperties($filters, 'LIST');
		$range = self::FilterProperties($filters, 'RANGE');

		return $this->render('FiltersProductsView', [
			'filters'     => $filters,
			'select'      => $select,
			'multiselect' => $multiselect,
			'list'        => $list,
			'range'       => $range,
		]);
	}

	/**
	 * Получение фильтров по типу
	 *
	 * @param $filters
	 * @param $type
	 *
	 * @return array
	 */
	public function FilterProperties($filters, $type) {

		$filters_result = [];

		foreach ($filters as $key => $value) {
			if ($value['filter'] === $type) {
				if (empty($filters_result[$value['property_id']])) {
					$filters_result[$value['property_id']] = [];
				}

				$filters_result[$value['property_id']] = array_merge_recursive($filters_result[$value['property_id']], $value);

				foreach ($filters_result[$value['property_id']] as $k => $v) {

					if (gettype($v) === 'array') {
						$filters_result[$value['property_id']][$k] = array_unique($v);
					}

				}

				$arr_type = Properties::getArrValueType();
				$filters_result[$value['property_id']]['value'] = Properties::setValueType($arr_type, $value['type']);

				if ($filters_result[$value['property_id']]['value'] === 'value_date') {

					if (gettype($filters_result[$value['property_id']]['value_date']) === 'array') {
						foreach ($filters_result[$value['property_id']]['value_date'] as $ke => $va) {
							$filters_result[$value['property_id']]['value_date'][$ke] = date("Y", strtotime($va));
						}
					} else {
						$filters_result[$value['property_id']]['value_date'] = date("Y", strtotime($filters_result[$value['property_id']]['value_date']));
					}

				}

			}
		}

		return $filters_result;

	}

}