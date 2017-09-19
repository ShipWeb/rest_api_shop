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

			}
		}

		foreach ($filters_result as $key=>$value){
			if ($value['value']&&$value['value']==='value_date') {
				foreach ($value['value_date'] as $k=>$v) {
					$filters_result[$key]['value_date'][$k]=date('Y',strtotime($filters_result[$key]['value_date'][$k]));
				}
				sort($filters_result[$key]['value_date']);
				$filters_result[$key]['value_date']=array_unique($filters_result[$key]['value_date']);
			}
		}

		return $filters_result;

	}

}