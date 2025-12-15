<?php

use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

app\assets\AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jost:ital,wght@0,100..900;1,100..900&family=Manrope:wght@200..800&family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">
    <title><?= Html::encode($this->title) ?> - Админ панель</title>
    <style>
        .navbar-collapse{
            justify-content: flex-end !important;
        }
    </style>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
            'brandLabel' => Html::img(Yii::getAlias('@web') . '/media/logo.svg', ['alt' => Yii::$app->name, 'class' => 'logo']),
            'brandUrl' => Url::to(['/admin']),
            'options' => ['class' => 'navbar-expand-md my-bar fixed-top']
    ]);

    $menuItems = [];
    if (!Yii::$app->user->isGuest) {
        $menuItems = [
                ['label' => 'ГЛАВНАЯ', 'url' => ['/admin/index']],
                ['label' => 'ЗАКАЗЫ', 'url' => ['/admin/orders']],
                ['label' => 'ВЫЙТИ',
                        'url' => ['/admin/logout'],
                        'linkOptions' => ['data-method' => 'post'],
                ],
        ];
    } else {
        $menuItems = [
                ['label' => 'Вернуться на сайт', 'url' => ['/site/index']],
        ];
    }

    echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
</header>
<main>
    <div class="overlay" id="overlay"></div>
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <script>
        // шапка граница
        const element = document.querySelector('.my-bar');

        const topMarker = document.createElement('div');
        topMarker.style.position = 'absolute';
        topMarker.style.top = '0';
        topMarker.style.height = '20px';
        document.body.appendChild(topMarker);

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    element.style.border = 'none';
                } else {
                    element.style.borderBottom = '2px solid transparent';
                }
            });
        }, {
            threshold: 0
        });

        observer.observe(topMarker);

    </script>
</main>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>