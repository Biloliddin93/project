<?php


?>
<div class="creative_kids">
    <div class="left__creative_kids">
        <div class="owl-carousel owl-creative_kids">
            <?php
            foreach ($news as $vl){
            ?>

            <div class="item" style="background-image: url('<?=Yii::$app->homeUrl."images/".$vl["url_img"]?>');">
                <div class="text">
                    <div class="center__creative_kids">
                        <div class="title__creative_kids">
                            <?=$vl["name"]?>
                        </div>
                        <div class="text__crative_kids">
                            <?=$vl["summary"]?>
                        </div>
                    </div>
                    <div class="bottom__creative_kids">
                        <div class="more_btn">
                            <a href="#">
                                More
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
    <div class="right__creative_kids">
        <div class="row wrap__colloms_creative_kids">
            <?php
            foreach ($news as $vl){
            ?>
            <div class="col-xs-6">
                <div class="img_block">
                    <img src="<?=Yii::$app->homeUrl."images/".$vl["url_img"]?>" alt="">
                </div>
                <div class="date_block">
                    <?=$vl["created_at"]?>
                </div>
                <div class="text_block">
                    <?=$vl["summary"]?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="live_foto_feed">
    <div class="wrap__desc_block">
        <div class="bg__desc_block">
            <div class="title__wrap__desc_block">
                Live photo feed
            </div>
            <div class="bottom__desc_block">
                <div class="img">
                    <img src="images/icons/logo-instagram.svg" alt="">
                </div>
                <div class="text">
                    Proin cursus lectus ut justo porta fermentum. Ut porta lacus id fermentum malesuada.
                </div>
            </div>
        </div>
    </div>
    <div class="wrap__img__live_foto_feed col-middle">
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
    </div>
    <div class="wrap__img__live_foto_feed col-middle">
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
    </div>
    <div class="wrap__img__live_foto_feed col-middle">
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
    </div>
    <div class="wrap__img__live_foto_feed col-middle">
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
    </div>
    <div class="wrap__img__live_foto_feed col-middle">
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
    </div>
    <div class="wrap__img__live_foto_feed col-middle pdr0">
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
    </div>
    <div class="wrap__img__live_foto_feed col-middle">
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
    </div>
    <div class="wrap__img__live_foto_feed col-middle">
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
        <div class="img__live_foto_feed">
            <img src="images/" alt="">
        </div>
    </div>
</div>