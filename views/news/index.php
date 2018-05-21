<?php
?>

<div class="top_block__content sort_inside">
    <h1>
        <a href="#">
            <?=language(Yii::$app->session->get("_language"),[
                "az"=>"Xəbərlər",
                "ru"=>"Новости",
                "en"=>"News",
            ]) ?>
        </a>

    </h1>
    <div class="sort_block">
        <select class="sort_project">
            <option value="" selected>Sort by Project</option>
            <option value="">Sort by Project - 2</option>

        </select>
        <select class="sort_year">
            <option value="" selected>Sort by Year</option>
            <option value="">Sort by Year - 2</option>

        </select>
    </div>
</div>
<div class="project_news_block">
    <div class="blockin">
        <div class="row items__project_news_block">

            <?php foreach ($table as $val) { ?>

            <div class="col-md-4 col-sm-6 item__project_news_block">
                <div class="img__project_news_block">
                    <img src="<?=Yii::$app->homeUrl?>images/<?=$val["url_img"]?>" alt="">
                </div>
                <div class="wrap_text__project_news_block">
                    <div class="date__project_news_block">
                        <?=$val["created_at"]?>
                    </div>
                    <div class="text__project_news_block">
                        <?=$val["name"]?>

                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</div>
