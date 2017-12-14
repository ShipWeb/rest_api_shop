<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Currencies;
use app\models\Products;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
		Currencies::checkCurrency();

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Страница - Скидка
     *
     * @return string
     */
    public function actionDiscount()
    {

    	$limit=20;

		$active_currency = Currencies::activeCurrency();

		$query = "
SELECT *,
CAST(
	IF(product_discount IS NULL ,
	(product_price * ".$active_currency['currency_course']."), 
	(product_price * ".$active_currency['currency_course'].")
	" . (Yii::$app->params['enableCalcDiscount'] == true ? "/ 100 * (100 - product_discount)" : "") . "
	) AS DECIMAL(12,2)) as final_product_price 
FROM {{%products}}
ORDER BY product_discount DESC LIMIT :limit";

		$command = Yii::$app->db->createCommand($query);
		$command->bindValue(':limit',(int)$limit);
		$discount_products = $command->queryAll();

        return $this->render('discount',[
			'discount_products'=>$discount_products,
			'active_currency'=>$active_currency,
		]);
    }

	/**
	 * Страница - Отзывы
	 *
	 * @return string
	 */
	public function actionFeedbacks()
	{
		return $this->render('feedbacks');
	}

	/**
	 * Страница - Гарантии
	 *
	 * @return string
	 */
	public function actionGaranty()
	{
		return $this->render('garanty');
	}

	/**
	 * Страница - Помощь
	 *
	 * @return string
	 */
	public function actionHelp()
	{
		return $this->render('help');
	}

	/**
	 * Страница - Как покупать?
	 *
	 * @return string
	 */
	public function actionHowbuy()
	{
		return $this->render('howbuy');
	}

	/**
	 * Сервис обновления
	 *
	 * @return string
	 */
	public function actionService() {

		set_time_limit(600);

		if (empty($_REQUEST['start']) || $_REQUEST['start'] != 1) {
			return;
		}

		$query = "SELECT * FROM {{%products}}";
		$products = Yii::$app->db->createCommand($query)->queryAll();

		//Обновление информации о товарах
		Products::updateProductsAll($products);

		Products::generateSitemap($products);

		//Обновление информации о валютах
		Currencies::updateCurrencies();

		echo 'ok';

	}

}
