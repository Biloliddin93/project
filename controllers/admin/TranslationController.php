<?php

namespace app\controllers\admin;
use app\controllers\AppController;
use Yii;

use app\models\Translation;
use app\models\Translation_grp;
use app\models\Language;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;


class TranslationController extends AppController{

    public $layout = 'admintp';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['get-batch-data'],
                'rules' => [
                    [
                        'actions' => ['get-batch-data'],
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

    public function actionIndex()
    {

        $request = Yii::$app->request;

        if($request->isPost)
        {
            try
            {
                $grp_id = $this->TranslationGrp($request->post());

                if(isset($_POST["azmessage"]))
                {
                    $model = new Translation();

                    $model->translation_grp_id = $grp_id;
                    $model->language_id = 1;
                    $model->message = $request->post("azmessage");

                    $model->save();
                }


                if(isset($_POST["rumessage"]))
                {
                    $model = new Translation();

                    $model->translation_grp_id = $grp_id;
                    $model->language_id = 2;
                    $model->message = $request->post("rumessage");

                    $model->save();
                }

                if(isset($_POST["enmessage"]))
                {
                    $model = new Translation();

                    $model->translation_grp_id = $grp_id;
                    $model->language_id = 3;
                    $model->message = $request->post("enmessage");

                    $model->save();
                }

            }
            catch (\mysqli_sql_exception $mysqli_sql_exception)
            {

            }


        }





        return $this->render("index");
    }
    public function actionPostme()
    {
        $data = Yii::$app->request->post();
       switch ($data["type"])
       {
           case "update": return $this->update($data);break;
       }


        return \yii\helpers\Json::encode($data);

    }

    private function TranslationGrp($arr)
    {

        try{
            $model = new Translation_grp();
            $model->keyword = $arr["keyword"];
            $model->default_message = $arr["default_message"];

            $model->save();

            return $model->id;

        }
        catch (\mysqli_sql_exception $mysqli_sql_exception)
        {
            return "error";

        }



    }

    private function insert($arr)
    {
        try
        {
            $messages = json_decode($arr["message"]);
            $lang = json_decode($arr["language_id"]);

            foreach ($messages as $key=>$vl)
            {
                $model = new Translation();

                $model->translation_grp_id = $arr["translation_grp_id"];
                $model->language_id = $lang[$key]->id;
                $model->message = $arr["message"][$key];

                $model->save();
            }

            return true;
        }
        catch (\mysqli_sql_exception $exception)
        {
            echo $exception;
        }
    }
    private function update($arr)
    {



        $model  = Translation::find()->where('translation_grp_id=:ids',[":ids" => $arr["id"]])->all();
$ru =false;
$az =false;
$en =false;

        foreach ($model as $vl)
        {
            $mod = Translation::find();
            if($vl["language_id"]==1)
            {

                Yii::$app->db->createCommand()
                    ->update('translation', ['message'=>$arr["az"]], 'id='.$vl["id"].'')
                    ->execute();
                 $az = true;
            }

            if($vl["language_id"]==2)
            {
                Yii::$app->db->createCommand()
                    ->update('translation', ['message'=>$arr["ru"]], 'id='.$vl["id"].'')
                    ->execute();

                $ru= true;
            }

            if($vl["language_id"]==3)
            {

                Yii::$app->db->createCommand()
                    ->update('translation', ['message'=>$arr["en"]], 'id='.$vl["id"].'')
                    ->execute();

                $en = true;
            }

        }
if(!$az)
{
    $this->debug("az");
    if(isset($arr["az"]))
    {
        $mod = new Translation();
        $mod->message = $arr["az"];
        $mod->translation_grp_id = $arr["id"];
        $mod->language_id = 1;
        $mod->save();
    }


}

 if(!$ru)
 {
     $this->debug("ru");
     if(isset($arr["ru"]))
     {
         $mod = new Translation();
         $mod->message = $arr["ru"];
         $mod->translation_grp_id = $arr["id"];
         $mod->language_id = 2;
         $mod->save();
     }


}

        if(!$en)
        {

            if(isset($arr["en"]))
            {

                $mod = new Translation();
                $mod->message = $arr["en"];
                $mod->translation_grp_id = $arr["id"];
                $mod->language_id = 3;

                $mod->save();


            }


        }

        return "ok";


    }




}













