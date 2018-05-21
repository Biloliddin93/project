<?php

namespace app\controllers;

use app\models\ImgGroup;
use app\models\Language;
use app\models\Translation;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Users;



class ApiController extends AppController
{


    public function actionJson()
    {
        $lang = (new \yii\db\Query())
            ->from('language')

            ->all();

        $table = (new \yii\db\Query())
            ->from('settings')

            ->one();

        return $this->tojson(["data"=>$table,"language"=>$lang]);
    }
    public function actionUsersstats()
    {


        $porciones = explode(",", Yii::$app->request->post("users_id"));
        $stats = Yii::$app->request->post("user_stats");

        if(count($porciones) == 1)
        {

            if($stats ==3)
            {
                $this->deleteuser($porciones[0]);
            }
            else
            {
                $this->usersstatschange($stats,$porciones[0]);
            }


        }
        else
        {
            foreach ($porciones as $vl)
            {

                if($stats ==3)
                {
                    $this->deleteuser($vl);
                }
                else
                {
                    $this->usersstatschange($stats,$vl);
                }

            }
        }


    }
    public function usersstatschange($stats,$id)
    {
        $model = Users::find()->where(["id"=>$id])->one();
        $model->user_stats = $stats;
        $model->update();

        return true;
    }
    public function deleteuser($id)
    {
        $model = Users::find()->where(["id"=>$id])->one();

        $model->delete();
    }
    public function actionUsers($per_page = 5,$search='',$current_page=1)
    {

        if ($search=='')
        {
            $ustable = (new \yii\db\Query())
                ->from('users')
                ->offset(($per_page*$current_page)-$per_page)
                ->limit($per_page)->all();
            $all =(new \yii\db\Query())
                ->from('users')->all();
            $total = count($all);
            $prev_page = null;
            $next_page = null;


            if(($total / $per_page) >= $current_page)
            {
                $next_page = $current_page+1;
            }

            if(($current_page -1) > 0)
            {
                $prev_page = $current_page -1;
            }


            $toreturn = [
                'UsersList'=>$ustable,
                'total'=>$total,
                'prev_page'=>$prev_page,
                'next_page'=>$next_page,
            ];

            return $this->tojson($toreturn);
        }
        else
        {

            $ustable = (new \yii\db\Query())
                ->from('users')
                ->where(['like', 'fullname', $search])
                ->orWhere(['like', 'email', $search])
                ->offset(($per_page*$current_page)-$per_page)
                ->limit($per_page)->all();

$all =(new \yii\db\Query())
    ->from('users')->all();
            $total = count($all);
            $prev_page = null;
            $next_page = null;

            if(($total / $per_page) > $current_page)
            {
                $next_page = $current_page+1;
            }

            if(($current_page -1) > 0)
            {
                $prev_page = $current_page -1;
            }


   $toreturn = [
       'UsersList'=>$ustable,
       'total'=>$total,
       'prev_page'=>$prev_page,
       'next_page'=>$next_page,
   ];

            return $this->tojson($toreturn);
        }

    }
    public function checkurlang($id)
    {

        $all =(new \yii\db\Query())
            ->from('translation')
            ->where("translation.translation_grp_id = :ids",[":ids" => $id])->all();


        $az = 0;
        $ru = 0;
        $en = 0;
        $azmes ="";
        $rumes ="";
        $enmes ="";

        foreach ($all as $vl)
        {


            if($vl["language_id"] == 1)
            {
                $az = 1;
                $azmes =  $vl["message"];

            }
            if($vl["language_id"] == 2)
            {
                $ru = 1;
                $rumes =  $vl["message"];

            }
            if($vl["language_id"] == 3)
            {
                $en = 1;
                $enmes =  $vl["message"];
            }
        }


        return compact('az','ru','en','azmes','rumes','enmes');

    }
    public function checkhavelangbanner($id)
    {

        $all =(new \yii\db\Query())
            ->from('banner')
            ->where("banner.banner_group_id = :ids",[":ids" => $id])->all();


        $az = 0;
        $ru = 0;
        $en = 0;

        foreach ($all as $vl)
        {


            if($vl["language_id"] == 1)
            {
                $az = 1;


            }
            if($vl["language_id"] == 2)
            {
                $ru = 1;

            }
            if($vl["language_id"] == 3)
            {
                $en = 1;

            }
        }


        return compact('az','ru','en');

    }
    public function actionTranslation($per_page = 5,$search='',$current_page=1)
    {

        $lang =  $this->currentlang();

        $ln = (new \yii\db\Query())
            ->from('language')

            ->all();

        if ($search=='')
        {


            $ustable = (new \yii\db\Query())
                ->select([
                    'translation.*',
                    'translation_grp.default_message',
                    'translation_grp.keyword',

                ])

                ->from('translation')
                ->leftJoin("translation_grp","translation_grp.id=translation.translation_grp_id")
                ->where("translation.language_id = :lang",[":lang" => $lang])
                ->offset(($per_page*$current_page)-$per_page)
                ->limit($per_page)
                ->all();

            $all =(new \yii\db\Query())
                ->from('translation_grp')->all();
            $total = count($all);
            $prev_page = null;
            $next_page = null;


            if(($total / $per_page) >= $current_page)
            {
                $next_page = $current_page+1;
            }

            if(($current_page -1) > 0)
            {
                $prev_page = $current_page -1;
            }

$myarr = array();
            foreach ($ustable as $key=>$val)
            {
                 $vvls=$this->checkurlang($val["translation_grp_id"]);


                $val += $vvls;

                array_push($myarr,$val);



            }

         ///   $this->debug($myarr);



            $pagen = floor($total / $per_page);

            $toreturn = [
                'Translation'=>$myarr,
                'total'=>$total,
                'prev_page'=>$prev_page,
                'next_page'=>$next_page,
                'language'=>$ln,
                'pagenater' =>$pagen
            ];


            return $this->tojson($toreturn);
        }
        else
        {

            $ustable = (new \yii\db\Query())
                ->select([
                    'translation.*',
                    'translation_grp.default_message',
                    'translation_grp.keyword',

                ])

                ->from('translation')
                ->innerJoin("translation_grp","translation_grp.id=translation.translation_grp_id")
                ->where("translation.language_id = :lang",[":lang" => $lang])
                ->andwhere("translation_grp.id = translation.translation_grp_id")
                ->andWhere(['like', 'translation.message', $search])
                ->orWhere(['like', 'translation_grp.keyword', $search])
                ->orWhere(['like', 'translation_grp.default_message', $search])
                ->groupBy("translation.translation_grp_id")
                ->offset(($per_page*$current_page)-$per_page)
                ->limit($per_page)
                ->all();

            $all =(new \yii\db\Query())
                ->from('translation_grp')->all();
            $total = count($all);
            $prev_page = null;
            $next_page = null;


            if(($total / $per_page) >= $current_page)
            {
                $next_page = $current_page+1;
            }

            if(($current_page -1) > 0)
            {
                $prev_page = $current_page -1;
            }

            $myarr = array();
            foreach ($ustable as $key=>$val)
            {
                $vvls=$this->checkurlang($val["translation_grp_id"]);


                $val += $vvls;

                array_push($myarr,$val);



            }



$pagen = floor($total / $per_page);


            $toreturn = [
                'Translation'=>$myarr,
                'total'=>$total,
                'prev_page'=>$prev_page,
                'next_page'=>$next_page,
                'language'=>$ln,
                'pagenater' =>$pagen
            ];


            return $this->tojson($toreturn);


        }

    }

