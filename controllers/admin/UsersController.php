<?php

namespace app\controllers\admin;
use app\controllers\AppController;
use Yii;
use app\models\Users;
use yii\web\UploadedFile;



class UsersController extends AppController{

    public $layout = 'admintp';

    public function actionIndex()
    {
        $this->debug(\Yii::$app);
    }
    public function actionAdd()
    {

        $model = new Users();
        $request = Yii::$app->request;

        if($request->isPost)
        {



                $us = $request->post("Users");


                $model->fullname = $us["fullname"];
                $model->login = $us["login"];
                $model->password = $us["password"];
                $model->email = $us["email"];
                $model->user_stats = $us["user_stats"];


                if(isset($_FILES["avatar"]))
                {

                    $namefile = $this->uploadfile($_FILES["avatar"]);

                    if( $namefile !=null){


                        $model->avatar = $namefile;
                    }

                }
                else
                {
                    $model->avatar = "user_empty.png";
                }

                $model->save();
        }

        return $this->render("add",compact('model'));

    }
    public function actionUpdate($id)
    {

        $model = Users::find()->where(['id' => $id])->one();
        $request = Yii::$app->request;

        if($request->isPost)
        {


            $us = Yii::$app->request->post("Users");
            $model->fullname = $us["fullname"];
            $model->login = $us["login"];
            $model->password = $us["password"];
            $model->email = $us["email"];


            if(isset($_FILES["avatar"]))
            {

                $namefile = $this->uploadfile($_FILES["avatar"]);

               if( $namefile !=null){


                   $model->avatar = $namefile;
               }

            }
            else
            {
                $model->avatar = "user_empty.png";
            }

            $model->update();



        }

        return $this->render("add",compact('model'));
    }

    public  function actionDelete($id)
    {

        $request = Yii::$app->request;

            $model = Users::find()->where(['id' => $id])->one();
            $this->deletefile($model->avatar);

            if($model->delete())
            {
                return "Success ";
            }
            else
            {
                return "error";
            }







    }

    public function actionJson($id=null)
    {

        if($id == null)
        {
            $query = (new \yii\db\Query())
                ->from('users')

                ->all();



            return $this->tojson($query);
        }
        else
        {
            $query = (new \yii\db\Query())
                ->from('users')
                ->where(['id' => $id])
                ->one();
            return $this->tojson($query);
        }
    }


}













