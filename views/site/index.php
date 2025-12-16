<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Главная';
?>
<div class="slider-container">
    <div class="slider-wrapper">
        <div class="slide active">
            <div class="slide-image">
                <?= Html::img(Yii::getAlias('@web') . '/media/3c1e4caa09390e4696bd452c8420dbe4a7164d7b.png', ['alt' => 'Phone'])?>
                <div class="slide-overlay">
                    <div class="slide-content">
                        <h2 class="slide-title">Новые телефоны уже здесь, взгляните</h2>
                        <p class="slide-description">Разнообразный и богатый опыт укрепление и развитие структуры влечет за собой процесс внедрения и модернизации форм развития.</p>
                        <a href="<?= Url::to('products?ProductSearch%5Bcategory_id%5D=2&ProductSearch%5Bsort%5D=newest&ProductSearch%5Bname%5D=') ?>" class="explore-btn">Смотреть</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="slide-image">
                <?= Html::img(Yii::getAlias('@web') . '/media/3c1e4caa09390e4696bd452c8420dbe4a7164d7b.png', ['alt' => 'Phone'])?>
                <div class="slide-overlay">
                    <div class="slide-content">
                        <h2 class="slide-title">Элегантный и мощный</h2>
                        <p class="slide-description">Разнообразный и богатый опыт укрепление и развитие структуры влечет за собой процесс внедрения и модернизации форм развития.</p>
                        <a href="<?= Url::to('products?ProductSearch%5Bcategory_id%5D=1&ProductSearch%5Bsort%5D=newest&ProductSearch%5Bname%5D=') ?>" class="explore-btn">Узнать больше</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="slide-image">
                <?= Html::img(Yii::getAlias('@web') . '/media/3c1e4caa09390e4696bd452c8420dbe4a7164d7b.png', ['alt' => 'Phone'])?>
                <div class="slide-overlay">
                    <div class="slide-content">
                        <h2 class="slide-title">Технология следующего поколения</h2>
                        <p class="slide-description">Разнообразный и богатый опыт укрепление и развитие структуры влечет за собой процесс внедрения и модернизации форм развития.</p>
                        <a href="<?= Url::to('products?ProductSearch%5Bcategory_id%5D=3&ProductSearch%5Bsort%5D=name_asc&ProductSearch%5Bname%5D=     ') ?>" class="explore-btn">Читать далее...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-indicators">
        <div class="indicator-line active" data-slide="0"></div>
        <div class="indicator-line" data-slide="1"></div>
        <div class="indicator-line" data-slide="2"></div>
    </div>
    <div class="slider-nav">
        <button class="nav-btn prev-btn"><?= Html::img(Yii::getAlias('@web') . '/media/arrow-l.png', ['alt' => 'arrow', 'width' => '20'])?></button>
        <button class="nav-btn next-btn"><?= Html::img(Yii::getAlias('@web') . '/media/arrow-r.png', ['alt' => 'arrow', 'width' => '20'])?></button>
    </div>
</div>
<section class="offers-section">
    <div class="section-header">
        <h1 class="section-title">Ознакомьтесь с нашими новыми предложениями</h1>
        <p class="section-description">
            С другой стороны консультация с широким активом способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач.
        </p>
    </div>

    <div class="categories-grid gap-3">
        <div class="bl_1 d-flex flex-column justify-content-between">
            <a href="<?= Yii::getAlias('@web') . '/products?ProductSearch%5Bcategory_id%5D=1&ProductSearch%5Bsort%5D=&ProductSearch%5Bname%5D='?>" style="color: black" class="category-card text-decoration-none"  id="categ-card-one">
                <div class="category-image">
                    <?= Html::img(Yii::getAlias('@web') . '/media/609cd33610f5bce3a3242d7165d4c622572a7f34.png', ['alt' => 'arrow'])?>
                </div>
                <div class="category-content">
                    <span class="category-label">Ноутбуки</span>
                    <h3 class="category-title">Настоящее решение <br> для ноутбука</h3>
                </div>
            </a>

            <a href="<?= Yii::getAlias('@web') . '/products?ProductSearch%5Bcategory_id%5D=4&ProductSearch%5Bsort%5D=&ProductSearch%5Bname%5D='?>" style="color: black" class="category-card text-decoration-none"  id="categ-card-two">
                <div class="category-image">
                    <?= Html::img(Yii::getAlias('@web') . '/media/382a966d9393f6cbe099e93a46809a2330d2eebf.png', ['alt' => 'arrow'])?>
                </div>
                <div class="category-content">
                    <span class="category-label">Часы</span>
                    <h3 class="category-title">Не просто <br> стильно</h3>
                </div>
            </a>
        </div>
        <div class="d-flex gap-3">
            <a href="<?= Yii::getAlias('@web') . '/products?ProductSearch%5Bcategory_id%5D=2&ProductSearch%5Bsort%5D=&ProductSearch%5Bname%5D='?>" class="category-card text-decoration-none"  id="categ-card-three" style="color: black">
                <div class="category-image">
                    <?= Html::img(Yii::getAlias('@web') . '/media/40fa449bd25d54bfdac12913f24fb4638ff57107.png', ['alt' => 'arrow'])?>
                </div>
                <div class="category-content">
                    <span class="category-label">Телефоны</span>
                    <h3 class="category-title">Ваша повседневная <br> жизнь</h3>
                </div>
            </a>

            <a href="<?= Yii::getAlias('@web') . '/products?ProductSearch%5Bcategory_id%5D=3&ProductSearch%5Bsort%5D=&ProductSearch%5Bname%5D='?>" class="category-card text-decoration-none"  id="categ-card-four" style="color: black">
                <div class="category-content">
                    <span class="category-label">Планшеты</span>
                    <h3 class="category-title">Расширьте возможности <br> работы</h3>
                </div>
                <div class="category-image">
                    <?= Html::img(Yii::getAlias('@web') . '/media/d179b03d8d6f6accf6ec8a5bbc7487f406513dea.png', ['alt' => 'arrow'])?>
                </div>
            </a>
        </div>
    </div>
