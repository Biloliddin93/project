<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


?>

<div class="title_page">
    <h2>
        <?=language(Yii::$app->language,[
                "az"=>"Maddə",
                "ru"=>"Статья",
                "en"=>"Article",
        ])?>
    </h2>
</div>
<div class="tabs" id="app">
    <ul class="tabs__caption">
        <li class="active">ENGLISH</li>
        <li>RUSSIAN</li>
        <li>AZERBAIJANI</li>
        <li>GALLERY</li>
        <li>    <?=language(Yii::$app->language,[
                "az"=>"AYARLAR",
                "ru"=>"НАСТРОЙКИ",
                "en"=>"SETTINGS",
            ])?></li>
    </ul>


    <?php $form = ActiveForm::begin([ 'id' => 'galery-form','options' => [
        'enctype' => 'multipart/form-data',
    ]]); ?>
    <input type="hidden" name="menu_id" value="<?=$_GET["id"] ?>">

    <?php

    if(isset($first["language_id"]))
    {
        echo '<input type="hidden" name="type" value="update_content">';
        echo '<input type="hidden" name="id" value="'.$first["id"].'">';
    }
    else
    {
        echo '<input type="hidden" name="type" value="insert_content">';
    }
    ?>

    <input type="hidden" name="language_id" value="3">
    <div class="tabs__content active">
        <div class="wrap_toggle">
            <div class="toggle_title">
                <?=language(Yii::$app->language,[
                    "az"=>"Səhifə məzmunu",
                    "ru"=>"Содержание страницы",
                    "en"=>"Page content",
                ])?>



            </div>
            <div class="wrap__tabs__content wrap__tabs__content__company">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-5 left_form__company">
                            <label for="" class="wrap_input">
                                <div class="title_input">
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Adı",
                                        "ru"=>"Название",
                                        "en"=>"Name",
                                    ])?>

                                </div>
                                <div class="wrap_count">
                                    <div class="input_count">
															<span class="count_text">
																0
															</span>
                                        /
                                        <span class="fixed_count">
																60
															</span>
                                    </div>
                                    <input type="text" name="name" value="<?= $first["name"] ?>" maxlength="60" class="input_style w100 count_output">
                                </div>
                            </label>
                            <label for="" class="wrap_input">
                                <div class="title_input">
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Url alias",
                                        "ru"=>"Url alias",
                                        "en"=>"Url alias",
                                    ])?>

                                </div>
                                <div class="wrap_count">
                                    <div class="input_count">
															<span class="count_text">
																0
															</span>
                                        /
                                        <span class="fixed_count">
																60
															</span>
                                    </div>
                                    <input type="text"  name="url_alias" value="<?= $first["url_alias"] ?>"  maxlength="60" class="input_style w100 count_output">
                                </div>
                            </label>
                            <label for="" class="wrap_input">
                                <div class="title_input grey_font">
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Xülasə",
                                        "ru"=>"Сводка",
                                        "en"=>"Summary",
                                    ])?>

                                </div>
                                <textarea name="summary"  id="summary" class="textarea_style w100"><?= $first["summary"] ?></textarea>
                            </label>
                        </div>
                        <div class="col-md-7 right_form__company">
                            <div class="title_input grey_font">
                                <?=language(Yii::$app->language,[
                                    "az"=>"Xüsusi şəkillər",
                                    "ru"=>"Популярные изображения",
                                    "en"=>"Featured Image",
                                ])?>

                            </div>
                            <div class="img_block__company_wrap">
                                <?php if($first["photo_url"] != "" && $first["photo_url"] !=null){ ?>
                                    <img width="200" height="100%" src="<?=Yii::$app->homeUrl?>images/<?=$first["photo_url"] ?>">
                                <?php } ?>
                                 <label class="btn_common_styles btn_gray btn_delete">
                                    <span class="icon__delete"></span>
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Silin",
                                        "ru"=>"Изображение",
                                        "en"=>"Image",
                                    ])?> <input type="file"  name="photo_url"  style="display: none;">
                                </label>

                            </div>
                        </div>
                        <div class="col-xs-12">
                            <label for="" class="wrap_input mt17">
                                <div class="title_input grey_font">
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Bədən",
                                        "ru"=>"основная часть",
                                        "en"=>"Body",
                                    ])?>

                                </div>
                                <textarea name="body" id="body" class="textarea_style editor_style"><?= $first["body"] ?></textarea>
                                <?php
                                 $urls = Url::to(['img/image-upload']);
                                 $urlss = Url::to(['/img/images-get']);
                                echo \vova07\imperavi\Widget::widget([
                                    'selector' => '#body',
                                    'settings' => [
                                        'lang' => 'ru',
                                        'minHeight' => 200,
                                        'imageUpload' => "$urls",
                                        'imageManagerJson' => "$urlss" ,
                                        'plugins' => [

                                            'imagemanager',
                                            'table',
                                            'fontcolor',
                                            'fontsize',
                                            'fontfamily',
                                            'video',



                                        ]
                                    ]
                                ]);
                                ?>


                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="wrap_toggle">
            <div class="toggle_title">
                <?=language(Yii::$app->language,[
                    "az"=>"SEO Ayarları",
                    "ru"=>"Настройки SEO",
                    "en"=>"SEO Settings",
                ])?>

            </div>
            <div class="wrap__tabs__content wrap__tabs__content__company__bottom">
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="wrap_input">
                            <div class="title_input">
                                <?=language(Yii::$app->language,[
                                    "az"=>"Səhifə Başlığı",
                                    "ru"=>"Заголовок страницы",
                                    "en"=>"Page Title",
                                ])?>

                            </div>
                            <div class="wrap_count">
                                <div class="input_count">
														<span class="count_text">
															0
														</span>
                                    /
                                    <span class="fixed_count">
															60
														</span>
                                </div>
                                <input type="text" name="page_title" value="<?= $first["page_title"] ?>" maxlength="60" class="input_style w100 count_output">
                            </div>
                        </label>
                        <label for="" class="wrap_input">
                            <div class="title_input grey_font">
                                <?=language(Yii::$app->language,[
                                    "az"=>"Açar sözlər",
                                    "ru"=>"Ключевые слова",
                                    "en"=>"Keywords",
                                ])?>
                            </div>
                            <textarea name="page_deck" id="" class="textarea_style w100"><?=$first["page_deck"] ?></textarea>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="wrap_input">
                            <div class="title_input grey_font">
                                <?=language(Yii::$app->language,[
                                    "az"=>"Səhifə təsviri",
                                    "ru"=>"Описание страницы",
                                    "en"=>"Page Description",
                                ])?>

                            </div>
                            <textarea name="keyswords" id="" class="textarea_style w100 h200"><?=$first["keyswords"] ?></textarea>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap__bottom__tabs__content">
            <div class="row">
                <div class="col-md-12 tar col-middle">
                    <button type="submit" class="btn_light_green btn_save">
                        <?=language(Yii::$app->language,[
                            "az"=>"Yadda saxla",
                            "ru"=>"Сохранить",
                            "en"=>"Save",
                        ])?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>


    <?php $form = ActiveForm::begin([ 'id' => 'galery-form','options' => [
        'enctype' => 'multipart/form-data',
    ]]); ?>
    <input type="hidden" name="menu_id" value="<?=$_GET["id"] ?>">

    <?php

    if(isset($second["language_id"]))
    {
        echo '<input type="hidden" name="type" value="update_content">';
        echo '<input type="hidden" name="id" value="'.$second["id"].'">';
    }
    else
    {
        echo '<input type="hidden" name="type" value="insert_content">';
    }
    ?>

    <input type="hidden" name="language_id" value="2">
    <div class="tabs__content ">
        <div class="wrap_toggle">
            <div class="toggle_title">
                <?=language(Yii::$app->language,[
                    "az"=>"Səhifə məzmunu",
                    "ru"=>"Содержание страницы",
                    "en"=>"Page content",
                ])?>



            </div>
            <div class="wrap__tabs__content wrap__tabs__content__company">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-5 left_form__company">
                            <label for="" class="wrap_input">
                                <div class="title_input">
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Adı",
                                        "ru"=>"Название",
                                        "en"=>"Name",
                                    ])?>

                                </div>
                                <div class="wrap_count">
                                    <div class="input_count">
															<span class="count_text">
																0
															</span>
                                        /
                                        <span class="fixed_count">
																60
															</span>
                                    </div>
                                    <input type="text" name="name" value="<?= $second["name"] ?>" maxlength="60" class="input_style w100 count_output">
                                </div>
                            </label>
                            <label for="" class="wrap_input">
                                <div class="title_input">
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Url alias",
                                        "ru"=>"Url alias",
                                        "en"=>"Url alias",
                                    ])?>

                                </div>
                                <div class="wrap_count">
                                    <div class="input_count">
															<span class="count_text">
																0
															</span>
                                        /
                                        <span class="fixed_count">
																60
															</span>
                                    </div>
                                    <input type="text"  name="url_alias" value="<?= $second["url_alias"] ?>"  maxlength="60" class="input_style w100 count_output">
                                </div>
                            </label>
                            <label for="" class="wrap_input">
                                <div class="title_input grey_font">
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Xülasə",
                                        "ru"=>"Сводка",
                                        "en"=>"Summary",
                                    ])?>

                                </div>
                                <textarea name="summary"  id="summary" class="textarea_style w100"><?= $second["summary"] ?></textarea>
                            </label>
                        </div>
                        <div class="col-md-7 right_form__company">
                            <div class="title_input grey_font">
                                <?=language(Yii::$app->language,[
                                    "az"=>"Xüsusi şəkillər",
                                    "ru"=>"Популярные изображения",
                                    "en"=>"Featured Image",
                                ])?>

                            </div>
                            <div class="img_block__company_wrap">
                                <?php if($second["photo_url"] != "" && $second["photo_url"] !=null){ ?>
                                    <img width="200" height="100%" src="<?=Yii::$app->homeUrl?>images/<?=$second["photo_url"] ?>">
                                <?php } ?>
                                 <label class="btn_common_styles btn_gray btn_delete">
                                    <span class="icon__delete"></span>
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Silin",
                                        "ru"=>"Изображение",
                                        "en"=>"Image",
                                    ])?> <input type="file"  name="photo_url"  style="display: none;">
                                </label>

                            </div>
                        </div>
                        <div class="col-xs-12">
                            <label for="" class="wrap_input mt17">
                                <div class="title_input grey_font">
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Bədən",
                                        "ru"=>"основная часть",
                                        "en"=>"Body",
                                    ])?>

                                </div>
                                <textarea name="body" id="body2" class="textarea_style editor_style"><?= $second["body"] ?></textarea>

                                <?php
                                $urls = Url::to(['img/image-upload']);
                                $urlss = Url::to(['/img/images-get']);
                                echo \vova07\imperavi\Widget::widget([
                                    'selector' => '#body2',
                                    'settings' => [
                                        'lang' => 'ru',
                                        'minHeight' => 200,
                                        'imageUpload' => "$urls",
                                        'imageManagerJson' => "$urlss" ,
                                        'plugins' => [

                                            'imagemanager',
                                            'table',
                                            'fontcolor',
                                            'fontsize',
                                            'fontfamily',
                                            'video',



                                        ]
                                    ]
                                ]);
                                ?>

                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="wrap_toggle">
            <div class="toggle_title">
                <?=language(Yii::$app->language,[
                    "az"=>"SEO Ayarları",
                    "ru"=>"Настройки SEO",
                    "en"=>"SEO Settings",
                ])?>

            </div>
            <div class="wrap__tabs__content wrap__tabs__content__company__bottom">
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="wrap_input">
                            <div class="title_input">
                                <?=language(Yii::$app->language,[
                                    "az"=>"Səhifə Başlığı",
                                    "ru"=>"Заголовок страницы",
                                    "en"=>"Page Title",
                                ])?>

                            </div>
                            <div class="wrap_count">
                                <div class="input_count">
														<span class="count_text">
															0
														</span>
                                    /
                                    <span class="fixed_count">
															60
														</span>
                                </div>
                                <input type="text" name="page_title" value="<?= $second["page_title"] ?>" maxlength="60" class="input_style w100 count_output">
                            </div>
                        </label>
                        <label for="" class="wrap_input">
                            <div class="title_input grey_font">
                                <?=language(Yii::$app->language,[
                                    "az"=>"Açar sözlər",
                                    "ru"=>"Ключевые слова",
                                    "en"=>"Keywords",
                                ])?>
                            </div>
                            <textarea name="page_deck" id="" class="textarea_style w100"><?=$second["page_deck"] ?></textarea>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="wrap_input">
                            <div class="title_input grey_font">
                                <?=language(Yii::$app->language,[
                                    "az"=>"Səhifə təsviri",
                                    "ru"=>"Описание страницы",
                                    "en"=>"Page Description",
                                ])?>

                            </div>
                            <textarea name="keyswords" id="" class="textarea_style w100 h200"><?=$second["keyswords"] ?></textarea>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap__bottom__tabs__content">
            <div class="row">
                <div class="col-md-12 tar col-middle">
                    <button type="submit" class="btn_light_green btn_save">
                        <?=language(Yii::$app->language,[
                            "az"=>"Yadda saxla",
                            "ru"=>"Сохранить",
                            "en"=>"Save",
                        ])?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

    <?php $form = ActiveForm::begin([ 'id' => 'galery-form','options' => [
        'enctype' => 'multipart/form-data',
    ]]); ?>
    <input type="hidden" name="menu_id" value="<?=$_GET["id"] ?>">

    <?php

    if(isset($three["language_id"]))
    {
        echo '<input type="hidden" name="type" value="update_content">';
        echo '<input type="hidden" name="id" value="'.$three["id"].'">';
    }
    else
    {
        echo '<input type="hidden" name="type" value="insert_content">';
    }
    ?>

    <input type="hidden" name="language_id" value="1">
    <div class="tabs__content">
        <div class="wrap_toggle">
            <div class="toggle_title">
                <?=language(Yii::$app->language,[
                    "az"=>"Səhifə məzmunu",
                    "ru"=>"Содержание страницы",
                    "en"=>"Page content",
                ])?>



            </div>
            <div class="wrap__tabs__content wrap__tabs__content__company">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-5 left_form__company">
                            <label for="" class="wrap_input">
                                <div class="title_input">
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Adı",
                                        "ru"=>"Название",
                                        "en"=>"Name",
                                    ])?>

                                </div>
                                <div class="wrap_count">
                                    <div class="input_count">
															<span class="count_text">
																0
															</span>
                                        /
                                        <span class="fixed_count">
																60
															</span>
                                    </div>
                                    <input type="text" name="name" value="<?= $three["name"] ?>" maxlength="60" class="input_style w100 count_output">






                                </div>
                            </label>
                            <label for="" class="wrap_input">
                                <div class="title_input">
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Url alias",
                                        "ru"=>"Url alias",
                                        "en"=>"Url alias",
                                    ])?>

                                </div>
                                <div class="wrap_count">
                                    <div class="input_count">
															<span class="count_text">
																0
															</span>
                                        /
                                        <span class="fixed_count">
																60
															</span>
                                    </div>
                                    <input type="text"  name="url_alias" value="<?= $three["url_alias"] ?>"  maxlength="60" class="input_style w100 count_output">
                                </div>
                            </label>
                            <label for="" class="wrap_input">
                                <div class="title_input grey_font">
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Xülasə",
                                        "ru"=>"Сводка",
                                        "en"=>"Summary",
                                    ])?>

                                </div>
                                <textarea name="summary"  id="summary" class="textarea_style w100"><?= $three["summary"] ?></textarea>




                            </label>
                        </div>
                        <div class="col-md-7 right_form__company">
                            <div class="title_input grey_font">
                                <?=language(Yii::$app->language,[
                                    "az"=>"Xüsusi şəkillər",
                                    "ru"=>"Популярные изображения",
                                    "en"=>"Featured Image",
                                ])?>

                            </div>
                            <div class="img_block__company_wrap">

                                <?php if($three["photo_url"] != "" && $three["photo_url"] !=null){ ?>
                                <img width="200" height="100%" src="<?=Yii::$app->homeUrl?>images/<?=$three["photo_url"] ?>">
                               <?php } ?>

                                <label class="btn_common_styles btn_gray btn_delete">
                                    <span class="icon__delete"></span>
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Silin",
                                        "ru"=>"Изображение",
                                        "en"=>"Image",
                                    ])?> <input type="file"  name="photo_url"  style="display: none;">
                                </label>

                            </div>
                        </div>
                        <div class="col-xs-12">
                            <label for="" class="wrap_input mt17">
                                <div class="title_input grey_font">
                                    <?=language(Yii::$app->language,[
                                        "az"=>"Bədən",
                                        "ru"=>"основная часть",
                                        "en"=>"Body",
                                    ])?>

                                </div>
                                <textarea name="body" id="body3" style="color: black;" class="textarea_style editor_style"><?= $three["body"] ?></textarea>

                                <?php
                                $urls = Url::to(['img/image-upload']);
                                $urlss = Url::to(['/img/images-get']);
                                echo \vova07\imperavi\Widget::widget([
                                    'selector' => '#body3',
                                    'settings' => [
                                        'lang' => 'ru',
                                        'minHeight' => 200,
                                        'imageUpload' => "$urls",
                                        'imageManagerJson' => "$urlss" ,
                                        'plugins' => [

                                            'imagemanager',
                                            'table',
                                            'fontcolor',
                                            'fontsize',
                                            'fontfamily',
                                            'video',



                                        ]
                                    ]
                                ]);
                                ?>


                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="wrap_toggle">
            <div class="toggle_title">
                <?=language(Yii::$app->language,[
                    "az"=>"SEO Ayarları",
                    "ru"=>"Настройки SEO",
                    "en"=>"SEO Settings",
                ])?>

            </div>
            <div class="wrap__tabs__content wrap__tabs__content__company__bottom">
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="wrap_input">
                            <div class="title_input">
                                <?=language(Yii::$app->language,[
                                    "az"=>"Səhifə Başlığı",
                                    "ru"=>"Заголовок страницы",
                                    "en"=>"Page Title",
                                ])?>

                            </div>
                            <div class="wrap_count">
                                <div class="input_count">
														<span class="count_text">
															0
														</span>
                                    /
                                    <span class="fixed_count">
															60
														</span>
                                </div>
                                <input type="text" name="page_title" value="<?= $three["page_title"] ?>" maxlength="60" class="input_style w100 count_output">
                            </div>
                        </label>
                        <label for="" class="wrap_input">
                            <div class="title_input grey_font">
                                <?=language(Yii::$app->language,[
                                    "az"=>"Açar sözlər",
                                    "ru"=>"Ключевые слова",
                                    "en"=>"Keywords",
                                ])?>
                            </div>
                            <textarea name="page_deck" id="" class="textarea_style w100"><?=$three["page_deck"] ?></textarea>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="wrap_input">
                            <div class="title_input grey_font">
                                <?=language(Yii::$app->language,[
                                    "az"=>"Səhifə təsviri",
                                    "ru"=>"Описание страницы",
                                    "en"=>"Page Description",
                                ])?>

                            </div>
                            <textarea name="keyswords" id="" class="textarea_style w100 h200"><?=$three["keyswords"] ?></textarea>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap__bottom__tabs__content">
            <div class="row">
                <div class="col-md-12 tar col-middle">
                    <button type="submit" class="btn_light_green btn_save">
                        <?=language(Yii::$app->language,[
                            "az"=>"Yadda saxla",
                            "ru"=>"Сохранить",
                            "en"=>"Save",
                        ])?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>





    <div class="tabs__content">

        <div class="wrap__tabs__content wrap__tabs__content__gallery">
            <div class="uploader tac">
                <a href="#add_image_gallery" class="btn_add btn_add__images modal-btn">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Şəkillər əlavə edin",
                        "ru"=>"Добавить изображения",
                        "en"=>"Add images",
                    ]) ?>
                </a>
            </div>
            <div class="row pdt16 pdb16">
                <div class="col-md-8">
                    <div class="search_block search_block_gallery">

                        <input type="text" name="search" v-model="search_user" v-on:change="searchgo()" placeholder=" <?=language(Yii::$app->session->get("_language"),[
                            "az"=>"Axtarış",
                            "ru"=>"Поиск",
                            "en"=>"Search",
                        ]) ?>" class="search">
                        <input type="button" v-on:click="searchgo()" class="search_submit">

                    </div>
                </div>
                <div class="col-md-4 tar">
                    <a href="#" v-on:click="deleteusers()" class="btn_common_styles btn_light_red btn_users">
                        <?=language(Yii::$app->session->get("_language"),[
                            "az"=>"Sil",
                            "ru"=>"Удалить",
                            "en"=>"Delete",
                        ]) ?>
                    </a>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4" v-for="(vl,index) in ImgGallery">
                    <div class="img_gallery__added">
                        <img :src="'<?=Yii::$app->homeUrl ?>'+'images/'+vl.img_url" :alt="vl.alt" height="150" width="100%">
                        <div class="checkbox_block">
                            <input type="checkbox" id="checkedNames" v-model="checkedNames" :value="vl.id" class="checkbox_style">
                            <span></span>
                        </div>
                    </div>
                    <div class="bottom_info_gallery__added">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="size_file">
                                    {{ vl.size }} Kb
                                </div>
                                <div class="date_file">
                                    {{ vl.inserted_at }}
                                </div>
                            </div>
                            <div class="col-md-6 tar">
                                <a href="#editx" class="modal-btn"  v-on:click="editusers(vl.img_grp_id)">
                                    <span class="icon__editing" ></span>
                                </a>

                                <a href="#"  v-on:click="deleteuser(vl.img_grp_id)">
                                    <span class="icon__delete"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="wrap__bottom__tabs__content">
            <div class="row">
                <div class="col-md-6 tal col-middle">
                    <div class="pagination_block">
                        <ul class="paginations">
                            <li class="prev__pagination" v-if="current_page > 1">
                                <a href="#"  v-on:click="changepage_prev()">
                                    <span></span>
                                </a>
                            </li>
                            <li class="active">
													<span>
														{{ current_page }}
													</span>
                            </li>

                            <li class="next__pagination" v-if="(total / per_page) >= (current_page+1)">
                                <a href="#"  v-on:click="changepage_next()">
                                    <span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 tar col-middle">
                    <div class="display_on_page">
                        <span>Display on page</span>
                        {{ changer }}
                        <select name="" id="" v-model="changer">
                            <option value="1">
                                1
                            </option>
                            <option value="2">
                                2
                            </option>
                            <option value="3">
                                3
                            </option>
                            <option value="4">
                                4
                            </option>
                            <option value="5">
                                5
                            </option>
                            <option value="6" selected>
                                6
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="tabs__content">
        <div class="wrap__tabs__content wrap__tabs__content__gallery">
            <form action="" method="post">
                <div class="left_form">
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            Sort articles
                        </div>
                        <select name="" id="">
                            <option value="" selected>By date</option>
                            <option value="">1 Day</option>
                            <option value="">2 Day</option>
                            <option value="">3 Day</option>
                            <option value="">4 Day</option>
                        </select>
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            Keyword
                        </div>
                        <input type="text" class="input_style">
                    </label>
                </div>
            </form>
        </div>
        <div class="wrap__bottom__tabs__content">
            <div class="row">
                <div class="col-md-12 tar col-middle">
                    <a href="#" class="btn_light_green btn_save">
                        Save
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="add_image_gallery" class="mfp-hide popups add_image_gallery">
    <?php $form = ActiveForm::begin([ 'id' => 'galery-form','options' => [
        'enctype' => 'multipart/form-data',
    ]]); ?>
    <input type="hidden" name="type" value="insert">
    <div class="content__popup">
        <div class="title__popup">
            <?=language(Yii::$app->session->get("_language"),[
                "az"=>"Şəkil seçimləri",
                "ru"=>"Параметры изображения",
                "en"=>"Image options",
            ]) ?>
        </div>
        <div class="img__add_image_gallery">

            <label><?=language(Yii::$app->session->get("_language"),[
                    "az"=>"Şəkil yükləyin",
                    "ru"=>"Загрузить изображение",
                    "en"=>"Upload Image",
                ]) ?></label>

            <input type="file" name="img_url" id="img_url" class="form-control">



        </div>
        <div class="tabs">
            <ul class="tabs__caption">
                <li class="active">ENGLISH</li>
                <li>RUSSIAN</li>
                <li>AZERBAIJANI</li>
            </ul>
            <div class="tabs__content active">
                <div class="wrap_tabs__content__popups">

                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Resim başlığı",
                                "ru"=>"Название изображения",
                                "en"=>"Image title",
                            ]) ?>
                        </div>
                        <div class="wrap_count">
                            <div class="input_count">
									<span class="count_text">
										0
									</span>
                                /
                                <span class="fixed_count">
										30
									</span>
                            </div>
                            <input type="text" maxlength="30" name="title[]" class="input_style count_output" required>
                        </div>
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Alt",
                                "ru"=>"Alt",
                                "en"=>"Alt",
                            ]) ?>
                        </div>
                        <input type="text" value="" name="alt[]" class="input_style" required>
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Xülasə",
                                "ru"=>"сводка",
                                "en"=>"Summary",
                            ]) ?>
                        </div>
                        <div class="wrap_count">
                            <div class="input_count">
									<span class="count_text">
										0
									</span>
                                /
                                <span class="fixed_count">
										120
									</span>
                            </div>
                            <textarea name="summary[]" id="" maxlength="120" class="textarea_style count_output"></textarea>
                        </div>
                    </label>

                </div>

            </div>
            <div class="tabs__content">
                <div class="wrap_tabs__content__popups">

                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Resim başlığı",
                                "ru"=>"Название изображения",
                                "en"=>"Image title",
                            ]) ?>
                        </div>
                        <div class="wrap_count">
                            <div class="input_count">
									<span class="count_text">
										0
									</span>
                                /
                                <span class="fixed_count">
										30
									</span>
                            </div>
                            <input type="text" maxlength="30" name="title[]" class="input_style count_output" required>
                        </div>
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Alt",
                                "ru"=>"Alt",
                                "en"=>"Alt",
                            ]) ?>
                        </div>
                        <input type="text" value="" name="alt[]" class="input_style" required>
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Xülasə",
                                "ru"=>"сводка",
                                "en"=>"Summary",
                            ]) ?>
                        </div>
                        <div class="wrap_count">
                            <div class="input_count">
									<span class="count_text">
										0
									</span>
                                /
                                <span class="fixed_count">
										120
									</span>
                            </div>
                            <textarea name="summary[]" id="" maxlength="120" class="textarea_style count_output"></textarea>
                        </div>
                    </label>

                </div>

            </div>
            <div class="tabs__content">
                <div class="wrap_tabs__content__popups">

                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Resim başlığı",
                                "ru"=>"Название изображения",
                                "en"=>"Image title",
                            ]) ?>
                        </div>
                        <div class="wrap_count">
                            <div class="input_count">
									<span class="count_text">
										0
									</span>
                                /
                                <span class="fixed_count">
										30
									</span>
                            </div>
                            <input type="text" maxlength="30" name="title[]" class="input_style count_output" required>
                        </div>
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Alt",
                                "ru"=>"Alt",
                                "en"=>"Alt",
                            ]) ?>
                        </div>
                        <input type="text" value="" name="alt[]" class="input_style" required>
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Xülasə",
                                "ru"=>"сводка",
                                "en"=>"Summary",
                            ]) ?>
                        </div>
                        <div class="wrap_count">
                            <div class="input_count">
									<span class="count_text">
										0
									</span>
                                /
                                <span class="fixed_count">
										120
									</span>
                            </div>
                            <textarea name="summary[]" id="" maxlength="120" class="textarea_style count_output"></textarea>
                        </div>
                    </label>

                </div>

            </div>

            <label for="" class="wrap_input tar">
                <button type="submit" class="btn_white btn_cancel">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Ləğv et",
                        "ru"=>"Отмена",
                        "en"=>"Cancel",
                    ]) ?>
                </button>
                <button type="submit" class="btn_light_green btn_save">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Yadda saxla",
                        "ru"=>"Сохранить",
                        "en"=>"Save",
                    ]) ?>
                </button>
            </label>


        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div id="editx" class="mfp-hide popups openedit add_image_gallery">
    <?php $form = ActiveForm::begin([ 'id' => 'galery-form','options' => [
        'enctype' => 'multipart/form-data',
    ]]); ?>
    <input type="hidden" name="type" value="update">
    <input type="hidden" name="img_grp_id" id="img_grp_id" value="">
    <div class="content__popup">
        <div class="title__popup">
            <?=language(Yii::$app->session->get("_language"),[
                "az"=>"Şəkil seçimləri",
                "ru"=>"Параметры изображения",
                "en"=>"Image options",
            ]) ?>
        </div>
        <div class="img__add_image_gallery">

            <label><?=language(Yii::$app->session->get("_language"),[
                    "az"=>"Şəkil yükləyin",
                    "ru"=>"Загрузить изображение",
                    "en"=>"Upload Image",
                ]) ?></label>

            <input type="file" name="img_url" id="img_url" class="form-control">



        </div>
        <div class="tabs" id="apps">
            <ul class="tabs__caption">
                <li class="active">ENGLISH</li>
                <li>RUSSIAN</li>
                <li>AZERBAIJANI</li>
            </ul>
            <div  class="tabs__content"  v-for="(vl,index) in imgg">

                <div class="wrap_tabs__content__popups">

                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Resim başlığı",
                                "ru"=>"Название изображения",
                                "en"=>"Image title",
                            ]) ?>
                        </div>
                        <div class="wrap_count">
                            <div class="input_count">
									<span class="count_text">
										0
									</span>
                                /
                                <span class="fixed_count">
										30
									</span>
                            </div>
                            <input type="text" maxlength="30" name="title[]" :value="vl.image_title" class="input_style count_output" required>
                        </div>
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Alt",
                                "ru"=>"Alt",
                                "en"=>"Alt",
                            ]) ?>
                        </div>
                        <input type="text" value="" name="alt[]" :value="vl.alt" class="input_style" required>
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Xülasə",
                                "ru"=>"сводка",
                                "en"=>"Summary",
                            ]) ?>
                        </div>
                        <div class="wrap_count">
                            <div class="input_count">
									<span class="count_text">
										0
									</span>
                                /
                                <span class="fixed_count">
										120
									</span>
                            </div>
                            <textarea name="summary[]" :value="vl.summary" id="" maxlength="120" class="textarea_style count_output"></textarea>
                        </div>
                    </label>

                </div>

            </div>


            <label for="" class="wrap_input tar">
                <button type="button" class="btn_white btn_cancel">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Ləğv et",
                        "ru"=>"Отмена",
                        "en"=>"Cancel",
                    ]) ?>
                </button>
                <button type="submit" class="btn_light_green btn_save">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Yadda saxla",
                        "ru"=>"Сохранить",
                        "en"=>"Save",
                    ]) ?>
                </button>
            </label>


        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>


    function openPopup(el) { // get the class name in arguments here
        $.magnificPopup.open({
            items: {
                src: '#editx',
            },
            type: 'inline'
        });
    }
    function opengallery(el) { // get the class name in arguments here
        console.log("sss");
        $.magnificPopup.open({
            items: {
                src: '#gallery_img',
            },
            type: 'inline'
        });
    }
    var curlang = '<?=$_SESSION["lang"] ?>';
    var baseurl ='<?= Yii::$app->homeUrl ?>'+curlang+'/api/';
    var tokens ='<?= Yii::$app->request->csrfToken; ?>';

    var cmmm = new Vue({
        el:'#apps',
        data:{
            imgg:[] ,
            img_grp_id:0
        },
        methods:function () {


        }
    });

    var gallery = new Vue({
        el:'#appw',
        data:{
            imgg:[] ,

            per_page:6,
            current_page:1,
            next_page:1,
            prev_page:1,
            total:0,
            selectradio:'',
            search_user:''
        },
        created:function () {
            this.fetchdate();
        },
        methods: {

            fetchdate:function () {
                _this = this;

                axios.get(baseurl+'imggallery?per_page='+this.per_page+'&search='+this.search_user+'&current_page='+this.current_page)
                    .then(function (response) {


                        _this.imgg = response.data.ImgGallery;
                        _this.total = response.data.total;
                        _this.next_page = response.data.next_page;
                        _this.prev_page = response.data.prev_page;







                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            }


        }
    });
    var cm = new Vue({
        el:'#app',
        data:{
            ImgGallery: [],
            per_page:6,
            current_page:1,
            next_page:1,
            prev_page:1,
            total:0,
            changer:'',
            selected_img:'',

            article:[],

            xper_page:2,
            xcurrent_page:1,
            xnext_page:1,
            xprev_page:1,
            xtotal:0,


            xsearch_user:'',
            search_user:'',
            checkedNames:[],
            chch:[]



        },
        created:function () {

            this.fetchusers();
            this.fetcharticle();

        },

        methods:{
            deleteuser:function (id) {
                var _this = this;
                var message =  '<?=language(Yii::$app->session->get("_language"),["az"=>"Bu görüntüyü silməyinizə əminsinizmi?","ru"=>"Вы действительно хотите удалить это изображение?","en"=>"Are you sure to delete this image?",]) ?>'
                if(confirm(message)) {


                    var formData = new FormData();
                    formData.append('id', id);
                    formData.append('type', 'imgdelete');
                    formData.append('_csrf', tokens);

                    $.ajax({
                        type: "POST",
                        url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/news')  ; ?>",
                        data: {
                            'id':id,
                            'type':'imgdelete'
                        },
                        success: function (test) {
                            _this.fetchusers();
                        },
                        error: function (exception) {
                            console.log(exception);
                        }
                    });




                }

            },
            deleteusers:function () {
                var _this = this;
                var message =  '<?=language(Yii::$app->session->get("_language"),["az"=>"Bu görüntüyü silməyinizə əminsinizmi?","ru"=>"Вы действительно хотите удалить это изображение?","en"=>"Are you sure to delete this image?",]) ?>'
                if(confirm(message)) {


                    var formData = new FormData();
                    formData.append('id', JSON.stringify(_this.checkedNames));
                    formData.append('type', 'alldelete');
                    formData.append('_csrf', tokens);

                    $.ajax({
                        type: "POST",
                        url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/news')  ; ?>",
                        data: {
                            'id':JSON.stringify(_this.checkedNames),
                            'type':'alldelete'
                        },
                        success: function (test) {
                            _this.fetchusers();
                        },
                        error: function (exception) {
                            console.log(exception);
                        }
                    });




                }

            },

            deletearticle:function (id) {
                var _this = this;
                var message =  '<?=language(Yii::$app->session->get("_language"),["az"=>"Bu görüntüyü silməyinizə?","ru"=>"Вы действительно хотите удалить это?","en"=>"Are you sure to delete this?",]) ?>';
                if(confirm(message)) {



                    $.ajax({
                        type: "POST",
                        url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/news')  ; ?>",
                        data: {
                            'id':id,
                            'type':'articledelete'
                        },
                        success: function (test) {
                            _this.fetcharticle();
                        },
                        error: function (exception) {
                            console.log(exception);
                        }
                    });




                }

            },
            changestatsme:function (status) {
                var _this = this;
                var message =  '<?=language(Yii::$app->session->get("_language"),["az"=>"Bunu dəyişdirməyinizə əminsinizmi?","ru"=>"Вы обязательно измените это?","en"=>"Are you sure to change this?",]) ?>';
                if(confirm(message)) {



                    $.ajax({
                        type: "POST",
                        url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/news')  ; ?>",
                        data: {
                            'id':JSON.stringify(_this.chch),
                            'status':status,
                            'type':'articlestatus'
                        },
                        success: function (test) {
                            _this.fetcharticle();
                        },
                        error: function (exception) {
                            console.log(exception);
                        }
                    });




                }

            },
            deletearticlearray:function () {
                var _this = this;
                var message =  '<?=language(Yii::$app->session->get("_language"),["az"=>"Bu görüntüyü silməyinizə?","ru"=>"Вы действительно хотите удалить это?","en"=>"Are you sure to delete this?",]) ?>';
                if(confirm(message)) {




                    $.ajax({
                        type: "POST",
                        url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/news')  ; ?>",
                        data: {
                            'id':JSON.stringify(_this.chch),
                            'type':'articlealldelete'
                        },
                        success: function (test) {
                            _this.fetcharticle();

                            console.log(test);
                        },
                        error: function (exception) {
                            console.log(exception);
                        }
                    });




                }

            },


            fetchusers:function () {

                var _this = this;
                // console.log(baseurl+'users?per_page='+this.per_page+'&search='+this.search_user+'&current_page='+this.current_page);
                axios.get(baseurl+'imggallery?per_page='+this.per_page+'&search='+this.search_user+'&current_page='+this.current_page)
                    .then(function (response) {


                        _this.ImgGallery = response.data.ImgGallery;
                        _this.total = response.data.total;
                        _this.next_page = response.data.next_page;
                        _this.prev_page = response.data.prev_page;





                    })
                    .catch(function (error) {
                        console.log(error);
                    });


            },
            fetcharticle:function () {

                var _this = this;
                // console.log(baseurl+'users?per_page='+this.per_page+'&search='+this.search_user+'&current_page='+this.current_page);
                axios.get(baseurl+'article?per_page='+_this.xper_page+'&search='+_this.xsearch_user+'&current_page='+_this.xcurrent_page)
                    .then(function (response) {


                        _this.article = response.data.Article;
                        _this.xtotal = response.data.total;
                        _this.xnext_page = response.data.next_page;
                        _this.xprev_page = response.data.prev_page;





                    })
                    .catch(function (error) {
                        console.log(error);
                    });


            },
            galleryshow:function()
            {

                gallery.fetchdate();

                opengallery("opengallery");
            },
            editusers:function (id) {

                console.log(id);

                var _this = this;
                axios.get(baseurl+'imggalleryupdate?id='+id)
                    .then(function (response) {


                        cmmm.imgg = response.data;

                        document.getElementById("img_grp_id").value = id;

                        openPopup("openedit");




                    })
                    .catch(function (error) {
                        console.log(error);
                    });




            },

            searchgo:function()
            {
                this.fetchusers();
            },

            gosearcharticle:function()
            {
                this.fetcharticle();
            },
            xchangepage_prev:function () {
                var _this= this;
                if(_this.xprev_page!=null)
                {
                    _this.xcurrent_page = _this.xprev_page;
                    _this.fetcharticle();
                }

            },
            xchangepage_next:function () {
                var _this= this;
                if(_this.xnext_page!=null) {
                    _this.xcurrent_page = _this.xnext_page;
                    _this.fetcharticle();
                }
            },

            changepage_prev:function () {
                var _this= this;
                if(this.prev_page!=null)
                {
                    _this.current_page = _this.prev_page;
                    this.fetchusers();
                }

            },
            changepage_next:function () {
                var _this= this;
                if(this.next_page!=null) {
                    _this.current_page = _this.next_page;
                    _this.fetchusers();
                }
            },
            changeprepage:function()
            {

                console.log("ichanget");
                this.fetchusers();
            },
            changestatus:function (str) {

                if(str ==3)
                {
                    if(confirm("Are you sure to delete this user?"))
                    {
                        var formData = new FormData();
                        formData.append('users_id', this.checkedNames);
                        formData.append('user_stats', str);
                        formData.append('_csrf', tokens);


                        axios.post(baseurl+'usersstats', formData).then(function (response) {


                        }).catch(function (error) {
                            console.log(error);
                        });

                        this.fetchusers();
                    }
                }
                else
                {
                    var formData = new FormData();
                    formData.append('users_id', this.checkedNames);
                    formData.append('user_stats', str);
                    formData.append('_csrf', tokens);


                    axios.post(baseurl+'usersstats', formData).then(function (response) {


                    }).catch(function (error) {
                        console.log(error);
                    });

                    this.fetchusers();
                }





            }



        }

    });
</script>