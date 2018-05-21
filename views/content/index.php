<?php
?>


<div class="education_block">
    <div class="blockin_three">
        <div class="row">
            <div class="col-xs-12">
                <div class="title__education_block">
                    <?=$table["name"]?>
                </div>
            </div>
            <div class="col-md-4 item__education_block__left tar flr__education_block">
                <div class="wrap__item__education_block__left">
                    <div class="img__education_block">
                        <img src="<?=Yii::$app->homeUrl?>images/<?=$table["photo_url"]?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-8 item__education_block__right">
                <div class="desc__education_block">
                    <p>
                        <?=$table["summary"]?>
                    </p>

                    <p>
                        <?=$table["body"]?>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
