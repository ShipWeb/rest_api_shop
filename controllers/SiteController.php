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
        return $this->render('discount');
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
