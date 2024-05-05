<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\helpers\Html;
//use app\widgets\Alert;
//use yii\bootstrap5\Breadcrumbs;
//use yii\bootstrap5\Html;
//use yii\bootstrap5\Nav;
//use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
//$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
//$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= $this->title ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header id="header">
    <div class="container">
        <div class="logo_header">
            <a href="/ " class="logo">DBoard</a>
            <span> » <?= $this->title?> « </span>
        </div>

        <nav>
            <ul>
                <li><a href="/site/help">ℹ️ Помощь</a></li>
                <li><a href="/site/download">⬇️ Скачать шаблон</a></li>
                <?php if (Yii::$app->user->isGuest):?>
                    <li><a href="/user/login">🛂Войти</a></li>
                    <li><a class="btn btn_header" href="/user/registration">Регистрация</a></li>
                <?php else: ?>
                    <?= '<li>'.
                    Html::beginForm('/user/logout').
                    Html::submitButton('Выход (' . Yii::$app->user->identity->login . ')', ['class' => 'btn']) .
                    Html::endForm() .
                    '</li>'
                    ?>

                <?php endif; ?>
            </ul>
        </nav>
    </div>
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
//    ]);
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav'],
//        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
//            Yii::$app->user->isGuest
//                ? ['label' => 'Login', 'url' => ['/site/login']]
//                : '<li class="nav-item">'
//                    . Html::beginForm(['/site/logout'])
//                    . Html::submitButton(
//                        'Logout (' . Yii::$app->user->identity->username . ')',
//                        ['class' => 'nav-link btn btn-link logout']
//                    )
//                    . Html::endForm()
//                    . '</li>'
//        ]
//    ]);
//    NavBar::end();
//    ?>
</header>

<main>
    <div class="container">
        <?= $content ?>
    </div>
</main>

<footer class="footer">
    <div class="container">
        <div class="footer_title">
            &copy;LLC DBoard <?= date('Y') ?>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
