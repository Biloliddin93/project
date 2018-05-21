<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>
<div class="title_page title_page__settings" id="apps">
    <h2>
        <?=language(Yii::$app->session->get("lang"),[
            "az"=>"Ayarlar",
            "ru"=>"Настройки",
            "en"=>"Settings",
        ]) ?>

    </h2>
    <a href="#" class="btn_add btn_add__users btn_add_none">
        Add
    </a>
</div>
<div class="tabs" id="app">
    <ul class="tabs__caption">
        <li class="active" v-on:click="changeselecttab(1)"> <?=language(Yii::$app->session->get("lang"),[
                "az"=>"GENERAL",
                "ru"=>"ГЕНЕРАЛЬНАЯ",
                "en"=>"GENERAL",
            ]) ?></li>
        <li v-on:click="changeselecttab(2)"><?=language(Yii::$app->session->get("lang"),[
                "az"=>"İstifadəçilər",
                "ru"=>"ПОЛЬЗОВАТЕЛИ",
                "en"=>"USERS",
            ]) ?></li>
        <li v-on:click="changeselecttab(3)"><?=language(Yii::$app->session->get("lang"),[
                "az"=>"XƏBƏRLƏR",
                "ru"=>"НОВОСТНАЯ РАССЫЛКА",
                "en"=>"NEWSLETTER",
            ]) ?></li>
        <li v-on:click="changeselecttab(4)"><?=language(Yii::$app->session->get("lang"),[
                "az"=>"ANALİTİKA",
                "ru"=>"АНАЛИТИКА",
                "en"=>"ANALYTICS",
            ]) ?></li>
        <li v-on:click="changeselecttab(5)"><?=language(Yii::$app->session->get("lang"),[
                "az"=>"SOSİAL",
                "ru"=>"СОЦИАЛЬНОЕ",
                "en"=>"SOCIAL",
            ]) ?></li>
        <li v-on:click="changeselecttab(6)"><?=language(Yii::$app->session->get("lang"),[
                "az"=>"SEO SEÇMƏLƏRİ",
                "ru"=>"ОПЦИИ SEO",
                "en"=>"SEO OPTIONS",
            ]) ?></li>
    </ul>

    <div class="tabs__content active">
        <div class="wrap__tabs__content">
            <?php
            $form = ActiveForm::begin([ 'id' => 'settings-form','options' => [
                'enctype' => 'multipart/form-data',

            ]]);
            ?>

                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->csrfToken ?>">
                <div class="left_form">
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            Site title
                        </div>
                        <input type="text" class="input_style" name="site_title" value="<?=$table["site_title"]?>">
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            Admin Email
                        </div>
                        <input type="text" class="input_style" name="adminemail" value="<?=$table["adminemail"]?>">
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            Site default language
                        </div>
                        <select name="site_language_id" id="">

                            <?php foreach ($lang as $vl){

                                if($vl["id"] == $table["site_language_id"])
                                {
                                    echo('<option value="'.$vl["id"].'" selected>'.$vl["language_name"].'</option>');
                                }
                                else
                                {
                                    echo('<option value="'.$vl["id"].'" >'.$vl["language_name"].'</option>');
                                }


                            } ?>


                        </select>
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            Admin interface language
                        </div>
                        <select name="admin_language_id" id="" >
                            <?php foreach ($lang as $vl){

                                if($vl["id"] == $table["admin_language_id"])
                                {
                                    echo('<option value="'.$vl["id"].'" selected>'.$vl["language_name"].'</option>');
                                }
                                else
                                {
                                    echo('<option value="'.$vl["id"].'" >'.$vl["language_name"].'</option>');
                                }


                            } ?>


                        </select>
                    </label>
                </div>
                <div class="right_form">
                    <label for="" class="wrap_input wrap_input__file">
                        <div class="title_input">
                            Favicon
                        </div>
                        <div class="input">Select file</div>
                        <div class="file_input">
                            <input type="file" name="images" class="input_style">
                            <span>Browse</span>
                        </div>
                    </label>
                    <label for="" class="wrap_input">
                        <div class="title_input">
                            Hide empty pages
                        </div>
                        <select  name="empty_stats">
                            <option value="1" <?php if($table["empty_stats"]==1)echo "selected" ?> >Yes</option>
                            <option value="2" <?php if($table["empty_stats"]==2)echo "selected" ?>>No</option>

                        </select>
                    </label>
                </div>




            <?php ActiveForm::end(); ?>
        </div>
        <div class="wrap__bottom__tabs__content">
            <div class="row">
                <div class="col-md-12 tar col-middle">
                    <a href="#"  v-on:click="postme()" class="btn_light_green btn_save">
                        Save
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="tabs__content">
        <div class="wrap__tabs__content wrap__tabs__content__users">
            <div class="row">
                <div class="col-md-6">
                    <div class="search_block">

                            <input type="text" name="search" placeholder="Search" class="search" v-model="search_user"  v-on:change="searchgo()">
                            <input type="submit" v-on:click="searchgo()" class="search_submit">

                    </div>
                </div>
                <div class="col-md-6 tar">
                    <a href="#" v-on:click="changestatus('1')" class="btn_common_styles btn_gray btn_users">
                        Activate
                    </a>
                    <a href="#" v-on:click="changestatus('2')" class="btn_common_styles btn_gray btn_users">
                        Suspend
                    </a>
                    <a href="#" v-on:click="changestatus('3')"  class="btn_common_styles btn_light_red btn_users">
                        Delete
                    </a>
                </div>
            </div>
            <table class="users" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <th></th>
                    <th>
                        <?=language(Yii::$app->session->get("_language"),[
                            "az"=>"NAME",
                            "ru"=>"ИМЯ",
                            "en"=>"NAME",
                        ]) ?>
                    </th>
                    <th>
                        <?=language(Yii::$app->session->get("_language"),[
                            "az"=>"EMAIL",
                            "ru"=>"ЭЛ. АДРЕС",
                            "en"=>"EMAIL",
                        ]) ?>
                    </th>
                    <th>
                        <?=language(Yii::$app->session->get("_language"),[
                            "az"=>"SON LOGİN",
                            "ru"=>"ПОСЛЕДНИЙ ВОЙТИ",
                            "en"=>"LAST LOGIN",
                        ]) ?>

                    </th>
                    <th>
                        <?=language(Yii::$app->session->get("_language"),[
                            "az"=>"STATUS",
                            "ru"=>"ПОЛОЖЕНИЕ ДЕЛ",
                            "en"=>"STATUS",
                        ]) ?>

                    </th>
                    <th></th>
                </tr>
                <tr v-for="(vl,index) in data.UsersList">
                    <td>
                        <div class="checkbox_block">
                            <input type="checkbox" id="checkedNames" v-model="checkedNames" :value="vl.id" class="checkbox_style">
                            <span></span>
                        </div>
                    </td>
                    <td>
                        {{ vl.fullname }}
                    </td>
                    <td>
                        {{ vl.email }}

                    </td>
                    <td>

                        <div class="date">
                            {{ vl.created_at }}
                        </div>
                    </td>
                    <td v-if="vl.user_stats == 1">
                        Active
                    </td>
                    <td v-if="vl.user_stats == 2">
                        Suspended
                    </td>
                    <td>
                        <a href="#">
                            <span class="icon__editing"></span>
                        </a>
                        <a href="#">
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
                            <li class="prev__pagination">
                                <a href="#" v-on:click="changepage_prev()">
                                    <span></span>
                                </a>
                            </li>
                            <li class="active">
                                <span>{{ current_page }}</span>
                            </li>
                            <li class="next__pagination">
                                <b href="#" v-on:click="changepage_next()">
                                    <span></span>
                                </b>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 tar col-middle">
                    <div class="display_on_page">
                        <span><?=language(Yii::$app->session->get("lang"),[
                                "az"=>"Səhifədə göstərin",
                                "ru"=>"Показать на странице",
                                "en"=>"Display on page",
                            ]) ?></span>
                        <select name="" id="" v-model="per_page" v-on:change="fetchusers()">
                            <option value="5" selected>
                                5
                            </option>
                            <option value="10">
                                10
                            </option>
                            <option value="15">
                                15
                            </option>
                            <option value="20">
                                20
                            </option>
                            <option value="25" >
                               25
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tabs__content">
        NEWSLETTER
    </div>
    <div class="tabs__content">
        ANALYTICS
    </div>
    <div class="tabs__content">
        SOCIAL
    </div>
    <div class="tabs__content ">
        <div class="wrap__tabs__content wrap__tabs__content__seo_options">
            <form action="" method="post">
                <label for="" class="wrap_input">
                    <div class="title_input grey_font">
                        Robots.txt
                    </div>
                    <textarea name="" id="" cols="30" rows="10" class="textarea_style"></textarea>
                </label>
                <label for="" class="wrap_input">
                    <div class="title_input grey_font">
                        Sitemap
                    </div>
                    <a href="#" class="btn_common_styles btn_dark_gray btn_seo_options">
                        Generate XML
                    </a>
                </label>
                <label for="" class="wrap_input">
                    <div class="title_input grey_font">
                        Generated file url
                    </div>
                    <div class="wrap_style_btn_and_input">
                        <input type="text" value="http://www.magnum.az/sitemap.xml" class="input_style">
                        <button type="submit" class="btn_common_styles btn_dark_gray btn_seo_options__copy">Copy</button>
                    </div>
                </label>
            </form>
        </div>
        <div class="wrap__bottom__tabs__content">
            <div class="row">
                <div class="col-md-12 tar col-middle">
                    <button  v-on:click="postme()" class="btn_light_green btn_save">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var curlang = '<?=$_SESSION["lang"] ?>';
    var baseurl ='<?= Yii::$app->homeUrl ?>'+curlang+'/api/';
    var tokens ='<?= Yii::$app->request->csrfToken; ?>';


    var cm = new Vue({
        el:'#app',
        data:{
            selectedtab:1,
            checkedNames:[],


            labels:'',

            data:[],
            per_page:5,
            current_page:1,
            next_page:1,
            prev_page:1,

            search_user:'',


        },
        created:function () {

            this.fetchusers();

        },
        
        methods:{

            postme:function () {

                switch (this.selectedtab)
                {
                    case 1:document.getElementById("settings-form").submit();break;
                    case 2:$['#settings-form'].submit();break;
                }

            },
            changeselecttab:function ($tab) {

                this.selectedtab = $tab;




            },
            fetchusers:function () {

                var _this = this;
               // console.log(baseurl+'users?per_page='+this.per_page+'&search='+this.search_user+'&current_page='+this.current_page);
                axios.get(baseurl+'users?per_page='+this.per_page+'&search='+this.search_user+'&current_page='+this.current_page)
                    .then(function (response) {
                        _this.data = response.data;
                       /*
                     this.next_page = response.data.next_page;
                        this.prev_page = response.data.prev_page;*/





                    })
                    .catch(function (error) {
                        console.log(error);
                    });


            },

            searchgo:function()
            {
                this.fetchusers();
            },


            changepage_prev:function () {

                if(this.data.prev_page!=null)
                {
                    this.current_page = this.data.prev_page;
                    this.fetchusers();
                }

            },
            changepage_next:function () {
                if(this.data.next_page!=null) {
                    this.current_page = this.data.next_page;
                    this.fetchusers();
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

