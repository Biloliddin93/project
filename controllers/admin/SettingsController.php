<?php

namespace app\controllers\admin;
use app\controllers\AppController;
use Yii;
use app\models\Settings;
use yii\web\UploadedFile;
use yii\helpers\Url;
use app\models\Language;


class SettingsController extends AppController{

    public $layout = 'admintp';


    public function actionIndex()
    {
        $this->Sessions();

        Yii::$app->language = "en";

        $lang = (new \yii\db\Query())
            ->from('language')

            ->all();

        $table = (new \yii\db\Query())
            ->from('settings')

            ->one();





        $request = Yii::$app->request;



        if ($request->isPost) {

            $model = Settings::find()->one();


            $model->admin_language_id = $request->post("admin_language_id");;
            $model->site_language_id = $request->post("site_language_id");
            $model->site_title = $request->post("site_title");
            $model->adminemail = $request->post("adminemail");
            $model->empty_stats = $request->post("empty_stats");



            if (isset($_FILES["images"])&& $_FILES["images"]["name"] !="") {
                $nmimg = $this->uploadfile($_FILES["images"]);

                $model->favicon = $nmimg;



            }

            $model->update();
            $curlang =$this->getlanguage($request->post("admin_language_id"));

            if(!Yii::$app->session->isActive)
            {
                Yii::$app->session->open();


            }

           Yii::$app->session->destroySession("lang");

            Yii::$app->session->set("lang",$curlang);
            Yii::$app->session->set("site_title",($request->post("site_title")));
            Yii::$app->session->set("favicon",($request->post("favicon")));
            Yii::$app->session->set("adminemail",($request->post("adminemail")));
            Yii::$app->session->set("empty_stats",($request->post("empty_stats")));

            Yii::$app->language =$curlang;
            $url = Url::to(['admin/settings', 'language' => $this->getlanguage($curlang)]);

            return $this->redirect($url);
        }



        return $this->render("index",compact('lang','table'));

    }


    public function getlanguage($id)
    {
        $table = Language::find()->where(['id'=>$id])->one();


        return $table->language_prefix;
    }

}













