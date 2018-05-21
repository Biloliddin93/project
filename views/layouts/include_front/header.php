<div class="header">
	<div class="blockin">
		<div class="row">
			<div class="col-xs-4 tal col-middle">
				<div class="menu__header">
					<div class="burger">
						<span></span>
						<span></span>
						<span></span>
						<div class="text__burger">
							Menu
						</div>
					</div>
					<div class="wrap__menu__header_ul baron baron__root baron__clipper _simple" id="appsw">
						<div class="sub_wrap__menu_header baron__scroller">
							<div class="close_burger">
								<span></span>
								<span></span>
								<span></span>
								<div class="back_to_site">
									Back to site
								</div>
							</div>
							<ul class="menu__header_ul">
                                <?php
                                foreach(Yii::$app->mycomponent->menu() as $vl){?>


                                <?php if($vl["position"]==1){?>
                                    <li <?php if($vl["atter_menu"] !="empty"){ echo ('class="dropdown"');} ?>>
                                        <a href="content?id=<?=$vl["link"] ?>" <?php if($vl["atter_menu"] !="empty"){ echo ('class="dropdown-toggle" data-toggle="dropdown"');} ?> >
                                            <?=$vl["txt"]?>
                                        </a>
                                        <ul class="dropdown-menu">

                                            <?php
                                            if($vl["atter_menu"] !="empty"){
                                                foreach ($vl["atter_menu"] as $it){?>
                                                    <li class="page dropdown_popup">
                                                        <a href="#" v-on:click="selectid(<?=$vl["id"]?>)" data-toggle="dropdown_popup">
                                                            <?=$it["txt"]?>
                                                        </a>

                                                    </li>
                                                <?php }}?>
                                        </ul>

                                    </li>


                                <?php }}?>


								<li>
									<a href="<?=Yii::$app->homeUrl?>news">
										News
									</a>
								</li>

							</ul>
							<div class="desc__wrap__menu__header_ul">
								<span>Annual Report 2018</span>
								<a href="#" class="support">
									Support us
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 tac col-middle">
				<div class="logo logo_header logo_mobile">
					<a href="/">
						<img src="<?=Yii::$app->homeUrl?>images/icons/logo.png" alt="">
						<img src="<?=Yii::$app->homeUrl?>images/icons/logo_mobile.png" alt="">
					</a>
				</div>
			</div>
			<div class="col-xs-4 tar col-middle">
				<div class="language__header">
				<div class="active">
					<?php
                    if($_SESSION["_language"]=="en")
                    {
                        echo ("Eng");
                    }
                    if($_SESSION["_language"]=="ru")
                    {
                        echo ("Rus");
                    }

                    if($_SESSION["_language"]=="az")
                    {
                        echo ("Aze");
                    }

                    ?>
				</div>
				<ul>
                    <?php
                    if($_SESSION["_language"]=="en")
                    {

                        echo ('<li>
						<a href="/ru">
							Rus
						</a>
					</li>
                    <li>
                        <a href="/az">
                            Aze
                        </a>
                    </li>');

                    }

                    ?>

                    <?php
                    if($_SESSION["_language"]=="az")
                    {

                        echo ('<li>
						<a href="/ru">
							Rus
						</a>
					</li>
                    <li>
                        <a href="/en">
                            Eng
                        </a>
                    </li>');

                    }

                    ?>
                    <?php
                    if($_SESSION["_language"]=="ru")
                    {

                        echo ('<li>
						<a href="/en">
							Eng
						</a>
					</li>
                    <li>
                        <a href="/az">
                            Aze
                        </a>
                    </li>');

                    }

                    ?>

				</ul>
				</div>
			</div>
		</div>
	</div>
</div>
