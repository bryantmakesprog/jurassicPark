<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

use app\models\Package;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    $ticketMenuItems = array();
    foreach(Package::find()->all() as $package)
    {
        $ticketMenuItems[] = ['label' => $package->name, 'url' => ['package/view-package', 'id' => $package->id]];
    }
    $ticketMenuItems[] = "<li class='divider'></li>";
    $ticketMenuItems[] = ['label' => 'All Packages...', 'url' => ['package/view-all-packages']];
    
    $profileMenuItems = array();
    $profileMenuItems[] = ['label' => "View Tickets", 'url' => ['ticket/view-by-user']];
    $profileMenuItems[] = "<li class='divider'></li>";
    if(!Yii::$app->user->isGuest)
    {
        $profileMenuItems[] = ['label' => "Logout", 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']];
    }
    
    $menuItems = [
        ['label' => 'Tickets', 'url' => ['/package/view-all-packages'], 'items' => $ticketMenuItems],
        //['label' => 'Home', 'url' => ['/site/index']],
        //['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Help', 'url' => ['/site/contact']],
        ['label' => "<span class='glyphicon glyphicon-shopping-cart'></span> Cart", 'url' => ['package/cart-view']]
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => Yii::$app->user->identity->username, 'items' => $profileMenuItems];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
