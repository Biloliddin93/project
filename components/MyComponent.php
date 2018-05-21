<?php

namespace app\components;


use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use app\models\Translation;

class MyComponent extends Component
{
    public function welcome()
    {
        echo "Hello..Welcome to MyComponent";
    }

    public function Menu()
    {

        $menus = array();

        $curlang = $_SESSION["_language"];

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
                                case "az":
                                    array_push($atre3lvl,[
                                        "txt" => $vvx["txt_az"],
                                        "lang" =>$curlang,
                                        "id" => $vvx["id"],
                                        "position" => $vvx["position"],
                                        "link" => $vvx["link"],
                                        "type" => $vvx["type"],
                                        "status" => $vvx["status"],
                                        "atter_id" => $vvx["atter_id"],
                                    ]);

                                    break;
                                case "ru":   array_push($atre3lvl,[
                                    "txt" => $vvx["txt_ru"],
                                    "lang" =>$curlang,
                                    "id" => $vvx["id"],
                                    "position" => $vvx["position"],
                                    "link" => $vvx["link"],
                                    "type" => $vvx["type"],
                                    "status" => $vvx["status"],
                                    "atter_id" => $vvx["atter_id"],
                                ]); break;
                                case "en":   array_push($atre3lvl,[
                                    "txt" => $vvx["txt_en"],
                                    "lang" =>$curlang,
                                    "id" => $vvx["id"],
                                    "position" => $vvx["position"],
                                    "link" => $vvx["link"],
                                    "type" => $vvx["type"],
                                    "status" => $vvx["status"],
                                    "atter_id" => $vvx["atter_id"],
                                ]); break;
                            }



                        }

                        switch ($curlang)
                        {
                            case "az":
                                array_push($arsm,[
                                    "txt" => $vlx["txt_az"],
                                    "lang" =>$curlang,
                                    "id" => $vlx["id"],
                                    "position" => $vlx["position"],
                                    "link" => $vlx["link"],
                                    "type" => $vlx["type"],
                                    "status" => $vlx["status"],
                                    "atter_id" => $vlx["atter_id"],
                                ]);

                                break;
                            case "ru":   array_push($arsm,[
                                "txt" => $vlx["txt_ru"],
                                "lang" =>$curlang,
                                "id" => $vlx["id"],
                                "position" => $vlx["position"],
                                "link" => $vlx["link"],
                                "status" => $vlx["status"],
                                "type" => $vlx["type"],
                                "atter_id" => $vlx["atter_id"],
                            ]); break;
                            case "en":   array_push($arsm,[
                                "txt" => $vlx["txt_en"],
                                "lang" =>$curlang,
                                "id" => $vlx["id"],
                                "position" => $vlx["position"],
                                "link" => $vlx["link"],
                                "status" => $vlx["status"],
                                "type" => $vlx["type"],
                                "atter_id" => $vlx["atter_id"],
                            ]); break;
                        }


                    }
                    else
                    {

                        switch ($curlang)
                        {
                            case "az":
                                array_push($arsm,[
                                    "txt" => $vlx["txt_az"],
                                    "lang" =>$curlang,
                                    "id" => $vlx["id"],
                                    "position" => $vlx["position"],
                                    "link" => $vlx["link"],
                                    "status" => $vlx["status"],
                                    "type" => $vlx["type"],
                                    "atter_menu"=> "empty",
                                ]);

                                break;
                            case "ru":   array_push($arsm,[
                                "txt" => $vlx["txt_ru"],
                                "lang" =>$curlang,
                                "id" => $vlx["id"],
                                "position" => $vlx["position"],
                                "link" => $vlx["link"],
                                "status" => $vlx["status"],
                                "type" => $vlx["type"],
                                "atter_menu"=> "empty",
                            ]); break;
                            case "en":   array_push($arsm,[
                                "txt" => $vlx["txt_en"],
                                "lang" =>$curlang,
                                "position" => $vlx["position"],
                                "link" => $vlx["link"],
                                "status" => $vlx["status"],
                                "id" => $vlx["id"],
                                "type" => $vlx["type"],
                                "atter_menu"=> "empty",
                            ]); break;
                        }


                    }





                }

                switch ($curlang)
                {
                    case "az":
                        array_push($arr,[
                            "txt" => $vl["txt_az"],
                            "lang" =>$curlang,
                            "id" => $vl["id"],
                            "position" => $vl["position"],
                            "link" => $vl["link"],
                            "status" => $vl["status"],
                            "type" => $vl["type"],
                            "atter_menu"=> $arsm,
                        ]);

                        break;
                    case "ru":   array_push($arr,[
                        "txt" => $vl["txt_ru"],
                        "lang" =>$curlang,
                        "id" => $vl["id"],
                        "position" => $vl["position"],
                        "link" => $vl["link"],
                        "status" => $vl["status"],
                        "type" => $vl["type"],
                        "atter_menu"=> $arsm,
                    ]); break;
                    case "en":   array_push($arr,[
                        "txt" => $vl["txt_en"],
                        "lang" =>$curlang,
                        "id" => $vl["id"],
                        "position" => $vl["position"],
                        "link" => $vl["link"],
                        "status" => $vl["status"],
                        "type" => $vl["type"],
                        "atter_menu"=> $arsm,
                    ]); break;
                }



            }
            else
            {
                switch ($curlang)
                {
                    case "az":
                        array_push($arr,[
                            "txt" => $vl["txt_az"],
                            "lang" =>$curlang,
                            "id" => $vl["id"],
                            "position" => $vl["position"],
                            "link" => $vl["link"],
                            "status" => $vl["status"],
                            "type" => $vl["type"],
                            "atter_menu"=> "empty",
                        ]);

                        break;
                    case "ru":   array_push($arr,[
                        "txt" => $vl["txt_ru"],
                        "lang" =>$curlang,
                        "id" => $vl["id"],
                        "position" => $vl["position"],
                        "link" => $vl["link"],
                        "status" => $vl["status"],
                        "type" => $vl["type"],
                        "atter_menu"=> "empty",
                    ]); break;
                    case "en":   array_push($arr,[
                        "txt" => $vl["txt_en"],
                        "lang" =>$curlang,
                        "id" => $vl["id"],
                        "position" => $vl["position"],
                        "link" => $vl["link"],
                        "status" => $vl["status"],
                        "type" => $vl["type"],
                        "atter_menu"=> "empty",
                    ]); break;
                }


            }

            //  array_push($menus,$arr);

        }

        return $arr;

    }
    public function Translate($keyword)
    {
        $menus = array();

        $curlang = "";


        switch ($_SESSION["_language"])
        {
            case "az": $curlang = 1;break;
            case "ru": $curlang = 2;break;
            case "en": $curlang = 3;break;
        }

        $ustable = (new \yii\db\Query())
            ->select([
                'translation.*',
                'translation_grp.default_message',
                'translation_grp.keyword',

            ])

            ->from('translation')
            ->leftJoin("translation_grp","translation_grp.id=translation.translation_grp_id")
            ->where("translation.language_id = :lang",[":lang" => $curlang])


            ->all();


        $message = null;
            foreach ($ustable as $vl)
            {

                if($vl->keyword == $keyword)
                {
                    $message= ['default'=>$vl->default_message,
                        'message'=>$vl->message];

                    break;
                }

            }


        return $message;
    }

}