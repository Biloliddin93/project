<?php

namespace app\controllers\admin;
use app\controllers\AppController;
use Yii;
use app\models\Users;

use app\models\BannerGroup;
use app\models\BannerCategory;
use app\models\Banner;




class BannerController extends AppController{

    public $layout = 'admintp';

    public function actionIndex()
    {
        $request = Yii::$app->request;
        $requestx = Yii::$app->session;

        $category = BannerCategory::find()->all();



        if($request->isPost)
        {

            if($request->post("type") == "insert")
            {

                if(isset($_FILES["img_group"]) && $_FILES["img_group"]["name"] != null && $_FILES["img_group"]["name"] !="")
                {

                    $flnm = $this->uploadfile($_FILES["img_group"]);
                    if(isset($_POST["banner_group_id"]))
                    {
                        $arr = [
                            "banner_group_id"=>$request->post("banner_group_id"),
                            "language_id"=>$request->post("language_id"),
                            "banner_title"=>$request->post("banner_title"),
                            "banner_alt"=>$request->post("banner_alt"),
                            "banner_deck"=>$request->post("description"),


                        ];

                         $this->Add($arr);
                    }
                    else
                    {
                        $ars = [
                            "img_group"=>$flnm,
                            "banner_category_id"=>$request->post("banner_category_id"),

                        ];

                        $grp_id = $this->BannerGroupAdd($ars);

                        $arr = [
                            "banner_group_id"=>$grp_id,
                            "language_id"=>$request->post("language_id"),
                            "banner_title"=>$request->post("title"),
                            "banner_alt"=>$request->post("alt"),
                            "banner_deck"=>$request->post("description"),


                        ];

                         $this->Add($arr);




                    }
                }


            }
            if($request->post("type") == "bannerdelete")
            {

                return $this->deletebanner($request->post("id"));


            }

            if($request->post("type") == "bannersdelete")
            {


                return $this->deletebannerarray($request->post("id"));


            }
            if($request->post("type") == "changestats")
            {


                return $this->changestats($request->post("id"),$request->post("status"));


            }
            if($request->post("type")=="update")
            {


                if(isset($_FILES["img_group"]) && $_FILES["img_group"]["name"] != null && $_FILES["img_group"]["name"] !="")
                {
                    $flnm = $this->uploadfile($_FILES["img_group"]);

                    $bannergrp_id=$request->post("banner_group_id");


                    $this->BannerGroupUpdate([
                        "banner_group_id"=>$bannergrp_id,
                        "banner_category_id"=>$request->post("banner_category_id"),
                        "img_group"=>$flnm,
                    ]);
                    $this->Update([
                        "banner_group_id"=>$bannergrp_id,
                        "language_id"=>$request->post("language_id"),
                        "id"=>$request->post("id"),
                        "banner_title"=>$request->post("title"),
                        "banner_alt"=>$request->post("alt"),
                        "banner_deck"=>$request->post("description"),

                    ]);
                }
                else
                {


                    $bannergrp_id=$request->post("banner_group_id");

                    $this->BannerGroupUpdate([
                        "banner_group_id"=>$bannergrp_id,
                        "banner_category_id"=>$request->post("banner_category_id"),

                    ]);

                    $this->Update([
                        "banner_group_id"=>$bannergrp_id,
                        "language_id"=>$request->post("language_id"),
                        "id"=>$request->post("id"),
                        "banner_title"=>$request->post("title"),
                        "banner_alt"=>$request->post("alt"),
                        "banner_deck"=>$request->post("description"),

                    ]);
                }


            }

        }

        return $this->render("index",compact('category'));
    }
    private function BannerGroupAdd($arr)
    {

        $model = new BannerGroup();

        $model->img_group = $arr["img_group"];
        $model->banner_category_id = $arr["banner_category_id"];
        $model->status_id = 1;

        if($model->save())
        {
            return $model->id;
        }
        else
        {
            return null;
        }

    }
    private function BannerGroupUpdate($arr)
    {

        $model = BannerGroup::find()->where("id=:ids",[":ids" =>$arr["banner_group_id"] ])->one();
            if(isset($arr["img_group"]))
            {
                $this->deletefile($model->img_group);
            }
        $model->img_group = $arr["img_group"];
        $model->banner_category_id = $arr["banner_category_id"];


        $model->update();


    }
    private function changestats($id,$stats)
    {
        $ars = json_decode($id);

        if(count($ars) > 1)
        {
            foreach ($ars as $vl)
            {
                $model = BannerGroup::find()->where("id = :ids",[":ids" => $vl])->one();
                $model->status_id = $stats;



                $model->update();

                $this->debug("if");


            }
        }
        else
        {
            $model = BannerGroup::find()->where("id = :ids",[":ids" => $ars])->one();
            $model->status_id = $stats;

            $this->debug("elese");

            $model->update();
        }


        return "ok";
    }
    private function BannerCategoryAdd($arr)
    {

        $model = new BannerCategory();

        $model->position_name = $arr["position_name"];
        if($model->save())
        {
            return $model->id;
        }
        else
        {
            return null;
        }

    }
    public function Add($arr)
    {



            foreach ($arr["language_id"] as $key=>$vl)
            {

                if($arr["banner_title"] != null && $arr["banner_title"] !="")
                {
                    $bannermodel = new Banner();

                    $bannermodel->banner_group_id = $arr["banner_group_id"];
                    $bannermodel->language_id = $arr["language_id"][$key];
                    $bannermodel->banner_title = $arr["banner_title"][$key];
                    $bannermodel->banner_alt = $arr["banner_alt"][$key];
                    $bannermodel->banner_deck = $arr["banner_deck"][$key];

                    $bannermodel->save();
                }





            }

            return "ok";


    }

