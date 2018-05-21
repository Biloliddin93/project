<?php

namespace app\controllers\admin;
use app\controllers\AppController;
use Yii;
use app\models\Users;
use app\models\Menu;



class MenuController extends AppController{

    public $layout = 'admintp';

    public function actionIndex($type)
    {
        $request = Yii::$app->request;



        switch ($type)
        {
            case "insert":$this->Insert($request->post());$this->goBack((!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : null));break;
            case "update":$this->Update($request->post());$this->goBack((!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : null));break;
            case "dublicate":$this->Dublicate($request->post());break;
            case "delete":$this->deletes($request->post());break;
            case "hidden":$this->hidden($request->post());break;
            case "show":$this->show($request->post());break;
            case "get": $this->get($request->post());break;
        }
    }

    public function Insert($arr)
    {

        try
        {
            $model  = new Menu();
            $model->levl  = $arr["levl"];
            $model->txt_ru  = $arr["txt_ru"];
            $model->txt_en  = $arr["txt_en"];
            $model->txt_az  = $arr["txt_az"];
            $model->type  = $arr["type"];
            if($arr["atter_id"] > 0)
            {
                $model->atter_id  = $arr["atter_id"];
            }
            $model->save();


            return "OK";
        }
        catch (\mysqli_sql_exception $exception)
        {
            return "error";
        }


    }

    public function Dublicate($arr)
    {
        $model  = Menu::find()->where("id = :id",[":id" => $arr["ids"]])->one();

        $clone = new Menu();
        $clone->levl = $model->levl;
        $clone->txt_ru = $model->txt_ru;
        $clone->txt_en = $model->txt_en;
        $clone->txt_az = $model->txt_az;
        $clone->type = $model->type;
        $clone->atter_id = $model->atter_id;
        $clone->link = $model->link;
        $clone->status = $model->status;
        $clone->position = $model->position;
        $clone->save();


        $this->debug($clone);

    }
    public function deletes($arr)
    {
        $model  = Menu::find()->where("id = :id",[":id" => $arr["ids"]])->one();
        $model->delete();
    }
    public function hidden($arr)
    {
        $model  = Menu::find()->where("id = :id",[":id" => $arr["ids"]])->one();
        $model->status = 2;
        $model->update();
    }
    public function show($arr)
    {
        $model  = Menu::find()->where("id = :id",[":id" => $arr["ids"]])->one();
        $model->status = 1;
        $model->update();
    }

    public function Update($arr)
    {



        try
        {
            $model  = Menu::find()->where("id = :id",[":id" => $arr["ids"]])->one();

            if($arr["radio"] ==1)
            {
                $model->link  = $arr["custom_link"];
            }
            if($arr["radio"] ==2)
            {
                $model->link  = $arr["link"];
            }

            $model->update();

            return "OK";
        }
        catch (\mysqli_sql_exception $exception)
        {
            return "error";
        }


    }
    public function delete($id)
    {
        try
        {
            $model = Menu::find()->where("id = :id",[":id" => $id])->one();
            $model->delete();

            $mod = Menu::find()->where("atter_id = :id",[":id" => $id])->all();
            foreach ($mod as $vl)
            {
                $mm = Menu::find()->where("id = :id",[":id" => $vl->id])->one();

                $mm->delete();
            }
            return "ok";
        }
        catch (\mysqli_sql_exception $exception)
        {
            return "error";
        }


    }



}













