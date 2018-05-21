<?php

namespace app\controllers\admin;
use app\controllers\AppController;
use Yii;
use app\models\Users;
use app\models\ImgGroup;
use app\models\ImgGallery;
use app\models\Language;
use app\models\Articles;
use app\models\Articles_grp;



class NewsController extends AppController{

    public $layout = 'admintp';

    public function actionIndex()
    {

        $request = Yii::$app->request;
        $requestx = Yii::$app->session;


        if($request->isPost)
        {
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
            if($request->post("type")=="insert_article")
            {


               if(isset($_FILES["url_img"]) && $_FILES["url_img"]["name"][0] != null && $_FILES["url_img"]["name"][0] != "" )
               {
                          $filesarr = $this->uploadfileArray($_FILES["url_img"]);




                   if(isset($_POST["articles_grp_id"]))
                   {
                       $arr = [
                           "language_id" => $request->post("language_id"),
                           "articles_grp_id" => $request->post("articles_grp_id"),
                           "summary" => $request->post("summary"),
                           "name" => $request->post("name"),
                           "url_alias" => $request->post("url_alias"),
                           "body" => $request->post("body"),
                           "page_title" => $request->post("page_title"),
                           "keywords" => $request->post("keywords"),
                           "description" => $request->post("description"),
                           "url_img" => $filesarr,

                       ];
                       $this->insert_articles($arr);
                   }
                   else
                   {
                       $argrpid = $this->insert_articles_grp();

                       $arr = [
                           "language_id" => $request->post("language_id"),
                           "articles_grp_id" => $argrpid,
                           "name" => $request->post("name"),
                           "summary" => $request->post("summary"),
                           "url_alias" => $request->post("url_alias"),
                           "body" => $request->post("body"),
                           "page_title" => $request->post("page_title"),
                           "keywords" => $request->post("keywords"),
                           "description" => $request->post("description"),
                           "url_img" => $filesarr,

                       ];


                       $this->insert_articles($arr);

                   }



               }
            }

            if($request->post("type")=="articledelete")
            {

                return $this->deletearticle($request->post("id"));
            }
            if($request->post("type")=="articlealldelete")
            {



                return $this->deletearticlearray($request->post("id"));
            }
            if($request->post("type")=="articlestatus")
                {
            $stats = $request->post("status");
                    return $this->update_articles_grp($request->post("id"),$stats);
                }

                if($request->post("type")=="update_article")
                {

                    if(isset($_FILES["url_img"]))
                    {
                        $filesarr = $this->uploadfileArray($_FILES["url_img"]);





                            $arr = [
                                "language_id" => $request->post("language_id"),
                                "articles_grp_id" => $request->post("articles_grp_id"),
                                "name" => $request->post("name"),
                                "url_alias" => $request->post("url_alias"),
                                "summary" => $request->post("summary"),
                                "body" => $request->post("body"),
                                "page_title" => $request->post("page_title"),
                                "keywords" => $request->post("keywords"),
                                "description" => $request->post("description"),
                                "url_img" => $filesarr,
                                "id"=>$request->post("id")

                            ];
                            $this->update_articles($arr);

                    }

                }
        }

        $en=null;
        $ru=null;
        $az=null;


        if(isset($_GET["id"]))
        {

            $mos = (new \yii\db\Query())
                ->from('articles')
                ->leftJoin("articles_grp","articles_grp.id = articles.articles_grp_id")
                ->select("articles.*,articles_grp.status")
                ->where("articles.articles_grp_id = :id",[":id" => $_GET["id"]])
                ->all();


            foreach ($mos as $vl)
            {



                switch ($vl["language_id"])
                {
                    case "3":$en = $vl;break;
                    case "2":$ru = $vl;break;
                    case "1":$az = $vl;break;
                }
            }






            return $this->render("index",compact('en','ru','az'));
        }
        else
        {
            return $this->render("index",compact('en','ru','az'));
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

    private function insert_articles_grp()
    {
        $model = new Articles_grp();



        if($model->save())
        {
            return $model->id;
        }
        else
        {
            return null;
        }
    }
    private function update_articles_grp($id,$stats)
    {
        $ars = json_decode($id);

        if(count($ars) > 1)
        {
            foreach ($ars as $vl)
            {
                $model = Articles_grp::find()->where("id = :ids",[":ids" => $vl])->one();
                $model->status = $stats;



                $model->update();

                $this->debug("if");


            }
        }
        else
        {
            $model = Articles_grp::find()->where("id = :ids",[":ids" => $ars])->one();
            $model->status = $stats;

$this->debug("elese");

            $model->update();
        }


        return "ok";

    }
    private function insert_articles($arr)
    {

        foreach ($arr["name"] as $key => $vl)
        {
            if($vl != null && $vl != "")
            {
                $model = new Articles();
                $model->name = $vl;
                $model->language_id = $arr["language_id"][$key];
                $model->url_img = $arr["url_img"][$key];
                $model->articles_grp_id = $arr["articles_grp_id"];
                $model->url_alias = $arr["url_alias"][$key];
                $model->summary = $arr["summary"][$key];
                $model->body = $arr["body"][$key];
                $model->page_title = $arr["page_title"][$key];
                $model->keywords = $arr["keywords"][$key];
                $model->description = $arr["description"][$key];
                $model->save();

            }
        }

    }

    private function update_articles($arr)
    {

        try
        {


            foreach ($arr["name"] as $key => $vl)
            {


                if($vl != null && $vl != "")
                {
                    $model = Articles::find()->where("id = :id",[":id" =>$arr["id"][$key] ])->one();


                    if($model !=null && $model != 0)
                    {

                        $model->name = $vl;

                        $model->language_id = $arr["language_id"][$key];
                        if($arr["url_img"][$key]!="")
                        {
                            $model->url_img = $arr["url_img"][$key];
                        }


                        $model->url_alias = $arr["url_alias"][$key];
                        $model->summary = $arr["summary"][$key];
                        $model->body = $arr["body"][$key];
                        $model->page_title = $arr["page_title"][$key];
                        $model->keywords = $arr["keywords"][$key];
                        $model->description = $arr["description"][$key];
                        $model->update();
                    }
                    else
                    {

                        if($arr["url_img"][$key]!="") {

                            $model = new Articles();
                            $model->name = $vl;
                            $model->language_id = $arr["language_id"][$key];
                            $model->url_img = $arr["url_img"][$key];
                            $model->articles_grp_id = $arr["articles_grp_id"];
                            $model->url_alias = $arr["url_alias"][$key];
                            $model->summary = $arr["summary"][$key];
                            $model->body = $arr["body"][$key];
                            $model->page_title = $arr["page_title"][$key];
                            $model->keywords = $arr["keywords"][$key];
                            $model->description = $arr["description"][$key];
                            $model->save();
                        }
                    }


                }
            }


        }
        catch (\mysqli_sql_exception $exception)
        {
            return false;
        }

        return true;

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
    private function deletearticle($id)
    {
        $request = Yii::$app->request;

        try{
            $this->debug($id);
            $model = Articles_grp::find()->where(['id' => $id])->one();

            if($model->delete())
            {
                $model = Articles::find()->where(['articles_grp_id' => $id])->all();

                foreach ($model as $vl)
                {
                    $ss = Articles::find()->where(['id' => $vl->id])->one();

                    $this->deletefile($ss->url_img);

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

    private function deletearticlearray($arr)
    {
        $ars = json_decode($arr);

        foreach ($ars as $vl)
        {

            try
            {

                $models = Articles::find()->where("articles_grp_id=:grpid",[":grpid" => $vl])->all();
                foreach ($models as $vlx)
                {

                    $mm = $vlx->delete();
                }

                $model = Articles_grp::find($vl)->one();

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













