
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\controllers\ApiController;


?>





<div class="sidebar_2 side_show" id="mmenu">
    <div class="search_block">
        <form action="" method="post">
            <input type="text" name="search"  placeholder="Search" class="search">
            <input type="submit" class="search_submit">
        </form>
    </div>
    <div class="dropdown-menu_popup_position_wrap"><ul class="project_structure_list dropdown-menu_popup"><li>123</li></ul></div>
    <div class="baron baron__root baron__clipper _simple menu__sidebar_2">
        <div class="baron__scroller">
            <div class="project_structure">
                <div class="title__project_structure header__title">
					<span>
						  <?=language(Yii::$app->session->get("_language"),[
                              "az"=>"Layihənin strukturu",
                              "ru"=>"СТРУКТУРА ПРОЕКТА",
                              "en"=>"PROJECT STRUCTURE",
                          ]) ?>
					</span>
                </div>
                <ul class="project_structure_list">
                    <li class="home_icon">
                        <a href="#">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Əsas səhifə",
                                "ru"=>"Главная страница",
                                "en"=>"Main Page",
                            ]) ?>
                        </a>
                    </li>



<?php


foreach(Yii::$app->mycomponent->menu() as $vl){?>


    <?php if($vl["position"]==1){?>


    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?=$vl["txt"]?>
        </a>

        <ul class="dropdown-menu">
            <li class="page dropdown_popup">

                <?php if($vl["type"] ==3) {?>

                <a href="<?=Yii::$app->homeUrl?>admin/company?id=<?=$vl["id"]?>" data-toggle="dropdown_popup">
                    <?=$vl["txt"]?>
                </a>

                <?php }else
                    {?>
                <a href="<?=$vl["link"] ?>" v-on:click="selectid(<?=$vl["id"]?>)" style="z-index: 0!important;" data-toggle="dropdown_popup">
                    <?=$vl["txt"]?>

                </a>
                        <?php } ?>
                <ul class="dropdown-menu_popup active"  style="z-index: 10">
                    <li>
                        <a href="#" onclick="popup('<?=$vl["id"]?>')">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Subpage yaradın",
                                "ru"=>"Создать подстраницу",
                                "en"=>"Create Subpage",
                            ]) ?>
                        </a>
                    </li>
                    <li>
                        <a href="#add_link" v-on:click="selectid('<?=$vl["id"]?>')"  class="modal-btn">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Link əlavə edin",
                                "ru"=>"Добавить ссылку",
                                "en"=>"Add Link",
                            ]) ?>
                        </a>
                    </li>
                    <li >
                        <a href="<?=Yii::$app->homeUrl?>admin/company?id=<?=$vl["id"]?>">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Maddə əlavə edin",
                                "ru"=>"Добавить статью",
                                "en"=>"Add Article",
                            ]) ?>
                        </a>
                    </li>
                    <li>

                        <a href="#" v-on:click="getedit('<?=$vl["id"]?>')">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Düzəliş edin",
                                "ru"=>"редактировать",
                                "en"=>"Edit",
                            ]) ?>

                        </a>
                    </li>
                    <li>
                        <a href="#"  onclick="dublicat()">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Dublikat",
                                "ru"=>"Дублировать",
                                "en"=>"Dublicate",
                            ]) ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="hiddens()">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Gizləmək",
                                "ru"=>"Спрятать",
                                "en"=>"Hide",
                            ]) ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="show()">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Göstər",
                                "ru"=>"Показать",
                                "en"=>"Show",
                            ]) ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="deletes()">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Sil",
                                "ru"=>"Удалить",
                                "en"=>"Delete",
                            ]) ?>
                        </a>
                    </li>
                </ul>
            </li>
            <?php
            if($vl["atter_menu"] !="empty"){
            foreach ($vl["atter_menu"] as $it){?>
            <li class="page dropdown_popup">
                <?php if($it["type"] ==3) {?>

                    <a href="<?=Yii::$app->homeUrl?>admin/company?id=<?=$it["id"]?>"  data-toggle="dropdown_popup">
                        <?=$it["txt"]?>
                    </a>

                <?php }else
                {?>
                    <a href="<?=$vl["link"] ?>" v-on:click="selectid(<?=$it["id"]?>)" data-toggle="dropdown_popup">
                        <?=$it["txt"]?>

                    </a>
                <?php } ?>
                <ul class="dropdown-menu_popup active">
                    <li>
                        <a href="#" onclick="popup('<?=$it["id"]?>')">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Subpage yaradın",
                                "ru"=>"Создать подстраницу",
                                "en"=>"Create Subpage",
                            ]) ?>
                        </a>
                    </li>
                    <li>
                        <a href="#add_link" v-on:click="selectid('<?=$it["id"]?>')"  class="modal-btn">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Link əlavə edin",
                                "ru"=>"Добавить ссылку",
                                "en"=>"Add Link",
                            ]) ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Yii::$app->homeUrl?>admin/company?id=<?=$it["id"]?>"  >
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Maddə əlavə edin",
                                "ru"=>"Добавить статью",
                                "en"=>"Add Article",
                            ]) ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" v-on:click="getedit('<?=$it["id"]?>')">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Düzəliş edin",
                                "ru"=>"редактировать",
                                "en"=>"Edit",
                            ]) ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="dublicat()">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Dublikat",
                                "ru"=>"Дублировать",
                                "en"=>"Dublicate",
                            ]) ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="hiddens()">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Gizləmək",
                                "ru"=>"Спрятать",
                                "en"=>"Hide",
                            ]) ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="show()">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Göstər",
                                "ru"=>"Показать",
                                "en"=>"Show",
                            ]) ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="deletes()">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Sil",
                                "ru"=>"Удалить",
                                "en"=>"Delete",
                            ]) ?>
                        </a>
                    </li>
                </ul>
            </li>
            <?php }}?>
        </ul>
    </li>


           <?php }?>
                    <?php }?>
                    <li class="divider"></li>
                    <li class="home_icon">
                        <a href="#">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Alt səhifə",
                                "ru"=>"Подстраница",
                                "en"=>"Sub page",
                            ]) ?>
                        </a>
                    </li>
                    <?php


                    foreach(Yii::$app->mycomponent->menu() as $vl){?>


                        <?php if($vl["position"]==2){?>
                            <li class="dropdown">
                                <?php if($vl["type"] ==3) {?>

                                    <a href="<?=Yii::$app->homeUrl?>admin/company?id=<?=$vl["id"]?>"  data-toggle="dropdown_popup">
                                        <?=$it["txt"]?>
                                    </a>

                                <?php }else
                                {?>
                                    <a href="<?=$vl["link"] ?>" v-on:click="selectid(<?=$vl["id"]?>)" data-toggle="dropdown_popup">
                                        <?=$vl["txt"]?>

                                    </a>
                                <?php } ?>


                                <ul class="dropdown-menu">
                                    <li class="page dropdown_popup">
                                        <?php if($vl["type"==3]) {?>

                                            <a href="<?=Yii::$app->homeUrl?>admin/company?id=<?=$vl["id"]?>"  data-toggle="dropdown_popup">
                                                <?=$it["txt"]?>
                                            </a>

                                        <?php }else
                                        {?>
                                            <a href="<?=$vl["link"] ?>" v-on:click="selectid(<?=$vl["id"]?>)" data-toggle="dropdown_popup">
                                                <?=$vl["txt"]?>

                                            </a>
                                        <?php } ?>
                                        <ul class="dropdown-menu_popup active">
                                            <li>
                                                <a href="#" onclick="popup('<?=$vl["id"]?>')">
                                                    <?=language(Yii::$app->session->get("_language"),[
                                                        "az"=>"Subpage yaradın",
                                                        "ru"=>"Создать подстраницу",
                                                        "en"=>"Create Subpage",
                                                    ]) ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#add_link" v-on:click="selectid('<?=$vl["id"]?>')" class="modal-btn">
                                                    <?=language(Yii::$app->session->get("_language"),[
                                                        "az"=>"Link əlavə edin",
                                                        "ru"=>"Добавить ссылку",
                                                        "en"=>"Add Link",
                                                    ]) ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=Yii::$app->homeUrl?>admin/company?id=<?=$vl["id"]?>">
                                                    <?=language(Yii::$app->session->get("_language"),[
                                                        "az"=>"Maddə əlavə edin",
                                                        "ru"=>"Добавить статью",
                                                        "en"=>"Add Article",
                                                    ]) ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" v-on:click="getedit('<?=$vl["id"]?>')">
                                                    <?=language(Yii::$app->session->get("_language"),[
                                                        "az"=>"Düzəliş edin",
                                                        "ru"=>"редактировать",
                                                        "en"=>"Edit",
                                                    ]) ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <?=language(Yii::$app->session->get("_language"),[
                                                        "az"=>"Dublikat",
                                                        "ru"=>"Дублировать",
                                                        "en"=>"Dublicate",
                                                    ]) ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="hiddens()">
                                                    <?=language(Yii::$app->session->get("_language"),[
                                                        "az"=>"Gizləmək",
                                                        "ru"=>"Спрятать",
                                                        "en"=>"Hide",
                                                    ]) ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="show()">
                                                    <?=language(Yii::$app->session->get("_language"),[
                                                        "az"=>"Göstər",
                                                        "ru"=>"Показать",
                                                        "en"=>"Show",
                                                    ]) ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" onclick="deletes()">
                                                    <?=language(Yii::$app->session->get("_language"),[
                                                        "az"=>"Sil",
                                                        "ru"=>"Удалить",
                                                        "en"=>"Delete",
                                                    ]) ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php

                                    if($vl["atter_menu"] !="empty"){
                                        foreach ($vl["atter_menu"] as $it){?>
                                            <li class="page dropdown_popup">
                                                <?php if($it["type"] ==3) {?>

                                                    <a href="<?=Yii::$app->homeUrl?>admin/company?id=<?=$it["id"]?>"  data-toggle="dropdown_popup">
                                                        <?=$it["txt"]?>
                                                    </a>

                                                <?php }else
                                                {?>
                                                    <a href="<?=$it["link"] ?>" v-on:click="selectid(<?=$it["id"]?>)" data-toggle="dropdown_popup">
                                                        <?=$it["txt"]?>

                                                    </a>
                                                <?php } ?>
                                                <ul class="dropdown-menu_popup active">
                                                    <li>
                                                        <a href="#">
                                                            <?=language(Yii::$app->session->get("_language"),[
                                                                "az"=>"Subpage yaradın",
                                                                "ru"=>"Создать подстраницу",
                                                                "en"=>"Create Subpage",
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#add_link"  class="modal-btn">
                                                            <?=language(Yii::$app->session->get("_language"),[
                                                                "az"=>"Link əlavə edin",
                                                                "ru"=>"Добавить ссылку",
                                                                "en"=>"Add Link",
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="<?=Yii::$app->homeUrl?>admin/company?id=<?=$it["id"]?>">
                                                            <?=language(Yii::$app->session->get("_language"),[
                                                                "az"=>"Maddə əlavə edin",
                                                                "ru"=>"Добавить статью",
                                                                "en"=>"Add Article",
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <?=language(Yii::$app->session->get("_language"),[
                                                                "az"=>"Düzəliş edin",
                                                                "ru"=>"редактировать",
                                                                "en"=>"Edit",
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <?=language(Yii::$app->session->get("_language"),[
                                                                "az"=>"Dublikat",
                                                                "ru"=>"Дублировать",
                                                                "en"=>"Dublicate",
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <?=language(Yii::$app->session->get("_language"),[
                                                                "az"=>"Gizləmək",
                                                                "ru"=>"Спрятать",
                                                                "en"=>"Hide",
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <?=language(Yii::$app->session->get("_language"),[
                                                                "az"=>"Sil",
                                                                "ru"=>"Удалить",
                                                                "en"=>"Delete",
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        <?php }}?>
                                </ul>
                            </li>

                        <?php }?>
                    <?php }?>
                    <li>
                        <a href="#" onclick="popup(0)">
                            <?=language(Yii::$app->session->get("_language"),[
                                "az"=>"Subpage yaradın",
                                "ru"=>"Создать подстраницу",
                                "en"=>"Create Subpage",
                            ]) ?>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="basket">
                        <a href="#">
                            Recycle Bin
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <div class="baron__track">
            <div class="baron__control baron__up">▲</div>
            <div class="baron__free">
                <div class="baron__bar" style="height: 37px;"></div>
            </div>
            <div class="baron__control baron__down">▼</div>
        </div>
    </div>

    <div id="add_link"  class="mfp-hide add_link_popup popups">
        <div class="content__popup">
            <div class="title__popup">
                <?=language(Yii::$app->session->get("_language"),[
                    "az"=>"Menyu Linkini əlavə edin",
                    "ru"=>"Добавить ссылку меню",
                    "en"=>"Add Menu Link",
                ]) ?>
            </div>
            <?php $form = ActiveForm::begin(['action' =>['admin/menu?type=update'], 'id' => 'forum_post', 'method' => 'post','options' => [

                'enctype' => 'multipart/form-data',

            ]]); ?>
                <input id="link"  name="link" type="text" :value="selectedmenu">
                <input id="ids" name="ids" type="hidden"  :value="ids">
                <input id="type" name="type" type="hidden"  value="update">
                <label for="" class="wrap_input wrap_input__radio">
                    <input type="radio" name="radio" value="1" class="radio_style" checked>
                    <div class="title_input">
                        <?=language(Yii::$app->session->get("_language"),[
                            "az"=>"Link",
                            "ru"=>"Ссылка",
                            "en"=>"Link",
                        ]) ?>
                    </div>
                    <input type="text" name="custom_link" value="http://www.google.com" class="input_style">
                </label>
                <label for="" class="wrap_input wrap_input__radio">
                    <input type="radio" value="2" name="radio" class="radio_style">
                    <div class="title_input">

                        <?=language(Yii::$app->session->get("_language"),[
                            "az"=>"Və ya saytın xəritəsi seçin",
                            "ru"=>"Или выберите с сайта карту",
                            "en"=>"Or select from site map",
                        ]) ?>


                    </div>
                    <div class="baron baron__root baron__clipper _simple add_link_popup__menu">
                        <div class="baron__scroller">
                            <div class="sidebar_2 side_show">
                                <ul class="project_structure_list">
                                    <li class="home_icon">
                                        <a href="#">
                                            <?=language(Yii::$app->session->get("_language"),[
                                                "az"=>"Əsas səhifə",
                                                "ru"=>"Главная страница",
                                                "en"=>"Main Page",
                                            ]) ?>
                                        </a>
                                    </li>
                                    <?php


                                    foreach(Yii::$app->mycomponent->menu() as $vl){?>


                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" v-on:click="changeselectedmenu('<?=$vl["link"]?>')" data-toggle="dropdown">
                                                <?=$vl["txt"]?>
                                            </a>

                                            <ul class="dropdown-menu">
                                                <?php
                                                if($vl["atter_menu"] !="empty"){
                                                    foreach ($vl["atter_menu"] as $it){?>
                                                        <li class="page dropdown_popup">
                                                            <a href="#" v-on:click="changeselectedmenu('<?=$it["link"]?>')" data-toggle="dropdown_popup">
                                                                <?=$it["txt"]?>
                                                            </a>

                                                        </li>
                                                    <?php }}?>
                                            </ul>
                                        </li>

                                    <?php }?>

                                </ul>
                            </div>
                            <div class="baron__track">
                                <div class="baron__control baron__up">▲</div>
                                <div class="baron__free">
                                    <div class="baron__bar" style="height: 37px;"></div>
                                </div>
                                <div class="baron__control baron__down">▼</div>
                            </div>
                        </div>
                    </div>
                </label>
                <label for="" class="wrap_input tar">
                    <button type="submit" class="btn_gray btn_cancel">
                        Cancel
                    </button>
                    <button type="submit" class="btn_light_green btn_save">
                        Save
                    </button>
                </label>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div id="menus" class="mfp-hide popups togo ">
        <?php $form = ActiveForm::begin(['action' =>['admin/menu?type=insert'], 'id' => 'forum_post', 'method' => 'post','options' => [
            'enctype' => 'multipart/form-data',
        ]]); ?>
        <input type="hidden" name="type" value="update">

        <div class="content__popup">
            <div class="title__popup">
                <?=language(Yii::$app->session->get("_language"),[
                    "az"=>"Yeni menyu",
                    "ru"=>"Новое меню",
                    "en"=>"New menu",
                ]) ?>
            </div>
            <input type="hidden" name="lvl" value="0">
            <input type="hidden" name="atter_id" id="atter_id">
            <div class="col-md-12" style="color: #0b0b0b;">
                <div class="form-group">
                    <label>En</label>
                    <input class="form-control" type="text" name="txt_en" id="menus">
                </div>
                <div class="form-group">
                    <label>Ru</label>
                    <input type="text" class="form-control" name="txt_ru" id="menus">
                </div>
                <div class="form-group">
                    <label>Az</label>
                    <input type="text" class="form-control" name="txt_az" id="menus">
                </div>


                <div class="form-group">

                    <button class="form-control" type="submit">
                        save
                    </button>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

    <div id="edites" class="mfp-hide popups edits">
        <?php $form = ActiveForm::begin(['action' =>['admin/menu?type=edit'], 'id' => 'forum_post', 'method' => 'post','options' => [
            'enctype' => 'multipart/form-data',
        ]]); ?>
        <input type="hidden" name="type" value="edits">
        <input type="hidden" name="id"  id="idsa" value="">

        <div class="content__popup">
            <div class="title__popup">
                <?=language(Yii::$app->session->get("_language"),[
                    "az"=>"Yeni menyu",
                    "ru"=>"Новое меню",
                    "en"=>"New menu",
                ]) ?>
            </div>
            <input type="hidden" name="lvl" value="0">
            <input type="hidden" name="atter_id" id="atter_id">
            <div class="col-md-12" style="color: #0b0b0b;">
                <div class="form-group">
                    <label>En</label>
                    <input class="form-control" value="" type="text" name="txt_en" id="txt_en">
                </div>
                <div class="form-group">
                    <label>Ru</label>
                    <input type="text" class="form-control" name="txt_ru" id="txt_ru">
                </div>
                <div class="form-group">
                    <label>Az</label>
                    <input type="text" class="form-control" name="txt_az" id="txt_az">
                </div>


                <div class="form-group">

                    <button class="form-control" type="submit">
                        save
                    </button>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>


</div>

<script>
    function openPopuxp(el) { // get the class name in arguments here
        $.magnificPopup.open({
            items: {
                src: '#menus',
            },
            type: 'inline'
        });
    }
    function openedit(el) { // get the class name in arguments here
        $.magnificPopup.open({
            items: {
                src: '#edites',
            },
            type: 'inline'
        });


        $.getJSON('/api/get?&ids='+ document.getElementById("idsa").value, function(data) {
            document.getElementById("txt_en").value = data.txt_en;
            document.getElementById("txt_ru").value = data.txt_ru;
            document.getElementById("txt_az").value = data.txt_az;
            e.preventDefault();
            return false;
        });
    }
    function dublicat() {
        var _this = this;
        var message =  '<?=language(Yii::$app->session->get("_language"),["az"=>"Bu görüntüyü silməyinizə əminsinizmi?","ru"=>"Вы действительно хотите удалить это изображение?","en"=>"Are you sure to delete this image?",]) ?>'
        if(confirm(message)) {



            $.ajax({
                type: "POST",
                url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/menu?type=dublicate')  ; ?>",
                data: {
                    'ids':document.getElementById("ids").value,

                },
                success: function (test) {
                    console.log("ok");
                    window.location.reload();
                },
                error: function (exception) {
                    console.log(exception);
                }
            });




        }
    }
    function deletes() {
        var _this = this;
        var message =  '<?=language(Yii::$app->session->get("_language"),["az"=>"Bu görüntüyü silməyinizə?","ru"=>"Вы действительно хотите удалить это?","en"=>"Are you sure to delete this?",]) ?>'
        if(confirm(message)) {



            $.ajax({
                type: "POST",
                url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/menu?type=delete')  ; ?>",
                data: {
                    'ids':document.getElementById("ids").value,

                },
                success: function (test) {

                    window.location.reload();
                },
                error: function (exception) {
                    console.log(exception);
                }
            });




        }
    }
    function hiddens() {
        var _this = this;
        var message =  '<?=language(Yii::$app->session->get("_language"),["az"=>"Bu görüntüyü silməyinizə?","ru"=>"Вы действительно хотите удалить это?","en"=>"Are you sure to delete this?",]) ?>'
        if(confirm(message)) {



            $.ajax({
                type: "POST",
                url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/menu?type=hidden')  ; ?>",
                data: {
                    'ids':document.getElementById("ids").value,

                },
                success: function (test) {

                    window.location.reload();
                },
                error: function (exception) {
                    console.log(exception);
                }
            });




        }
    }
    function show() {
        var _this = this;
        var message =  '<?=language(Yii::$app->session->get("_language"),["az"=>"Bu görüntüyü silməyinizə?","ru"=>"Вы действительно хотите удалить это?","en"=>"Are you sure to delete this?",]) ?>'
        if(confirm(message)) {



            $.ajax({
                type: "POST",
                url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/menu?type=show')  ; ?>",
                data: {
                    'ids':document.getElementById("ids").value,

                },
                success: function (test) {

                    window.location.reload();
                },
                error: function (exception) {
                    console.log(exception);
                }
            });




        }
    }
    function popup (id) {
console.log(id);
        document.getElementById("atter_id").value = id;
        openPopuxp("togo");
    }
    function editpopup(idx) {

        document.getElementById("idsa").value = idx;



        openedit("edits");
    }

    var cm = new Vue({
       el:'#mmenu',
        data:{

           selectedmenu:'',
            ids:'',

        },
        created:function () {

        },
        methods:{

           selectid:function (idsx) {
               console.log(idsx)

               this.ids = idsx;
           },
           changeselectedmenu:function (str) {
               this.selectedmenu = str;
              console.log(str);

           },

            dublicate:function () {

                var _this = this;
                var message =  '<?=language(Yii::$app->session->get("_language"),["az"=>"Bu görüntüyü silməyinizə əminsinizmi?","ru"=>"Вы действительно хотите удалить это изображение?","en"=>"Are you sure to delete this image?",]) ?>'
                if(confirm(message)) {


                    var formData = new FormData();
                    formData.append('id', id);
                    formData.append('type', 'imgdelete');
                    formData.append('_csrf', tokens);

                    $.ajax({
                        type: "POST",
                        url: "<?php echo Yii::$app->getUrlManager()->createUrl('admin/menu?type')  ; ?>",
                        data: {
                            'ids':_this.ids,

                        },
                        success: function (test) {
                          console.log("ok");
                        },
                        error: function (exception) {
                            console.log(exception);
                        }
                    });




                }
            },
            getedit:function (id) {

                console.log(id);
            }

        }


    });
</script>




