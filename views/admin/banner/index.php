<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="title_page title_page__settings">
    <h2>
        Banners
    </h2>
    <a href="#add_image_gallery" class="btn_add  modal-btn">
        Add                </a>
</div>
<div class="tabs" id="app">
    <ul class="tabs__caption">
        <li class="active">FRONT SLIDER</li>
        <li>FRONT RIGHT</li>
        <li>FRONT LEFT</li>
        <li>INNER BOTTOM</li>
    </ul>

    <div class="tabs__content active">
        <div class="wrap__tabs__content wrap__tabs__content__users">
            <div class="row">
                <div class="col-md-6">
                    <div class="search_block">

                            <input type="text" name="search" v-model="search_one" v-on:change="searchgoone()" placeholder="<?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Axtarış",
                                "ru"=>"Поиск",
                                "en"=>"Search",
                            ]) ?>" class="search">
                            <input type="button" v-on:click="searchgoone()" class="search_submit">

                    </div>
                </div>
                <div class="col-md-6 tar">
                    <a href="#" v-on:click="changestatsme(1)" class="btn_common_styles btn_gray btn_users">
                        Show
                    </a>
                    <a href="#"  v-on:click="changestatsme(2)" class="btn_common_styles btn_gray btn_users">
                        Hide
                    </a>
                    <a href="#" v-on:click="bannersdelete" class="btn_common_styles btn_light_red btn_users">
                        Delete
                    </a>
                </div>
            </div>
            <table class="table__banners" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th>
                        Image
                    </th>
                    <th>
                        TITLE
                    </th>
                    <th>
                        Translations
                    </th>
                    <th>
                        ADDED
                    </th>
                    <th>
                        STATUS
                    </th>
                    <th></th>
                </tr>
                <tr v-for="(vl,index) in banner" v-if="vl.banner_category_id == 1">
                    <td>
                        <div class="checkbox_block">
                            <input type="checkbox" v-model="checkone" :value="vl.banner_group_id"  class="checkbox_style">
                            <span></span>
                        </div>
                        <div class="img_block_table">
                            <img :src="'<?=Yii::$app->homeUrl ?>'+'images/'+vl.img_group" alt="">
                        </div>
                    </td>
                    <td>
                        {{ vl.banner_title }}
                    </td>
                    <td>
                        <span class="tick" v-if="vl.en==1">En</span>
                        <span class="tick_empty" v-if="vl.en==0">En</span>

                        <span class="tick" v-if="vl.az==1">Az</span>
                        <span class="tick_empty" v-if="vl.az==0">Az</span>

                        <span class="tick" v-if="vl.az==1">Ru</span>
                        <span class="tick_empty" v-if="vl.az==0">Ru</span>
                    </td>
                    <td>
                        {{  vl.created_at }}
                    </td>
                    <td v-if="vl.status_id == 2">
                        Hidden
                    </td>
                    <td v-if="vl.status_id == 1">
                        Active
                    </td>
                    <td>
                        <a href="#">
                            <span class="icon__editing" v-on:click="editusers(vl.banner_group_id)"></span>
                        </a>
                        <a href="#" v-on:click="deletebanner(vl.banner_group_id)">
                            <span class="icon__delete"></span>
                        </a>
                    </td>
                </tr>
            </table>
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
                        <select name="" id="">
                            <option value="">
                                1
                            </option>
                            <option value="">
                                2
                            </option>
                            <option value="">
                                3
                            </option>
                            <option value="">
                                4
                            </option>
                            <option value="" selected>
                                5
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tabs__content">
        <div class="wrap__tabs__content wrap__tabs__content__users">
            <div class="row">
                <div class="col-md-6">
                    <div class="search_block">
                        <input type="text" name="search" v-model="search_two" v-on:change="searchgotwo()" placeholder="<?=language(Yii::$app->session->get("_language"),[
                            "az"=>"Axtarış",
                            "ru"=>"Поиск",
                            "en"=>"Search",
                        ]) ?>" class="search">
                        <input type="button" v-on:click="searchgotwo()" class="search_submit">
                    </div>
                </div>
                <div class="col-md-6 tar">
                    <a href="#"  v-on:click="changestatsme(1)" class="btn_common_styles btn_gray btn_users">
                        Show
                    </a>
                    <a href="#"  v-on:click="changestatsme(2)" class="btn_common_styles btn_gray btn_users">
                        Hide
                    </a>
                    <a href="#" v-on:click="bannersdelete" class="btn_common_styles btn_light_red btn_users">
                        Delete
                    </a>
                </div>
            </div>
            <table class="table__banners" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th>
                        Image
                    </th>
                    <th>
                        TITLE
                    </th>
                    <th>
                        Translations
                    </th>
                    <th>
                        ADDED
                    </th>
                    <th>
                        STATUS
                    </th>
                    <th></th>
                </tr>
                <tr v-for="(vl,index) in banner" v-if="vl.banner_category_id == 2">
                    <td>
                        <div class="checkbox_block">
                            <input type="checkbox" v-model="checkone" :value="vl.banner_group_id" class="checkbox_style">
                            <span></span>
                        </div>
                        <div class="img_block_table">
                            <img :src="'<?=Yii::$app->homeUrl ?>'+'images/'+vl.img_group" alt="">
                        </div>
                    </td>
                    <td>
                        {{ vl.banner_title }}
                    </td>
                    <td>
                        <span class="tick" v-if="vl.en==1">En</span>
                        <span class="tick_empty" v-if="vl.en==0">En</span>

                        <span class="tick" v-if="vl.az==1">Az</span>
                        <span class="tick_empty" v-if="vl.az==0">Az</span>

                        <span class="tick" v-if="vl.az==1">Ru</span>
                        <span class="tick_empty" v-if="vl.az==0">Ru</span>
                    </td>
                    <td>
                        {{  vl.created_at }}
                    </td>
                    <td v-if="vl.status_id == 2">
                        Hidden
                    </td>
                    <td v-if="vl.status_id == 1">
                        Active
                    </td>
                    <td>
                        <a href="#">
                            <span class="icon__editing"></span>
                        </a>
                        <a href="#">
                            <span class="icon__delete" v-on:click="deletebanner(vl.banner_group_id)"></span>
                        </a>
                    </td>
                </tr>

            </table>
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
                        <select name="" id="">
                            <option value="">
                                1
                            </option>
                            <option value="">
                                2
                            </option>
                            <option value="">
                                3
                            </option>
                            <option value="">
                                4
                            </option>
                            <option value="" selected>
                                5
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tabs__content">
        <div class="wrap__tabs__content wrap__tabs__content__users">
            <div class="row">
                <div class="col-md-6">
                    <div class="search_block">
                        <input type="text" name="search" v-model="search_three" v-on:change="searchgothree()" placeholder="<?=language(Yii::$app->session->get("_language"),[
                            "az"=>"Axtarış",
                            "ru"=>"Поиск",
                            "en"=>"Search",
                        ]) ?>" class="search">
                        <input type="button" v-on:click="searchgothree()" class="search_submit">
                    </div>
                </div>
                <div class="col-md-6 tar">
                    <a href="#"  v-on:click="changestatsme(1)" class="btn_common_styles btn_gray btn_users">
                        Show
                    </a>
                    <a href="#"  v-on:click="changestatsme(2)" class="btn_common_styles btn_gray btn_users">
                        Hide
                    </a>
                    <a href="#" v-on:click="bannersdelete" class="btn_common_styles btn_light_red btn_users">
                        Delete
                    </a>
                </div>
            </div>
            <table class="table__banners" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th>
                        Image
                    </th>
                    <th>
                        TITLE
                    </th>
                    <th>
                        Translations
                    </th>
                    <th>
                        ADDED
                    </th>
                    <th>
                        STATUS
                    </th>
                    <th></th>
                </tr>
                <tr v-for="(vl,index) in banner" v-if="vl.banner_category_id == 3">
                    <td>
                        <div class="checkbox_block">
                            <input type="checkbox" v-model="checkone"  :value="vl.banner_group_id"  class="checkbox_style">
                            <span></span>
                        </div>
                        <div class="img_block_table">
                            <img :src="'<?=Yii::$app->homeUrl ?>'+'images/'+vl.img_group" alt="">
                        </div>
                    </td>
                    <td>
                        {{ vl.banner_title }}
                    </td>
                    <td>
                        <span class="tick" v-if="vl.en==1">En</span>
                        <span class="tick_empty" v-if="vl.en==0">En</span>

                        <span class="tick" v-if="vl.az==1">Az</span>
                        <span class="tick_empty" v-if="vl.az==0">Az</span>

                        <span class="tick" v-if="vl.az==1">Ru</span>
                        <span class="tick_empty" v-if="vl.az==0">Ru</span>
                    </td>
                    <td>
                        {{  vl.created_at }}
                    </td>
                    <td v-if="vl.status_id == 2">
                        Hidden
                    </td>
                    <td v-if="vl.status_id == 1">
                        Active
                    </td>
                    <td>
                        <a href="#">
                            <span class="icon__editing" v-on:click="editusers(vl.banner_group_id)"></span>
                        </a>
                        <a href="#" v-on:click="deletebanner(vl.banner_group_id)">
                            <span class="icon__delete" ></span>
                        </a>
                    </td>
                </tr>
            </table>
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
                        <select name="" id="">
                            <option value="">
                                1
                            </option>
                            <option value="">
                                2
                            </option>
                            <option value="">
                                3
                            </option>
                            <option value="">
                                4
                            </option>
                            <option value="" selected>
                                5
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tabs__content">
        <div class="wrap__tabs__content wrap__tabs__content__users">
            <div class="row">
                <div class="col-md-6">
                    <div class="search_block">
                        <input type="text" name="search" v-model="search_four" v-on:change="searchgofour()" placeholder="<?=language(Yii::$app->session->get("_language"),[
                            "az"=>"Axtarış",
                            "ru"=>"Поиск",
                            "en"=>"Search",
                        ]) ?>" class="search">
                        <input type="button" v-on:click="searchgofour()" class="search_submit">
                    </div>
                </div>
                <div class="col-md-6 tar">
                    <a href="#"  v-on:click="changestatsme(1)" class="btn_common_styles btn_gray btn_users">
                        Show
                    </a>
                    <a href="#"  v-on:click="changestatsme(2)" class="btn_common_styles btn_gray btn_users">
                        Hide
                    </a>
                    <a href="#" v-on:click="bannersdelete" class="btn_common_styles btn_light_red btn_users">
                        Delete
                    </a>
                </div>
            </div>
            <table class="table__banners" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th>
                        Image
                    </th>
                    <th>
                        TITLE
                    </th>
                    <th>
                        Translations
                    </th>
                    <th>
                        ADDED
                    </th>
                    <th>
                        STATUS
                    </th>
                    <th></th>
                </tr>
                <tr v-for="(vl,index) in banner" v-if="vl.banner_category_id == 4">
                    <td>
                        <div class="checkbox_block">
                            <input type="checkbox" v-model="checkone" :value="vl.banner_group_id" class="checkbox_style">
                            <span></span>
                        </div>
                        <div class="img_block_table">
                            <img :src="'<?=Yii::$app->homeUrl ?>'+'images/'+vl.img_group" alt="">
                        </div>
                    </td>
                    <td>
                        {{ vl.banner_title }}
                    </td>
                    <td>
                        <span class="tick" v-if="vl.en==1">En</span>
                        <span class="tick_empty" v-if="vl.en==0">En</span>

                        <span class="tick" v-if="vl.az==1">Az</span>
                        <span class="tick_empty" v-if="vl.az==0">Az</span>

                        <span class="tick" v-if="vl.az==1">Ru</span>
                        <span class="tick_empty" v-if="vl.az==0">Ru</span>
                    </td>
                    <td>
                        {{  vl.created_at }}
                    </td>
                    <td v-if="vl.status_id == 2">
                        Hidden
                    </td>
                    <td v-if="vl.status_id == 1">
                        Active
                    </td>
                    <td>
                        <a href="#" v-on:click="editusers(vl.banner_group_id)">
                            <span class="icon__editing"></span>
                        </a>
                        <a href="#" v-on:click="deletebanner(vl.banner_group_id)">
                            <span class="icon__delete"></span>
                        </a>
                    </td>
                </tr>
            </table>
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
                        <span><?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Səhifədə göstərin",
                                "ru"=>"Показать на странице",
                                "en"=>"Display on page",
                            ]) ?></span>
                        <select name="" id="">
                            <option value="">
                                1
                            </option>
                            <option value="">
                                2
                            </option>
                            <option value="">
                                3
                            </option>
                            <option value="">
                                4
                            </option>
                            <option value="" selected>
                                5
                            </option>
                        </select>
                    </div>
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

            <div class="form-group">
            <label><?=language(Yii::$app->session->get("_language"),[
                    "az"=>"Şəkil yükləyin",
                    "ru"=>"Загрузить изображение",
                    "en"=>"Upload Image",
                ]) ?></label>

            <input type="file" name="img_group" id="img_group" class="form-control">
            </div>

                <div class="form-group">
                    <select class="form-control" name="banner_category_id">

                        <?php

                        foreach ($category as $vl)
                        {
                            echo ' <option value="'.$vl->id.'">'.$vl->position_name.'</option>';
                        }

                        ?>

                    </select>
                </div>
        </div>
        <div class="tabs">
            <ul class="tabs__caption">
                <li class="active">ENGLISH</li>
                <li>RUSSIAN</li>
                <li>AZERBAIJANI</li>
            </ul>
            <div class="tabs__content active">
                <div class="wrap_tabs__content__popups">