    public function Update($arr)
    {



        foreach ($arr["language_id"] as $key=>$vl)
        {

            if($arr["banner_title"] != null && $arr["banner_title"] !="")
            {
                $bannermodel = Banner::find()
                    ->where("id=:ids",[":ids" => $arr["id"][$key]])

                    ->one();



                $bannermodel->banner_title = $arr["banner_title"][$key];
                $bannermodel->banner_alt = $arr["banner_alt"][$key];
                $bannermodel->banner_deck = $arr["banner_deck"][$key];

                $bannermodel->update();
            }





        }

        return "ok";


    }


    private function deletebanner($id)
    {
        $request = Yii::$app->request;

        try{
            $this->debug($id);
            $model = BannerGroup::find()->where(['id' => $id])->one();
            $this->deletefile($model->img_group);

            if($model->delete())
            {
                $model = Banner::find()->where(['banner_group_id' => $id])->all();

                foreach ($model as $vl)
                {
                    $ss = Banner::find()->where(['id' => $vl->id])->one();



                    $ss->delete();
                }

                return "ok";

            }
            else
            {
                return "error";
            }

        }
        catch (\mysqli_sql_exception $mysqli_sql_exception)
        {
            return "error";
        }



    }

    private function deletebannerarray($arr)
    {
        $ars = json_decode($arr);

    if(count($arr) >1)
    {
        foreach ($ars as $vl)
        {

            try
            {

                $models = Banner::find()->where("banner_group_id=:grpid",[":grpid" => $vl])->all();
                foreach ($models as $vlx)
                {

                    $mm = $vlx->delete();
                }

                $model = BannerGroup::find($vl)->one();

                $model->delete();

                return "ok";

            }
            catch (\mysqli_sql_exception $exception)
            {
                return  $exception;
            }



        }

    }
    else
    {
        try
        {

            $models = Banner::find()->where("banner_group_id=:grpid",[":grpid" => $ars])->all();
            foreach ($models as $vlx)
            {

                $mm = $vlx->delete();
            }

            $model = BannerGroup::find($ars)->one();

            $model->delete();

            return "ok";

        }
        catch (\mysqli_sql_exception $exception)
        {
            return  $exception;
        }
    }


        return "ok";
    }


}













