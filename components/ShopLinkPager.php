<?php

namespace app\components;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\LinkPager;

class ShopLinkPager extends LinkPager
{

	protected function renderPageButton($label, $page, $class, $disabled, $active)
	{
		$options = ['class' => empty($class) ? $this->pageCssClass : $class];
		if ($active||$disabled) {
			Html::addCssClass($options, $this->activePageCssClass);
		}
		$linkOptions = $this->linkOptions;
		$linkOptions['data-page'] = $page;

		return Html::tag('li', Html::a($label, $this->pagination->createUrl($page), $linkOptions), $options);
	}

}