<input type="hidden" value="3" name="language_id[]" autofocus>
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
                                "az"=>"Təsviri",
                                "ru"=>"Описание",
                                "en"=>"Description",
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
                            <textarea name="description[]" id="" maxlength="120" class="textarea_style count_output"></textarea>
                        </div>
                    </label>

                </div>

            </div>
            <div class="tabs__content">
                <div class="wrap_tabs__content__popups">
                    <input type="hidden" value="2" name="language_id[]">
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
                                "az"=>"Təsviri",
                                "ru"=>"Описание",
                                "en"=>"Description",
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
                            <textarea name="description[]" id="" maxlength="120" class="textarea_style count_output"></textarea>
                        </div>
                    </label>

                </div>

            </div>
            <div class="tabs__content">
                <div class="wrap_tabs__content__popups">
                    <input type="hidden" value="1" name="language_id[]">
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
                                "az"=>"Təsviri",
                                "ru"=>"Описание",
                                "en"=>"Description",
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
                            <textarea name="description[]" id="" maxlength="120" class="textarea_style count_output"></textarea>
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
<div id="editx"  class="mfp-hide popups openedit add_image_gallery">
    <?php $form = ActiveForm::begin([ 'id' => 'galery-form','options' => [
        'enctype' => 'multipart/form-data',
    ]]); ?>
    <input type="hidden" name="type" value="update">
    <div class="content__popup" id="apes">
        <div class="title__popup">
            <?=language(Yii::$app->session->get("_language"),[
                "az"=>"Şəkil seçimləri",
                "ru"=>"Параметры изображения",
                "en"=>"Image options",
            ]) ?>
        </div>
        <div class="img__add_image_gallery">

            <div class="form-group">
            <label><?=language(Yii::$app->session->get("_language"),[
                    "az"=>"Şəkil yükləyin",
                    "ru"=>"Загрузить изображение",
                    "en"=>"Upload Image",
                ]) ?></label>

            <input type="file" name="img_group" id="img_group" class="form-control">
            </div>

                <div class="form-group">
                    <select class="form-control" name="banner_category_id">

                        <?php

                        foreach ($category as $vl)
                        {
                            echo ' <option value="'.$vl->id.'">'.$vl->position_name.'</option>';
                        }

                        ?>

                    </select>
                </div>
        </div>
        <div class="tabs">
            <ul class="tabs__caption">
                <li class="active">ENGLISH</li>
                <li>RUSSIAN</li>
                <li>AZERBAIJANI</li>
            </ul>
            <div v-bind:class="myclass(index)"   v-for="(vl,index) in banedit">
                <div class="wrap_tabs__content__popups">
                    <input type="hidden" :value="vl.language_id" name="language_id[]">
                    <input type="hidden" :value="vl.banner_group_id" name="banner_group_id">
                    <input type="hidden" :value="vl.id" name="id[]">
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
                            <input type="text" maxlength="30" name="title[]" :value="vl.banner_title" class="input_style count_output" required>
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
                        <input type="text" value="" name="alt[]" :value="vl.banner_alt" class="input_style" required>
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Təsviri",
                                "ru"=>"Описание",
                                "en"=>"Description",
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
                            <textarea name="description[]"  id="" maxlength="120" class="textarea_style count_output">{{ vl.banner_deck }}</textarea>
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


