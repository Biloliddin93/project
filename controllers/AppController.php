<?php

namespace app\controllers;
use yii\web\Controller;
use Yii;
use app\models\Language;
use app\models\Settings;

class AppController extends Controller{

   public function debug($arr)
   {
       echo '<pre> '.print_r($arr,true).' </pre>';
   }
   public function uploadfile($file,$expensions=null,$filesize = 2097152)
   {


       $path = Yii::$app->basePath;
       $errors= array();
       $file_name = $file['name'];
       $file_size =$file['size'];
       $file_tmp =$file['tmp_name'];
       $file_type=$file['type'];
       $file_ext=explode('.',$file_name);
       $file_ext = $file_ext[count($file_ext)-1];
       $file_name = date("YmdHis").".".$file_ext;



       if($expensions !=null)
       {
           if(in_array($file_ext,$expensions)=== false){
               $errors[]="extension not allowed";
           }
       }



       if($file_size > $filesize){
           $errors[]='File size must be excately 2 MB';
       }

       if(empty($errors)==true){
           move_uploaded_file($file_tmp,$path."/web/images/".$file_name);



          return $file_name;


       }
       else
       {
           return null;
       }

   }
    public function uploadfileArray($file,$expensions=null,$filesize = 2097152)
    {


        $path = Yii::$app->basePath;

        $arr = array();


        foreach ($file["name"] as $key=>$vl)
        {
            if($file['name'][$key] !="" && $file['name'][$key]!=null)
            {
                $errors= array();
                $file_name = $file['name'][$key];
                $file_size =$file['size'][$key];
                $file_tmp =$file['tmp_name'][$key];
                $file_type=$file['type'][$key];
                $file_ext=explode('.',$file_name);
                $file_ext = $file_ext[count($file_ext)-1];
                $file_name = date("YmdHis").".".$file_ext;



                if($expensions !=null)
                {
                    if(in_array($file_ext,$expensions)=== false){
                        $errors[]="extension not allowed";
                    }
                }



                if($file_size > $filesize){
                    $errors[]='File size must be excately 2 MB';
                }

                if(empty($errors)==true){
                    move_uploaded_file($file_tmp,$path."/web/images/".$file_name);
                    $nv= array_push($arr,$file_name);

                }
            }
            else
            {
                array_push($arr,"");
            }


        }
        return $arr;


    }
   public function uploadfilesize($file,$expensions=null,$filesize = 2097152)
   {


       $path = Yii::$app->basePath;
       $errors= array();
       $file_name = $file['name'];
       $file_size =$file['size'];
       $file_tmp =$file['tmp_name'];
       $file_type=$file['type'];
       $file_ext=explode('.',$file_name);
       $file_ext = $file_ext[count($file_ext)-1];
       $file_name = date("YmdHis").".".$file_ext;



       if($expensions !=null)
       {
           if(in_array($file_ext,$expensions)=== false){
               $errors[]="extension not allowed";
           }
       }



       if($file_size > $filesize){
           $errors[]='File size must be excately 2 MB';
       }

       if(empty($errors)==true){
           move_uploaded_file($file_tmp,$path."/web/images/".$file_name);


$arr = [
    "name"=>$file_name,
    "size"=>$file_size
];
          return $arr;


       }
       else
       {
           return null;
       }

   }
   public function deletefile($filename)
   {
       try
       {
           $path = Yii::$app->basePath."/web/images/".$filename;
           if (file_exists($filename)) {
               if(unlink($path)) {return "Deleted file ";}
               else
               {
                   return null;

               }
           }


       }
       catch (\mysqli_sql_exception $mysqli_sql_exception)
       {

       }

   }
   public function tojson($arr)
   {

       header('Content-Type: application/json');
       return json_encode($arr,JSON_PRETTY_PRINT);
   }
   public function Sessions()
   {

       $se = $this->getsettings();
       $curlang = $this->getlanguage($se->admin_language_id);
       if(!Yii::$app->session->isActive)
       {
           Yii::$app->session->open();


       }

       Yii::$app->session->destroySession("lang");

       Yii::$app->session->set("lang",$curlang);
       Yii::$app->session->set("site_title",$se->site_title);
       Yii::$app->session->set("favicon",$se->favicon);
       Yii::$app->session->set("adminemail",$se->adminemail);
       Yii::$app->session->set("empty_stats",$se->empty_stats);

       Yii::$app->language =$curlang;
   }


    public function getlanguage($id)
    {
        $table = Language::find()->where(['id'=>$id])->one();


        return $table;
    }

    public function getsettings()
    {
        $table = Settings::find()->one();


        return $table;
    }
    public function currentlang($id = true)
    {
        if(!Yii::$app->session->isActive)
        {
            Yii::$app->session->open();
        }

        if($id)
        {
            switch ($_SESSION["_language"])
            {
                case "az": return 1;break;
                case "ru": return 2;break;
                case "en": return 3;break;
                default: return 2;
            }
        }
        else
        {
            return $_SESSION["_language"];
        }

    }








}

