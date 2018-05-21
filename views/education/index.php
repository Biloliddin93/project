<?php



?>

<div class="top_block__content mobile_down_arrow">
    <h1>
        About
    </h1>
    <div class="menu__top_block__content">
        <ul>

            <?php
            foreach(Yii::$app->mycomponent->menu() as $key=>$vl){?>


                <?php if($vl["position"]==2){?>

          <?php
          foreach ($vl["atter_menu"] as $it){?>
            <li >
                <a href="<?=$it["link"] ?>">
                    <?=$it["txt"]?>
                </a>

            </li>
            <?php }?>


                <?php }}?>

        </ul>
    </div>
</div>
<div class="education_block creative_teens">
    <div class="blockin_three">
        <div class="row">
            <div class="col-xs-12">
                <div class="title__education_block">
                    Yaradan
                </div>
            </div>
            <div class="col-md-4 item__education_block__left tar flr__education_block">
                <div class="wrap__item__education_block__left">
                    <div class="img__education_block">
                        <img src="<?=Yii::$app->homeUrl?>images/participants_1.png" alt="">
                    </div>
                    <div class="name__education_block">
                        Leyli Alakbarova
                    </div>
                    <div class="project__education_block">
                        Project Curator
                    </div>
                </div>
            </div>
            <div class="col-md-8 item__education_block__right">
                <div class="desc__education_block">
                    <p>
                        Nulla facilisi. Integer eleifend sit amet ante blandit fringilla. Phasellus lacus odio, mattis vel condimentum in, vehicula in orci. Vivamus venenatis, nisi sed viverra dictum, massa tortor viverra erat, vitae consequat libero dolor sed ex. Quisque commodo pretium urna in vehicula. Sed ipsum nisi, convallis ac arcu non, placerat efficitur ipsum. Praesent orci dui, consectetur quis ultrices accumsan, dictum id orci. Cras vel ex faucibus, consectetur orci quis, dictum risus.
                    </p>
                    <p>
                        Proin accumsan erat cursus dui auctor aliquet vitae ac quam. Proin facilisis semper urna sit amet porttitor. Suspendisse sed mi elit. Ut et varius nulla. Phasellus nec tristique nulla. Vivamus tristique velit a dui maximus, ac pulvinar mi sollicitudin. Nulla blandit ut felis ut pretium. Etiam consectetur sit amet ante vitae consequat. Duis ex tortor, ornare quis fringilla nec, placerat in metus. In hac habitasse platea dictumst. Pellentesque quis nisl vel libero tempor pharetra id non ipsum.
                    </p>
                    <p>
                        Nulla dignissim sit amet urna quis pretium. In viverra ultricies neque, ornare ornare ligula sagittis vel. Sed at tristique lectus. Morbi nec velit quis ligula congue varius a sed orci. Maecenas iaculis enim at enim ullamcorper, et efficitur massa maximus. Vivamus sodales congue quam et molestie. Fusce sem ante, faucibus sed gravida id, lacinia ac urna. Praesent at ex eget diam maximus varius non non sapien. Aenean bibendum quis augue ac euismod. Donec at tellus congue, sagittis ligula id, tincidunt nisl. Nullam ut mi metus. Proin odio turpis, feugiat quis placerat nec, vestibulum eu lectus.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