    public function actionImggallery($per_page = 5,$search='',$current_page=1)
    {

        if ($search=='')
        {
            $ustable = (new \yii\db\Query())
                ->from('img_gallery')
                ->leftJoin("img_group","img_group.id = img_gallery.img_grp_id")
                ->where("img_gallery.language_id = :lang",[":lang" => $this->currentlang()])
                ->offset(($per_page*$current_page)-$per_page)
                ->limit($per_page)->all();

            $all =(new \yii\db\Query())
                ->from('img_group')->all();
            $total = count($all);
            $prev_page = null;
            $next_page = null;


            if(($total / $per_page) >= $current_page)
            {
                $next_page = $current_page+1;
            }

            if(($current_page -1) > 0)
            {
                $prev_page = $current_page -1;
            }


            $toreturn = [
                'ImgGallery'=>$ustable,
                'total'=>$total,
                'prev_page'=>$prev_page,
                'next_page'=>$next_page,
            ];

            return $this->tojson($toreturn);
        }
        else
        {
            $ustable = (new \yii\db\Query())
                ->from('img_gallery')
                ->leftJoin("img_group","img_group.id = img_gallery.img_grp_id")
                ->where("img_gallery.language_id = :lang",[":lang" => $this->currentlang()])
                ->andWhere(['like', 'image_title', $search])
                ->orWhere(['like', 'alt', $search])
                ->orWhere(['like', 'summary', $search])
                ->groupBy("language_id")
                ->offset(($per_page*$current_page)-$per_page)
                ->limit($per_page)->all();



            $all =(new \yii\db\Query())
                ->from('img_group')->all();
            $total = count($all);
            $prev_page = null;
            $next_page = null;

            if(($total / $per_page) > $current_page)
            {
                $next_page = $current_page+1;
            }

            if(($current_page -1) > 0)
            {
                $prev_page = $current_page -1;
            }


            $toreturn = [
                'ImgGallery'=>$ustable,
                'total'=>$total,
                'prev_page'=>$prev_page,
                'next_page'=>$next_page,
            ];

            return $this->tojson($toreturn);
        }

    }
    public function actionImg()
    {


            $ustable = (new \yii\db\Query())
                ->from('img_gallery')
                ->leftJoin("img_group","img_group.id = img_gallery.img_grp_id")
                ->where("img_gallery.language_id = :lang",[":lang" => $this->currentlang()])
                ->offset(($per_page*$current_page)-$per_page)
                ->limit($per_page)->all();

            $all =(new \yii\db\Query())
                ->from('img_group')->all();

            return $this->tojson($toreturn);

    }
    public function actionGetimages()
    {

        $model = (new \yii\db\Query())
            ->from('img_group')->all();

        return $this->tojson($model);

    }
    public function actionImggalleryupdate($id)
    {

            $ustable = (new \yii\db\Query())
                ->from('img_gallery')
                ->leftJoin("img_group","img_group.id = img_gallery.img_grp_id")
                ->where("img_gallery.img_grp_id = :lang",[":lang" => $id])
                ->orderBy("language_id DESC")
                ->all();




            return $this->tojson($ustable);


    }

