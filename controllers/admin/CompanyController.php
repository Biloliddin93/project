<?php

namespace app\controllers\admin;
use app\controllers\AppController;
use Yii;
use app\models\Language;
use app\models\Content;
use app\models\ContentSeo;
use app\models\ImgGroup;
use app\models\ImgGallery;
use app\models\Menu;






class CompanyController extends AppController{

    public $layout = 'admintp';

    public function actionIndex($id)
    {
        $request = Yii::$app->request;
        $requestx = Yii::$app->session;

        $Language = Language::find()->all();



        if($request->isPost)
        {




            if($request->post("type")=="insert_content")
            {


                $db = $this->CompanyAdd($request->post());

                $arr = [
                    "content_group_id"=>$db,
                    "page_title"=>$request->post("page_title"),
                    "page_deck"=>$request->post("page_deck"),
                    "keyswords"=>$request->post("keyswords"),

                ];

                $this->SeoAdd($arr);

                $this->menuedit($id);



            }

            if($request->post("type")=="update_content")
            {



                $db = $this->CompanyUpdate($request->post());

                $arr = [
                    "content_group_id"=>$db,
                    "page_title"=>$request->post("page_title"),
                    "page_deck"=>$request->post("page_deck"),
                    "keyswords"=>$request->post("keyswords"),

                ];

                $this->SeoUpdate($arr);

            }

            if($request->post("type") == "insert")
            {


                if($_FILES["img_url"])
                {
                    try
                    {
                        $imgs = $this->uploadfilesize($_FILES["img_url"]);

                        $grp_id = $this->ImgGroupAdd($imgs);


                        $arr = [
                            "title" => $request->post("title"),
                            "alt" => $request->post("alt"),
                            "summary" => $request->post("summary"),
                            "img_grp_id" => $grp_id,

                        ];
                        $this->Insert_img($arr);


                    }
                    catch (\mysqli_sql_exception $exception)
                    {
                        return $exception;
                    }




                }


            }
            if($request->post("type") == "update")
            {


                if(isset($_POST["img_grp_id"]))
                {
                    if($_FILES["img_url"]["name"])
                    {

                        try
                        {
                            $imgs = $this->uploadfilesize($_FILES["img_url"]);


                            $grp_id = $this->ImgGroupupdate($imgs,$request->post("img_grp_id"));


                            $arr = [
                                "title" => $request->post("title"),
                                "alt" => $request->post("alt"),
                                "summary" => $request->post("summary"),
                                "img_grp_id" => $request->post("img_grp_id"),

                            ];
                            $this->update_img($arr);


                        }
                        catch (\mysqli_sql_exception $exception)
                        {
                            return $exception;
                        }




                    }
                    else
                    {

                        $arr = [
                            "title" => $request->post("title"),
                            "alt" => $request->post("alt"),
                            "summary" => $request->post("summary"),
                            "img_grp_id" => $request->post("img_grp_id"),

                        ];

                        $this->update_img($arr);

                    }
                }



            }
            if($request->post("type")=="imgdelete")
            {
                return $this->deleteimg($request->post("id"));
            }
            if($request->post("type")=="alldelete")
            {

                return $this->deleteimgarray($request->post("id"));
            }


        }

        $first= (new \yii\db\Query())

            ->from('content')

            ->leftJoin("content_seo","content_seo.content_group_id=content.id")
            ->where("content.menu_id=:ids",[":ids" => $id])
            ->andWhere("content.language_id=:lng",[":lng" => 3])
            ->select("content.*,content_seo.page_title,content_seo.page_deck,content_seo.keyswords")

            ->one();

        $second= (new \yii\db\Query())

            ->from('content')

            ->leftJoin("content_seo","content_seo.content_group_id=content.id")
            ->where("content.menu_id=:ids",[":ids" => $id])
            ->andWhere("content.language_id=:lng",[":lng" => 2])
            ->select("content.*,content_seo.page_title,content_seo.page_deck,content_seo.keyswords")

            ->one();

        $three= (new \yii\db\Query())

            ->from('content')

            ->leftJoin("content_seo","content_seo.content_group_id=content.id")
            ->where("content.menu_id=:ids",[":ids" => $id])
            ->andWhere("content.language_id=:lng",[":lng" => 1])
            ->select("content.*,content_seo.page_title,content_seo.page_deck,content_seo.keyswords")

            ->one();

        return $this->render("index",compact('Language','first','second','three'));
    }
    private function menuedit($id){

        $model =  Menu::find()->where("id = :id",[":id" => $id])->one();
        $model->link = "company?id="+$id;
        $model->type = '3';
        $model->update();


    }
    private function SeoAdd($arr)
    {

        $model  = new ContentSeo();
        $model->page_title = $arr["page_title"];
        $model->page_deck = $arr["page_deck"];
        $model->keyswords = $arr["keyswords"];
        $model->content_group_id = $arr["content_group_id"];

        $model->save();

    }
    private function SeoUpdate($arr)
    {

        if($arr["page_title"] != "" && $arr["page_deck"] != "" && $arr["keyswords"] != "")
        {

            $model  =ContentSeo::find()->where("content_group_id=:id",[":id" => $arr["content_group_id"]])->one();

            if(count($model) > 0)
            {
                $model->page_title = $arr["page_title"];
                $model->page_deck = $arr["page_deck"];
                $model->keyswords = $arr["keyswords"];


                $model->update();
            }
            else
            {
                $model  = new ContentSeo();
                $model->page_title = $arr["page_title"];
                $model->page_deck = $arr["page_deck"];
                $model->content_group_id = $arr["content_group_id"];
                $model->keyswords = $arr["keyswords"];


                $model->save();
            }


        }


    }
    private function ImgGroupAdd($arr)
    {


        $model = new ImgGroup();

        $model->img_url = $arr["name"];
        $model->size = round($arr["size"] / 1024);


        if($model->save())
        {
            return $model->id;
        }
        else
        {
            return null;
        }

    }
    private function ImgGroupupdate($arr,$id)
    {


        $model = ImgGroup::find()->where("id=:id",[":id" => $id])->one();



        $this->deletefile($model->img_url);

        $model->img_url = $arr["name"];
        $model->size = round($arr["size"] / 1024);


        $model->update();

        return "ok";


    }
    private function deleteimg($id)
    {
        $request = Yii::$app->request;

        try{
            $model = ImgGroup::find()->where(['id' => $id])->one();
            $this->deletefile($model->img_url);
            if($model->delete())
            {
                $model = ImgGallery::find()->where(['img_grp_id' => $id])->all();

                foreach ($model as $vl)
                {
                    $ss = ImgGallery::find()->where(['id' => $vl->id])->one();

                    $ss->delete();
                }

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
    private function deleteimgarray($arr)
    {
        $ars = json_decode($arr);

        foreach ($ars as $vl)
        {
            try
            {

                $models = ImgGallery::find()->where("img_grp_id=:grpid",[":grpid" => $vl])->all();
                foreach ($models as $vlx)
                {
                    $mm = $vlx->delete();
                }

                $model = ImgGroup::find($vl)->one();
                $this->deletefile($model->img_url);
                $model->delete();

            }
            catch (\mysqli_sql_exception $exception)
            {
                return  $exception;
            }



        }

        return "ok";
    }
    public function Insert_img($arr)
    {

        foreach ($arr["title"] as $key=>$vl)
        {
            if($arr["title"] !="" && $arr["title"]!=null)
            {
                $Imgmodel = new ImgGallery();

                $Imgmodel->img_grp_id = $arr["img_grp_id"];

                switch ($key)
                {
                    case 0:  $Imgmodel->language_id = 3;break;
                    case 1:  $Imgmodel->language_id = 2;break;
                    case 2:  $Imgmodel->language_id = 1;break;
                }

                $Imgmodel->summary = $arr["summary"][$key];
                $Imgmodel->alt =$arr["alt"][$key];
                $Imgmodel->image_title = $arr["title"][$key];

                $Imgmodel->save();
            }



        }

        return "ok";

    }

    public function update_img($arr)
    {
        $models = ImgGallery::find()->where("img_grp_id = :gerp_id",[":gerp_id" => $arr["img_grp_id"]])->all();


        $counts = 0;

        foreach ($models as $key=>$vl)
        {

            $counts = $key;
            $Imgmodel = ImgGallery::find()->where("id=:id",[":id" => $vl->id])->one();


            $Imgmodel->summary = $arr["summary"][$key];
            $Imgmodel->alt =$arr["alt"][$key];
            $Imgmodel->image_title = $arr["title"][$key];

            $Imgmodel->update();





        }


        for ($i = ($counts+1);$i <= count($arr["title"]);$i++ )
        {
            $mos = new ImgGallery();
            $mos->image_title = $arr["title"][$i];
            $mos->summary = $arr["summary"][$i];
            $mos->alt = $arr["alt"][$i];
            $mos->img_grp_id = $arr["img_grp_id"];

            switch ($i)
            {
                case 0:  $mos->language_id = 3;break;
                case 1:  $mos->language_id = 2;break;
                case 2:  $mos->language_id = 1;break;
            }


            $mos->save();



        }



        return "ok";

    }
    private function CompanyAdd($arr)
    {
        if(isset($_FILES["photo_url"]["name"]))
        {


              $model = new Content();
              $model->name = $arr["name"];
              $model->url_alias = $arr["url_alias"];
              $model->summary = $arr["summary"];
              $model->body = $arr["body"];
              $model->language_id = $arr["language_id"];


                  $photoname = $this->uploadfile($_FILES["photo_url"]);
                  $model->photo_url = $photoname;


              $model->menu_id = $arr["menu_id"];

              $model->save();

              return $model->id;
       }
       else
       {


           return null;
       }


    }
    private function CompanyUpdate($arr)
    {
        if(isset($_FILES["photo_url"]) && $_FILES["photo_url"]["name"] !="" && $_FILES["photo_url"]["name"] !=null)
        {
            $photoname = $this->uploadfile($_FILES["photo_url"]);




            $model = Content::find()->where("id=:id",[":id" => $arr["id"]])->one();
              $model->name = $arr["name"];
              $model->url_alias = $arr["url_alias"];
              $model->summary = $arr["summary"];
              $model->body = $arr["body"];
              $model->language_id = $arr["language_id"];
              $model->photo_url = $photoname;
              $model->menu_id = $arr["menu_id"];
              $model->update();

            return true;
       }
       else
       {


           $model = Content::find()->where("id=:id",[":id" => $arr["id"]])->one();
           $model->name = $arr["name"];
           $model->url_alias = $arr["url_alias"];
           $model->summary = $arr["summary"];

           $model->body = $arr["body"];
           $model->language_id = $arr["language_id"];
           $model->menu_id = $arr["menu_id"];
         $model->save();




           return true;

       }
        return false;


    }
    private function CompanyGroupUpdate($arr)
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
    private function CompanyCategoryAdd($arr)
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


    private function deleteCompany($id)
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

    private function deleteCompanyarray($arr)
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