</section>
<section class="top-products-section">
    <div class="top-products-header">
        <h1 class="top-products-subtitle">
            Экономьте на наших самых продаваемых товарах</h1>
        <div class="top-products-title">
            Наш новый зимний дизайн BESPOKE 4-Door Flex™ ограниченной серии
        </div>
    </div>

    <div class="top-products-grid">
        <div class="top-product-item">
            <div class="top-product-image">
                <?= Html::img(Yii::getAlias('@web') . '/media/84b3b83ae77b25bbc02aba9af3cbc4ead872c81a.png', ['alt' => 'arrow'])?>
            </div>
            <div class="top-product-info">
                          <h3 class="top-product-name">MacBook Pro 13</h3>
                <p class="top-product-desc">
                    С другой стороны консультация с широким активом способствует подготовки...
                </p>
                <div class="top-product-pricing">
                    <span class="top-product-price">$1,200.00 USD</span>
                </div>
            </div>
        </div>

        <div class="top-product-item">
            <div class="top-product-image">
                <?= Html::img(Yii::getAlias('@web') . '/media/dd8f8e97406273ec534c8957fb6a49849495e0f2.png', ['alt' => 'arrow'])?>
            </div>
            <div class="top-product-info">
                   <h3 class="top-product-name">Smart Galaxy Watch 3</h3>
                <p class="top-product-desc">
                    С другой стороны консультация с широким активом способствует подготовки...
                </p>
                <div class="top-product-pricing">
                    <span class="top-product-price">$199.00 USD</span>
                </div>
            </div>
        </div>

        <div class="top-product-item">
            <div class="top-product-image">
                <?= Html::img(Yii::getAlias('@web') . '/media/e7ec6d259e9532a0e69240f28a4a98d2a32c3b5d.png', ['alt' => 'arrow'])?>
            </div>
            <div class="top-product-info">
                    <h3 class="top-product-name">MacBook Air M1</h3>
                <p class="top-product-desc">
                    С другой стороны консультация с широким активом способствует подготовки...
                </p>
                <div class="top-product-pricing">
                    <span class="top-product-price">$1,009.00 USD</span>
                </div>
            </div>
        </div>

        <div class="top-product-item">
            <div class="top-product-image">
                <?= Html::img(Yii::getAlias('@web') . '/media/fd2bb60b3e90a12a6959d21f7896d88b68032add.png', ['alt' => 'arrow'])?>
            </div>
            <div class="top-product-info">
                        <h3 class="top-product-name">iPad</h3>
                <p class="top-product-desc">
                    С другой стороны консультация с широким активом способствует подготовки...
                </p>
                <div class="top-product-pricing">
                    <span class="top-product-price">$610.00 USD</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="best-products">
    <div class="best-header">
        <h1 class="best-title">Посмотрите все самое лучшее здесь</h1>
        <p class="best-subtitle">Наш новый зимний дизайн BESPOKE 4-Door Flex™ ограниченной серии</p>
    </div>

    <div class="products-grid">
        <div class="product-card">
            <p class="product-title">Комплект умных лампочек</p>
            <h3 class="product-badge">Последние и лучшие</h3>
            <a href="#" class="explore-btn" style="width: 70%; margin: auto">Смотреть</a>
            <div class="best-image">
                <?= Html::img(Yii::getAlias('@web') . '/media/a0d23d84e3f3ddaa6ef36df915ebcb52f5ca13a7.png', ['alt' => 'arrow'])?>
            </div>
        </div>
        <div class="product-card">
            <p class="product-title">Комплект умных лампочек</p>
            <h3 class="product-badge">Самые продаваемые</h3>
            <a href="#" class="explore-btn" style="width: 70%; margin: auto">Смотреть</a>
            <div class="best-image">
                <?= Html::img(Yii::getAlias('@web') . '/media/dc637cfb79a9e7f2377af3a167dcbd206761738a.png', ['alt' => 'arrow'])?>
            </div>
        </div>
        <div class="product-card">
            <p class="product-title">Комплект умных лампочек</p>
            <h3 class="product-badge">Каждый продукт</h3>
            <a href="#" class="explore-btn" style="width: 70%; margin: auto">Смотреть</a>
            <div class="best-image">
                <?= Html::img(Yii::getAlias('@web') . '/media/fbe345615400d0f6352cb98378782f59cc048d45.png', ['alt' => 'arrow'])?>
            </div>
        </div>
    </div>