    public function actionArticle($per_page = 5,$search='',$current_page=1)
    {
        $lang = $this->currentlang();

        if ($search=='')
        {
            $ustable = (new \yii\db\Query())
                ->from('articles')
                ->leftJoin("articles_grp","articles_grp.id = articles.articles_grp_id")
                ->where("articles.language_id=:ln",[":ln" => $lang])
                ->offset(($per_page*$current_page)-$per_page)
                ->groupBy("articles.articles_grp_id")
                ->limit($per_page)->all();

            $all =(new \yii\db\Query())
                ->from('articles_grp')->all();
            $total = count($all);
            $prev_page = null;
            $next_page = null;


            if(($total / $per_page) >= $current_page)
            {
                $next_page = $current_page+1;
            }

            if(($current_page -1) > 0)
            {
                $prev_page = $current_page -1;
            }


            $toreturn = [
                'Article'=>$ustable,
                'total'=>$total,
                'prev_page'=>$prev_page,
                'next_page'=>$next_page,
            ];

            return $this->tojson($toreturn);
        }
        else
        {
            $ustable = (new \yii\db\Query())
                ->from('articles')
                ->leftJoin("articles_grp","articles_grp.id = articles.articles_grp_id")

                ->andWhere(['like', 'name', $search])
                ->orWhere(['like', 'summary', $search])
                ->orWhere(['like', 'body', $search])
                ->orWhere(['like', 'page_title', $search])
                ->orWhere(['like', 'keywords', $search])
                ->orWhere(['like', 'description', $search])
                ->groupBy("articles.articles_grp_id")
                ->offset(($per_page*$current_page)-$per_page)
                ->limit($per_page)->all();



            $all =(new \yii\db\Query())
                ->from('articles_grp')->all();
            $total = count($all);
            $prev_page = null;
            $next_page = null;

            if(($total / $per_page) > $current_page)
            {
                $next_page = $current_page+1;
            }

            if(($current_page -1) > 0)
            {
                $prev_page = $current_page -1;
            }


            $toreturn = [
                'Article'=>$ustable,
                'total'=>$total,
                'prev_page'=>$prev_page,
                'next_page'=>$next_page,
            ];

            return $this->tojson($toreturn);
        }

    }