<script>
    var curlang = '<?=Yii::$app->language ?>';
    var baseurl ='<?= Yii::$app->homeUrl ?>'+curlang+'/api/';
    var baseurlx ='<?= Yii::$app->homeUrl ?>';
    var tokens ='<?= Yii::$app->request->csrfToken; ?>';
    function openPopup(el) {
        $.magnificPopup.open({
            items: {
                src: '#editx',
            },
            type: 'inline'
        });
    }

    var edm = new Vue({
        el:'#apes',
        data:{
            banedit:[],

        },
        created:function () {

        },
        methods:{

            myclass:function (index) {

                if(index==0)
                {
                    return 'tabs__content active';
                }
                else
                {
                    return 'tabs__content';
                }

            }

        }

    });

    var cm = new Vue({
        el: '#app',
        data: {
            selectedtab: 1,
            banner:[],
            checkone:[],
            banedit:[],




            labels: '',

            data: [],
            per_page: 5,
            per_pages: '',
            current_page: 1,
            next_page: 1,
            prev_page: 1,
            total: 0,

            search_user: '',
            search_one: '',
            search_two: '',
            search_three: '',
            search_four: '',
            pagenater:null



        },
        created:function () {
            this.fetchdate();
        },

        methods:{
            editusers:function (id) {



                var _this = this;
                axios.get(baseurl+'bannerone?id='+id)
                    .then(function (response) {


                        edm.banedit = response.data;

                     //   document.getElementById("img_grp_id").value = id;

                        openPopup("openedit");




                    })
                    .catch(function (error) {
                        console.log(error);
                    });




            },
            deletebanner:function (id) {
                var _this = this;
                var message =  '<?=language(Yii::$app->session->get("_language"),["az"=>"Bu görüntüyü silməyinizə əminsinizmi?","ru"=>"Вы действительно хотите удалить это изображение?","en"=>"Are you sure to delete this image?",]) ?>'
                if(confirm(message)) {


                    var formData = new FormData();
                    formData.append('id', id);
                    formData.append('type', 'bannerdelete');
                    formData.append('_csrf', tokens);

                    $.ajax({
                        type: "POST",
                        url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/banner')  ; ?>",
                        data: {
                            'id':id,
                            'type':'bannerdelete'
                        },
                        success: function (test) {
                            _this.fetchdate();
                        },
                        error: function (exception) {
                            console.log(exception);
                        }
                    });




                }

            },
            bannersdelete:function () {
                var _this = this;


                var message =  '<?=language(Yii::$app->session->get("_language"),["az"=>"Bu görüntüyü silməyinizə ?","ru"=>"Вы действительно хотите удалить это ?","en"=>"Are you sure to delete this ?",]) ?>'
                if(confirm(message)) {



                    $.ajax({
                        type: "POST",
                        url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/banner')  ; ?>",
                        data: {
                            'id':JSON.stringify(_this.checkone),
                            'type':'bannersdelete'
                        },
                        success: function (test) {
                            _this.fetchdate();
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
                        url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/banner')  ; ?>",
                        data: {
                            'id':JSON.stringify(_this.checkone),
                            'status':status,
                            'type':'changestats'
                        },
                        success: function (test) {
                            _this.fetchdate();
                        },
                        error: function (exception) {
                            console.log(exception);
                        }
                    });




                }

            },
            curchange:function()
            {



                console.log(document.getElementById("perpage").value);

            },
            onupdates:function (srt) {

                var aztx = document.getElementById("aztx"+srt).value;
                var rutx = document.getElementById("rutx"+srt).value;
                var entx = document.getElementById("entx"+srt).value;

                $.ajax({
                    type: "POST",
                    url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/translation/postme')  ; ?>",
                    data: {az: aztx,
                        ru: rutx,
                        en: entx,
                        type: 'update',
                        id: srt},
                    success: function (test) {
                        location.reload();
                    },
                    error: function (exception) {
                        alert(exception);
                    }
                });






            },
            onchageperpage:function(per)
            {
                console.log(per.value);
                this.per_pages = per.value;

                this.fetchdate();

            },
            fetchdate:function () {
                var _this = this;
                // console.log(baseurl+'users?per_page='+this.per_page+'&search='+this.search_user+'&current_page='+this.current_page);
                axios.get(baseurl+'banner?per_page='+this.per_page+'&search='+this.search_user+'&current_page='+this.current_page)
                    .then(function (response) {
                        _this.banner = response.data.Banner;

                        _this.pagenater = response.data.pagenater;
                        _this.total = response.data.total;






                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            searchgoone:function()
            {
               var _this = this;
                this.fetsearch(_this.search_one);
            },
            searchgotwo:function()
            {
                var _this = this;
                this.fetsearch(_this.search_two);
            },
            searchgothree:function()
            {
                var _this = this;
                this.fetsearch(_this.search_three);
            },
            searchgofour:function()
            {
                var _this = this;
                this.fetsearch(_this.search_four);
            },

            fetsearch:function (txt) {
                var _this = this;
                // console.log(baseurl+'users?per_page='+this.per_page+'&search='+this.search_user+'&current_page='+this.current_page);
                axios.get(baseurl+'banner?per_page='+this.per_page+'&search='+txt+'&current_page='+this.current_page)
                    .then(function (response) {
                        _this.banner = response.data.Banner;

                        _this.pagenater = response.data.pagenater;
                        _this.total = response.data.total;






                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            changepage_prev:function () {
                var _this= this;
                if(this.prev_page!=null)
                {
                    _this.current_page = _this.prev_page;
                    this.fetchdate();
                }

            },
            changepage_next:function () {
                var _this= this;
                if(this.next_page!=null) {
                    _this.current_page = _this.next_page;
                    _this.fetchdate();
                }
            },


        }
    });
</script>