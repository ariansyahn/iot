<?php
use yii\helpers\Html;
?>
<style>
  .navbar-nav>.user-menu>.dropdown-menu {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
    padding: 1px 0 0 0;
    border-top-width: 0;
    width: 141px;
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 155px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 15px;
    text-align: center;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
}
</style>
<header class="main-header">
        <!-- Logo -->
        <?= Html::a('<span class="logo-mini">IoT</span><span class="logo-lg">' . "ArkIoT" . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<!-- <?= Html::img('@web/img/user2-160x160.jpg', ['class' => 'user-image', 'alt'=>'User Image']) ?> -->
          <?= Yii::$app->user->identity->fullname ?>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="dropdown-item">
                  <?= Html::a(
                            'Sign out',
                            ['/site/logout'],
                            ['data-method' => 'post']
                        ) ?>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>