    public function actionBanner($per_page = 5,$search='',$current_page=1)
    {

        $lang =  $this->currentlang();



        if ($search=='')
        {


            $ustable = (new \yii\db\Query())

                ->from('banner')
                ->leftJoin("banner_group","banner_group.id=banner.banner_group_id")
                ->where("banner.language_id = :lang",[":lang" => $lang])
                ->offset(($per_page*$current_page)-$per_page)
                ->limit($per_page)
                ->all();

            $all =(new \yii\db\Query())
                ->from('banner_group')->all();
            $total = count($all);
            $prev_page = null;
            $next_page = null;


            if(($total / $per_page) >= $current_page)
            {
                $next_page = $current_page+1;
            }

            if(($current_page -1) > 0)
            {
                $prev_page = $current_page -1;
            }

            $myarr = array();
            foreach ($ustable as $key=>$val)
            {
                $vvls=$this->checkhavelangbanner($val["banner_group_id"]);


                $val += $vvls;

                array_push($myarr,$val);



            }

            ///   $this->debug($myarr);



            $pagen = floor($total / $per_page);

            $toreturn = [
                'Banner'=>$myarr,
                'total'=>$total,
                'prev_page'=>$prev_page,
                'next_page'=>$next_page,

                'pagenater' =>$pagen
            ];


            return $this->tojson($toreturn);
        }
        else
        {

            $ustable = (new \yii\db\Query())

                ->from('banner')
                ->leftJoin("banner_group","banner_group.id=banner.banner_group_id")
                ->where("banner.language_id = :lang",[":lang" => $lang])


                ->andWhere(['like', 'banner.banner_title', $search])
                ->orWhere(['like', 'banner.banner_alt', $search])
                ->orWhere(['like', 'banner.banner_deck', $search])
                ->groupBy("banner.language_id")
                ->offset(($per_page*$current_page)-$per_page)
                ->limit($per_page)
                ->all();


            $all =(new \yii\db\Query())
                ->from('banner_group')->all();
            $total = count($all);
            $prev_page = null;
            $next_page = null;


            if(($total / $per_page) >= $current_page)
            {
                $next_page = $current_page+1;
            }

            if(($current_page -1) > 0)
            {
                $prev_page = $current_page -1;
            }

            $myarr = array();
            foreach ($ustable as $key=>$val)
            {
                $vvls=$this->checkhavelangbanner($val["banner_group_id"]);


                $val += $vvls;

                array_push($myarr,$val);



            }



            $pagen = floor($total / $per_page);


            $toreturn = [
                'Banner'=>$myarr,
                'total'=>$total,
                'prev_page'=>$prev_page,
                'next_page'=>$next_page,

                'pagenater' =>$pagen
            ];


            return $this->tojson($toreturn);


        }

    }
    public function actionBannerone($id)
    {




        $ustable = (new \yii\db\Query())

            ->from('banner')
            ->innerJoin("banner_group","banner_group.id=banner.banner_group_id")
            ->leftJoin("banner_category","banner_category.id=banner_group.banner_category_id")
            ->where("banner_group_id=:ids",[":ids" => $id])
            ->select("banner.*,banner_group.img_group,banner_group.banner_category_id")

            ->all();


        return $this->tojson($ustable);

    }
    public function Menu()
    {

        $menus = array();

        $curlang = $this->currentlang();

        $mmn = (new \yii\db\Query())
            ->from('menu')
            ->where("menu.atter_id = :arrter",[":arrter" => 0])

            ->all();


        $arr = [];

        foreach ($mmn as $vl)
        {




            $mmns = (new \yii\db\Query())
                ->from('menu')
                ->where("menu.atter_id = :arrter",[":arrter" => $vl["id"]])

                ->all();


            if( $mmns !=null && $mmns !="")
            {

                $arsm = [];
                foreach ($mmns as $vlx)
                {

                    $mmnss = (new \yii\db\Query())
                        ->from('menu')
                        ->where("menu.atter_id = :arrter",[":arrter" => $vlx["id"]])

                        ->all();
                    $atre3lvl =[];
                      if( $mmnss !=null && $mmnss !="")
                        {

                            foreach ($mmnss as $vvx)
                            {

                                switch ($curlang)
                                {
                                    case 1:
                                        array_push($atre3lvl,[
                                            "txt" => $vvx["txt_az"],
                                            "lang" =>$curlang,
                                            "id" => $vvx["id"],
                                            "atter_id" => $vvx["atter_id"],
                                        ]);

                                        break;
                                    case 2:   array_push($atre3lvl,[
                                        "txt" => $vvx["txt_ru"],
                                        "lang" =>$curlang,
                                        "id" => $vvx["id"],
                                        "atter_id" => $vvx["atter_id"],
                                    ]); break;
                                    case 3:   array_push($atre3lvl,[
                                        "txt" => $vvx["txt_en"],
                                        "lang" =>$curlang,
                                        "id" => $vvx["id"],
                                        "atter_id" => $vvx["atter_id"],
                                    ]); break;
                                }



                            }

                            switch ($curlang)
                            {
                                case 1:
                                    array_push($arsm,[
                                        "txt" => $vlx["txt_az"],
                                        "lang" =>$curlang,
                                        "id" => $vlx["id"],
                                        "atter_id" => $vlx["atter_id"],
                                    ]);

                                    break;
                                case 2:   array_push($arsm,[
                                    "txt" => $vlx["txt_ru"],
                                    "lang" =>$curlang,
                                    "id" => $vlx["id"],
                                    "atter_id" => $vlx["atter_id"],
                                ]); break;
                                case 3:   array_push($arsm,[
                                    "txt" => $vlx["txt_en"],
                                    "lang" =>$curlang,
                                    "id" => $vlx["id"],
                                    "atter_id" => $vlx["atter_id"],
                                ]); break;
                            }


                        }
                        else
                        {

                            switch ($curlang)
                            {
                                case 1:
                                    array_push($arsm,[
                                        "txt" => $vlx["txt_az"],
                                        "lang" =>$curlang,
                                        "id" => $vlx["id"],
                                        "atter_menu"=> "empty",
                                    ]);

                                    break;
                                case 2:   array_push($arsm,[
                                    "txt" => $vlx["txt_ru"],
                                    "lang" =>$curlang,
                                    "id" => $vlx["id"],
                                    "atter_menu"=> "empty",
                                ]); break;
                                case 3:   array_push($arsm,[
                                    "txt" => $vlx["txt_en"],
                                    "lang" =>$curlang,
                                    "id" => $vlx["id"],
                                    "atter_menu"=> "empty",
                                ]); break;
                            }


                        }





                }

                switch ($curlang)
                {
                    case 1:
                        array_push($arr,[
                            "txt" => $vl["txt_az"],
                            "lang" =>$curlang,
                            "id" => $vl["id"],
                            "atter_menu"=> $arsm,
                        ]);

                        break;
                    case 2:   array_push($arr,[
                        "txt" => $vl["txt_ru"],
                        "lang" =>$curlang,
                        "id" => $vl["id"],
                        "atter_menu"=> $arsm,
                    ]); break;
                    case 3:   array_push($arr,[
                        "txt" => $vl["txt_en"],
                        "lang" =>$curlang,
                        "id" => $vl["id"],
                        "atter_menu"=> $arsm,
                    ]); break;
                }



            }
            else
            {
                switch ($curlang)
                {
                    case 1:
                        array_push($arr,[
                            "txt" => $vl["txt_az"],
                            "lang" =>$curlang,
                            "id" => $vl["id"],
                            "atter_menu"=> "empty",
                        ]);

                        break;
                    case 2:   array_push($arr,[
                        "txt" => $vl["txt_ru"],
                        "lang" =>$curlang,
                        "id" => $vl["id"],
                        "atter_menu"=> "empty",
                    ]); break;
                    case 3:   array_push($arr,[
                        "txt" => $vl["txt_en"],
                        "lang" =>$curlang,
                        "id" => $vl["id"],
                        "atter_menu"=> "empty",
                    ]); break;
                }


            }

         //  array_push($menus,$arr);

        }

        return $arr;

    }

    public function actionGet()
    {
        $model  = (new \yii\db\Query())
            ->from('menu')
            ->where("menu.id = :arrter",[":arrter" => $_GET["ids"]])

            ->all();


        return $this->tojson($model);
    }

}
