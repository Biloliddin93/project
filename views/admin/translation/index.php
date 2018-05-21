<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>
<div id="add_traslation" class="mfp-hide popups">
    <div class="content__popup">
        <div class="title__popup">
            <?=language(Yii::$app->session->get("_language"),[
                "az"=>"Tərcümə",
                "ru"=>"Переводы",
                "en"=>"Translations",
            ]) ?>
        </div>
     <?php $form = ActiveForm::begin([ 'id' => 'login-form','options' => [
         'enctype' => 'multipart/form-data',
     ]]); ?>
            <label for="" class="wrap_input">
                <div class="title_input">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Açar söz",
                        "ru"=>"Ключевое слово",
                        "en"=>"Keyword",
                    ]) ?>
                </div>
                <input type="text" name="keyword" value="" class="input_style">
            </label>
            <label for="" class="wrap_input">
                <div class="title_input">
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Default Mesaj",
                        "ru"=>"Сообщение по умолчанию",
                        "en"=>"Default Message",
                    ]) ?>

                </div>
                <input type="text" name="default_message" value="" class="input_style">
            </label>
            <label for="" class="wrap_input">
                <div class="title_input">
                    English
                </div>
                <input type="text" name="enmessage" value="" class="input_style">
            </label>
            <label for="" class="wrap_input">
                <div class="title_input">
                    Azerbaijani
                </div>
                <input type="text"  name="azmessage" value="" class="input_style">
            </label>
            <label for="" class="wrap_input">
                <div class="title_input">
                    Russian
                </div>
                <input type="text"  name="rumessage" value="" class="input_style">
            </label>
            <label for="" class="wrap_input tar">
                <button type="button" class="btn_gray btn_cancel">
                    Cancel
                </button>
                <button type="submit" class="btn_light_green btn_save">
                    Save
                </button>
            </label>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="title_page title_page__settings">
    <a href="#add_traslation" class="btn_add modal-btn flr">
        <?=language(Yii::$app->session->get("_language"),[
            "az"=>"Tərcümə əlavə edin",
            "ru"=>"Добавить перевод",
            "en"=>"Add Traslation",
        ]) ?>
    </a>
    <h2>
        <?=language(Yii::$app->session->get("_language"),[
            "az"=>"Tərcümə",
            "ru"=>"Переводы",
            "en"=>"Translations",
        ]) ?>

    </h2>

</div>
<div class="edit_content" id="app">
    {{ per_pages }}

    <div class="wrap__tabs__content wrap__tabs__content__translations">
        <div class="row">
            <div class="col-md-6">
                <div class="search_block search_block__translations">

                        <input type="text" name="search" v-on:change="searchgo()" placeholder=" <?=language(Yii::$app->session->get("_language"),[
                            "az"=>"Axtarış",
                            "ru"=>"Поиск",
                            "en"=>"Search",
                        ]) ?>" v-on:change="searchgo()"  v-model="search_user"  class="search">
                        <input type="button" v-on:click="searchgo()" class="search_submit">

                </div>
            </div>
        </div>
        <table class="translations_table" border="0"  cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <th>
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"MESSAGE ID",
                        "ru"=>"Идентификатор сообщения",
                        "en"=>"MESSAGE ID",
                    ]) ?>
                </th>
                <th>
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"Standart mesaj",
                        "ru"=>"Сообщение по умолчанию",
                        "en"=>"Default message",
                    ]) ?>

                </th>
                <th>
                    <?=language(Yii::$app->session->get("_language"),[
                        "az"=>"halət",
                        "ru"=>"Состояние",
                        "en"=>"STATUS",
                    ]) ?>

                </th>
                <th></th>
            </tr>
            <tr v-for="(vl,index) in translation">
                <td>
                    <strong>
                        {{ vl.keyword }}
                    </strong>
                </td>
                <td>
                    {{ vl.default_message }}
                    <div v-bind:id="'ac'+vl.id" class="collapse">
                        <div class="translations_form active">
                            <label for="" class="wrap_input">
                                <div class="title_input">
                                    {{ vl.enmes }}
                                </div>
                                <input type="text" v-bind:value="vl.enmes" v-bind:id="'entx'+vl.translation_grp_id"  class="input_style">

                            </label>
                            <label for="" class="wrap_input">
                                <div class="title_input">
                                    {{ vl.azmes }}
                                </div>
                                <input type="text" v-bind:value="vl.azmes" v-bind:id="'aztx'+vl.translation_grp_id"  class="input_style">
                            </label>
                            <label for="" class="wrap_input">
                                <div class="title_input">

                                </div>
                                <input type="text" v-bind:value="vl.rumes" v-bind:id="'rutx'+vl.translation_grp_id" class="input_style">
                            </label>
                            <label for="" class="wrap_input">
                                <button type="button"  data-toggle="collapse" v-bind:data-target="'#ac'+vl.id" v-on:click="onupdates(vl.translation_grp_id)" class="btn_light_green btn_save">
                                    <?=language(Yii::$app->session->get("_language"),[
                                        "az"=>"Yadda saxla",
                                        "ru"=>"Сохранить",
                                        "en"=>"Save",
                                    ]) ?>
                                </button>
                                <button type="button" data-toggle="collapse" v-bind:data-target="'#ac'+vl.id"  class="btn_gray btn_cancel">
                                    <?=language(Yii::$app->session->get("_language"),[
                                        "az"=>"Ləğv et",
                                        "ru"=>"Отмена",
                                        "en"=>"Cancel",
                                    ]) ?>
                                </button>
                            </label>

                    </div>

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
                    <a href="#" data-toggle="collapse" v-bind:data-target="'#ac'+vl.id" >
                        <span class="icon__editing"></span>


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
                            <a href="#" v-on:click="curchange(current_page-1)">
                                <span></span>
                            </a>
                        </li>



                        <li class="active" v-for="(vl,index) in pagenater">
                            <a :href="'#'+vl" v-on:click="curchange(vl)">
                                <span>{{vl}}</span>
                            </a>
                        </li>

                        <li class="next__pagination" v-if="pagenater > current_page">
                            <a href="#" v-on:click="curchange(current_page+1)">
                                <span></span>
                            </a>
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
                    <select name="perpage"  id="perpage"  v-model="per_pages">

                        <option value="5" selected>
                            5
                        </option>
                        <option :value="10">
                            10
                        </option>
                        <option :value="15">
                            15
                        </option>
                        <option :value="20">
                            20
                        </option>
                        <option :value="25">
                            25
                        </option>
                    </select>

                </div>
            </div>
        </div>
    </div>
</div>



<script>
    var curlang = '<?=Yii::$app->language ?>';
    var baseurl ='<?= Yii::$app->homeUrl ?>'+curlang+'/api/';
    var baseurlx ='<?= Yii::$app->homeUrl ?>';
    var tokens ='<?= Yii::$app->request->csrfToken; ?>';


    var cm = new Vue({
        el: '#app',
        data: {
            selectedtab: 1,
            translation:[],
            language:[],


            labels: '',

            data: [],
            per_page: 5,
            per_pages: '',
            current_page: 1,
            next_page: 1,
            prev_page: 1,

            search_user: '',
            pagenater:null


        },
        created:function () {
            this.fetchdate();
        },
        methods:{
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
                axios.get(baseurl+'translation?per_page='+this.per_page+'&search='+this.search_user+'&current_page='+this.current_page)
                    .then(function (response) {
                        _this.translation = response.data.Translation;
                        _this.language = response.data.language;
                        _this.pagenater = response.data.pagenater;






                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            searchgo:function()
            {
                this.fetchdate();
            },

        }
    });
</script>