</section>
<section class="ideas-section">
    <div class="ideas-header">
        <h1 class="ideas-title">Здесь есть место идеям</h1>
        <p class="ideas-subtitle">Наш новый зимний дизайн BESPOKE 4-Door Flex™ ограниченной серии</p>
    </div>

    <div class="ideas-content">
        <div class="ideas-image">
            <?= Html::img(Yii::getAlias('@web') . '/media/3e6948029d764ed5feebb289ebab243d67b881df.png', ['alt' => 'arrow'])?>
        </div>

        <div class="ideas-list">
            <p class="idea-title">Мы упрощаем поиск талантливых дизайнеров, еще проще...</p>
            <p class="idea-title">Справочник по проектированию дорог международного значения...</p>
            <p class="idea-title">Самые тщательно охраняемые секреты творческих людей</p>
            <p class="idea-title">Мы упрощаем поиск талантливых дизайнеров, еще проще...</p>
        </div>
    </div>

    <div class="ideas-footer">
        <a href="#" class="see-all-link">Смотреть все</a>
        <?= Html::img(Yii::getAlias('@web') . '/media/arrow-tr.svg', ['alt' => 'arrow'])?>
    </div>
</section>
<section class="search-section">
    <div class="search-header">
        <h1 class="search-title">Ищете что-нибудь еще?</h1>
        <form class="search-form">
            <button type="submit" style="background: none; border: none"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg></button>
            <input type="search"
                   class="search-input"
                   placeholder="Ключевое слово"
                   required>
        </form>
    </div>

    <div class="search-tags">
        <div class="search-tag">iPhone</div>
        <div class="search-tag">Charger</div>
        <div class="search-tag">Gift</div>
        <div class="search-tag">Google Pixel 3</div>
        <div class="search-tag">Keyboard</div>
        <div class="search-tag">13 Pro Max</div>
        <div class="search-tag">iPhone 12</div>
        <div class="search-tag">Laptop</div>
        <div class="search-tag">Mobile</div>
    </div>
</section>
<section class="newsletter-section">
    <h2 class="newsletter-title">Ничего не упустите</h2>
    <p class="newsletter-description">
        Подпишитесь на SMS-уведомления, чтобы получать информацию <br> о наших лучших предложениях.
    </p>
    <?= Html::img(Yii::getAlias('@web') . '/media/35045b55e7169079283a868c992366c5739fb07b.png', ['alt' => 'gadgets', 'width' => '260'])?>
    <form class="newsletter-form">
        <input type="email"
               class="newsletter-input"
               placeholder="Ваша почта"
               required>
        <button type="submit" class="newsletter-button">Подписаться</button>
    </form>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sliderWrapper = document.querySelector('.slider-wrapper');
        const slides = document.querySelectorAll('.slide');
        const indicators = document.querySelectorAll('.indicator-line');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');

        let currentSlide = 0;
        const totalSlides = slides.length;
        let autoSlideInterval;

        function updateSlider() {
            sliderWrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentSlide);
            });

            slides.forEach((slide, index) => {
                if (index === currentSlide) {
                    slide.classList.add('active');
                } else {
                    slide.classList.remove('active');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlider();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlider();
        }

        indicators.forEach(indicator => {
            indicator.addEventListener('click', function() {
                currentSlide = parseInt(this.getAttribute('data-slide'));
                updateSlider();
                resetAutoSlide();
            });
        });

        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetAutoSlide();
        });

        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetAutoSlide();
        });

        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 20000);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        sliderWrapper.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });

        sliderWrapper.addEventListener('mouseleave', () => {
            startAutoSlide();
        });

        let startX = 0;
        let endX = 0;

        sliderWrapper.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            clearInterval(autoSlideInterval);
        });

        sliderWrapper.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            handleSwipe();
            startAutoSlide();
        });

        function handleSwipe() {
            const swipeThreshold = 50;

            if (startX - endX > swipeThreshold) {
                nextSlide();
            } else if (endX - startX > swipeThreshold) {
                prevSlide();
            }
        }

        updateSlider();
        startAutoSlide();

        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                prevSlide();
                resetAutoSlide();
            } else if (e.key === 'ArrowRight') {
                nextSlide();
                resetAutoSlide();
            }
        });
    });

// категории
    document.addEventListener('DOMContentLoaded', function() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.category-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });

        //     мостсейлед
        document.querySelectorAll('.top-product-item').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });

        //     лучшее
        document.querySelectorAll('.product-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    });

    observer.observe(topMarker);
</script>