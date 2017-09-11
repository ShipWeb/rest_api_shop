<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%products}}".
 *
 * @property string $product_id
 * @property string $product_api_id
 * @property string $title
 * @property string $chpu
 * @property string $content
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 * @property string $date_create
 * @property string $date_create_gmt
 * @property string $date_modified
 * @property string $date_modified_gmt
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_api_id'], 'integer'],
            [['content'], 'string'],
            [['date_create', 'date_create_gmt', 'date_modified', 'date_modified_gmt'], 'safe'],
            [['title', 'chpu', 'seo_title', 'seo_keywords'], 'string', 'max' => 255],
            [['seo_description'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'product_api_id' => Yii::t('app', 'Product Api ID'),
            'title' => Yii::t('app', 'Title'),
            'chpu' => Yii::t('app', 'Chpu'),
            'content' => Yii::t('app', 'Content'),
            'seo_title' => Yii::t('app', 'Seo Title'),
            'seo_description' => Yii::t('app', 'Seo Description'),
            'seo_keywords' => Yii::t('app', 'Seo Keywords'),
            'date_create' => Yii::t('app', 'Date Create'),
            'date_create_gmt' => Yii::t('app', 'Date Create Gmt'),
            'date_modified' => Yii::t('app', 'Date Modified'),
            'date_modified_gmt' => Yii::t('app', 'Date Modified Gmt'),
        ];
    }

	public static function getAll($pageSize = 5)
	{
		// build a DB query to get all articles
		$query = Products::find();
		// get the total number of articles (but do not fetch the article data yet)
		$count = $query->count();
		// create a pagination object with the total count
		$pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
		// limit the query using the pagination and retrieve the articles
		$products = $query->offset($pagination->offset)->limit($pagination->limit)->all();

		$data['products'] = $products;
		$data['pagination'] = $pagination;

		return $data;
	}

	/**
	 * Сортировка товаров
	 *
	 * @param $options
	 *
	 * @return mixed
	 */
	public function sortProducts($options) {

		$products = Products::getAll();

		return $products;
	}

}
