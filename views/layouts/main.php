<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jost:ital,wght@0,100..900;1,100..900&family=Manrope:wght@200..800&family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header id="header">
    <?php
    $session = 'site/about';
    if ($session == Yii::$app->controller->route) {
        NavBar::begin([
                'brandLabel' => Html::img(Yii::getAlias('@web') . '/media/logo-w.png', ['alt' => Yii::$app->name, 'class' => 'logo']),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => ['class' => 'navbar-expand-md my-bar fixed-top']
        ]);
    } else {
        NavBar::begin([
                'brandLabel' => Html::img(Yii::getAlias('@web') . '/media/logo.svg', ['alt' => Yii::$app->name, 'class' => 'logo']),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => ['class' => 'navbar-expand-md my-bar fixed-top']
        ]);
    };
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'ВСЕ ПРОДУКТЫ', 'url' => ['/product/index']],
            ['label' => 'О НАС', 'url' => ['/site/about']],
            ['label' => 'ПОДДЕРЖКА', 'url' => ['/site/supp']],
        ]
    ]);
    echo '<div class="icons-section">
            <button class="icon-btn" id="searchBtn">
            </button>
        </div>
        
        <div class="dropdown-menu search-dropdown border-0" id="searchMenu">
            <form action="/localhost/California/web/products" method="get">
                <input type="text" name="ProductSearch[name]">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>

        <div class="dropdown-menu cart-dropdown invisible d-none" id="cartMenu">
            <div class="sort-section">
                <div class="sort-options">
                    <button class="sort-btn active" style="border-radius: 15px 0 0 0">По дате</button>
                    <button class="sort-btn">По цене</button>
                    <button class="sort-btn" style="border-radius: 0 15px 0 0">По названию</button>
                </div>
            </div>
            
            <div class="cart-empty">' .
               Html::img(Yii::getAlias('@web') . '/media/IMAGE(2).png', ['alt' => Yii::$app->name, 'class' => 'cart', 'width' => '40'])
               . '<div class="cart-empty-text">Здесь пусто...</div>
            </div>
        </div>';
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="overlay" id="overlay"></div>
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchBtn = document.getElementById('searchBtn');
            const searchMenu = document.getElementById('searchMenu');
            const cartMenu = document.getElementById('cartMenu');
            const overlay = document.getElementById('overlay');
            const closeSearch = document.getElementById('closeSearch');
            const closeCart = document.getElementById('closeCart');
            const sortBtns = document.querySelectorAll('.sort-btn');

            function hideAllMenus() {
                if (searchMenu) searchMenu.style.display = 'none';
                if (cartMenu) cartMenu.style.display = 'none';
                if (overlay) overlay.style.display = 'none';
            }

            searchBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                if (searchMenu.style.display === 'flex') {
                    hideAllMenus();
                } else {
                    hideAllMenus();
                    searchMenu.style.display = 'flex';
                    overlay.style.display = 'block';
                }
            });

            if (closeSearch) {
                closeSearch.addEventListener('click', () => {
                    hideAllMenus();
                });
            }

            if (closeCart) {
                closeCart.addEventListener('click', () => {
                    hideAllMenus();
                });
            }

            if (overlay) {
                overlay.addEventListener('click', () => {
                    hideAllMenus();
                });
            }

            if (sortBtns.length > 0) {
                sortBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const parentSection = this.closest('.sort-section');
                        if (parentSection) {
                            parentSection.querySelectorAll('.sort-btn').forEach(b => {
                                b.classList.remove('active');
                            });
                            this.classList.add('active');
                        }
                    });
                });
            }

            document.addEventListener('click', (e) => {
                if (!e.target.closest('.dropdown-menu') &&
                    !e.target.closest('.icon-btn') &&
                    !e.target.closest('.nav-item')) {
                    hideAllMenus();
                }
            });
        });

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
                    element.style.background = 'linear-gradient(rgb(255 255 255 / 96%), rgb(255 255 255 / 87%)) padding-box, radial-gradient(rgb(0 0 0 / 20%), rgb(237 237 237 / 0%)) border-box !important';
                }
            });
        }, {
            threshold: 0
        });

        observer.observe(topMarker);
    </script>
</main>

<footer class="footer">
    <div class="footer-columns">

        <div class="footer-column f-c-spec">
            <?php if ($session == Yii::$app->controller->route) {?>
                <?= Html::img(Yii::getAlias('@web') . '/media/logo-w.png', ['alt' => Yii::$app->name, 'class' => 'logo']) ?>
            <?php } else { ?>
                <?= Html::img(Yii::getAlias('@web') . '/media/logo.svg', ['alt' => Yii::$app->name, 'class' => 'logo']) ?>
            <?php } ?>
            <p class="footer-subtitle">
                Подпишитесь на SMS-уведомления, чтобы получать информацию о наших лучших предложениях.
            </p>
        </div>

        <div class="footer-column">
            <h3>Все продукты</h3>
            <ul class="footer-links">
                <li><a href="<?= Url::to(['/products?ProductSearch%5Bcategory_id%5D=2&ProductSearch%5Bsort%5D=&ProductSearch%5Bname%5D='])?>">Телефоны</a></li>
                <li><a href="<?= Url::to(['/products?ProductSearch%5Bcategory_id%5D=4&ProductSearch%5Bsort%5D=&ProductSearch%5Bname%5D='])?>">Часы</a></li>
                <li><a href="<?= Url::to(['/products?ProductSearch%5Bcategory_id%5D=3&ProductSearch%5Bsort%5D=&ProductSearch%5Bname%5D='])?>">Планшеты</a></li>
                <li><a href="<?= Url::to(['/products?ProductSearch%5Bcategory_id%5D=1&ProductSearch%5Bsort%5D=&ProductSearch%5Bname%5D='])?>">Ноутбуки</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Компания</h3>
            <ul class="footer-links">
                <li><a href="<?= Url::to('@web/site/about')?>">О нас</a></li>
                <li><a href="<?= Url::to('@web/site/supp')?>">Поддержка</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Поддержка</h3>
            <ul class="footer-links">
                <li><a href="<?= Url::to('@web/site/supp#faq-general')?>">Style Guide</a></li>
                <li><a href="#">Licensing</a></li>
                <li><a href="#">Change Log</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Follow Us</h3>
            <ul class="footer-links">
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">LinkedIn</a></li>
                <li><a href="#">Youtube</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-copyright">
            <div class="copyright-item">
                <span>Made By:</span>
                <span>Azwedo</span>
                <?= Html::img(Yii::getAlias('@web') . '/media/arrow-tr.svg', ['alt' => 'arrow'])?>
            </div>
            <div class="copyright-item">
                <span>Powered by:</span>
                <span>Webflow</span>
                <?= Html::img(Yii::getAlias('@web') . '/media/arrow-tr.svg', ['alt' => 'arrow'])?>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
