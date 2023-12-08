<div class="left-side-bar">
    <div class="brand-logo">
        <a style="background: #000" href="<?= Yii::$app->urlManager->createUrl(['/cp/'])?>">
            <img src="/logo1.png" alt="" class="dark-logo" />
            <img
                src="/logo1.png"
                alt=""
                class="light-logo"
            />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/cp/'])?>" class="dropdown-toggle no-arrow <?= Yii::$app->controller->id == 'default' ? 'active' : ''?>">
						<span class="micon bi bi-house"></span>
                        <span class="mtext">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/cp/menu'])?>" class="dropdown-toggle no-arrow <?= Yii::$app->controller->id == 'menu' ? 'active' : ''?>">
                        <span class="micon bi bi-list"></span>
                        <span class="mtext">Menu</span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/cp/category'])?>" class="dropdown-toggle no-arrow <?= Yii::$app->controller->id == 'category' ? 'active' : ''?>">
                        <span class="micon bi bi-collection"></span>
                        <span class="mtext">Kategoriyalar</span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/cp/navigate'])?>" class="dropdown-toggle no-arrow <?= Yii::$app->controller->id == 'navigate' ? 'active' : ''?>">
                        <span class="micon bi bi-archive"></span>
                        <span class="mtext">Navigatsiya</span>
                    </a>
                </li>



                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/cp/user'])?>" class="dropdown-toggle no-arrow <?= Yii::$app->controller->id == 'user' ? 'active' : ''?>">
                        <span class="micon bi bi-person"></span>
                        <span class="mtext">Foydalanuvchilar</span>
                    </a>
                </li>



            </ul>
        </div>
    </div>
</div>


<div class="mobile-menu-overlay"></div>
