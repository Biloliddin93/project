<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class NewsController extends AppController
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
        $curlang = $this->currentlang();
        $table = (new \yii\db\Query())
            ->from('articles')
            ->innerJoin("articles_grp","articles_grp.id = articles.articles_grp_id")
            ->where("articles.language_id = :ids",[":ids"=>$curlang])
            ->andWhere("articles_grp.status = :idss",[":idss"=>1])

            ->groupBy("articles.articles_grp_id")
            ->all();

        return $this->render("index",compact('table'));
    }

    public function inpage($id)
    {
        $curlang = $this->currentlang();
        $table = (new \yii\db\Query())
            ->from('articles')
            ->innerJoin("articles_grp","articles_grp.id = articles.articles_grp_id")
            ->where("articles.language_id = :ids",[":ids"=>$curlang])
            ->andWhere("articles_grp.status = :idss",[":idss"=>1])
            ->andWhere("articles.articles_grp_id = :idsss",[":idsss"=>$id])

            ->groupBy("articles.articles_grp_id")
            ->one();

        return $this->render("index",compact('table'));

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

        $model->password = '';
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
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
