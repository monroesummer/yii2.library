<?php

namespace app\controllers;

use app\models\Library;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\Pagination;


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
        $redirectUrl = '/web/library';
        if (!Yii::$app->user->isGuest) {
            return Yii::$app->getResponse()->redirect($redirectUrl);
        }

               $query = Library::find()->select('id , name, author, publish, year,')->orderBy('id DESC');

        $pages = new Pagination(['totalCount'=> $query->count(), 'pageSize'=> 2, 'pageSizeParam'=> false, 'forcePageParam'=> false]);

        $books = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('books', 'pages'));

    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {


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
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
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
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionView(){

        $id = \Yii::$app->request->get('id');

        $book = Library::findOne($id);

        if(empty($book)) throw new \yii\web\HttpException(404, 'Такой страницы нет.');

        return $this->render('view', compact('id', 'book'));

    }
}
