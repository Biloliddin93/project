<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AboutController extends AppController
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
        $tablex = (new \yii\db\Query())

            ->from('banner')
            ->innerJoin("banner_group","banner_group.id=banner.banner_group_id")
            ->where("banner.language_id = :lang",[":lang" => $curlang])
            ->andWhere("banner_group.banner_category_id = :lxang",[":lxang" => 4])
            ->groupBy("banner.banner_group_id")

            ->all();


        return $this->render("index",compact('tablex'));
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


}
