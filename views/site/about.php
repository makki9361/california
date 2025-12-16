<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'О нас';
$this->registerCssFile('../css/about.css');
?>

<section class="hero-about">
    <div class="container">
        <div class="video-background">
            <video autoplay muted loop id="myVideo">
                <source src="../../web/media/6036452_Document_Business_1920x1080.mp4" type="video/mp4">
            </video>
        </div>
        <div class="hero-content">
            <h1 class="hero-title">CALIFORNIA</h1>
            <p class="hero-text">
                Эксперты в области мобильных технологий и портативной электроники.
            </p>
            <a href="<?= Url::to(Yii::getAlias('@web') . '/products')?>" class="btn-about">Все продукты</a>
        </div>
    </div>
</section>

<section class="about-info">
    <div class="info-block">
        <div class="info-content">
            <h2>Наша специализация</h2>
            <p>
                Мы сфокусированы исключительно на портативной электронике — устройствах,
                которые сопровождают вас каждый день и помогают в работе, творчестве и общении.
            </p>
            <div class="categories-grid">
                <div class="category-item">
                    <div class="category-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h3>Ноутбуки</h3>
                    <p>Игровые, рабочие, ультрабуки от ведущих брендов</p>
                </div>
                <div class="category-item">
                    <div class="category-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Смартфоны</h3>
                    <p>Флагманы и бюджетные модели с гарантией</p>
                </div>
                <div class="category-item">
                    <div class="category-icon">
                        <i class="fas fa-tablet-alt"></i>
                    </div>
                    <h3>Планшеты</h3>
                    <p>Для работы, рисования и развлечений</p>
                </div>
                <div class="category-item">
                    <div class="category-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Умные часы</h3>
                    <p>Фитнес-трекеры и смарт-часы</p>
                </div>
            </div>
        </div>
        <div class="info-image">
            <?= Html::img(Yii::getAlias('@web') . '/media/phones_in_hands.jpg', ['style' => 'height: 600px; object-fit: cover;']) ?>
        </div>
    </div>

    <div class="info-block reverse">
        <div class="info-content">
            <h2>Почему выбирают нас</h2>
            <p>
                Мы не просто продаем технику — мы помогаем выбрать устройство,
                которое идеально подойдет именно вам.
            </p>
            <div class="advantages">
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h3>Только оригинальная техника</h3>
                    <p>Работаем напрямую с производителями и официальными дистрибьюторами</p>
                </div>
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h3>Персональный подбор</h3>
                    <p>Консультации и помощь в выборе под ваши задачи и бюджет</p>
                </div>
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>Сервис и поддержка</h3>
                    <p>Собственный сервисный центр и техническая поддержка</p>
                </div>
            </div>
        </div>
        <div class="info-image">
            <?= Html::img(Yii::getAlias('@web') . '/media/AQAKLePw7EwoMjtJQzgEFwBHHeqLwzc7iUXIu_5uVMHN0TLAZZZ5IoSDAv8EPBno1FRM32DQgRhF9bls1BB9sLFOwYg.jpg', ['style' => 'height: 600px; object-fit: cover;']) ?>
        </div>
    </div>

    <div class="info-block">
        <div class="info-content">
            <h2>Наша история</h2>
            <p>
                Начав с небольшого магазина в 2012 году, сегодня мы стали одним из лидеров
                в сегменте портативной электроники в регионе.
            </p>
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number">12+</div>
                    <div class="stat-text">Лет на рынке</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10 000+</div>
                    <div class="stat-text">Довольных клиентов</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-text">Брендов в каталоге</div>
                </div>
            </div>
        </div>
        <div class="info-image">
            <?= Html::img(Yii::getAlias('@web') . '/media/4390-446817.jpg', ['style' => 'height: 600px; object-fit: cover;']) ?>
        </div>
    </div>

    <div class="info-block" id="contacts">
        <div class="info-content">
            <h2>Наши контакты</h2>
            <p>
                Приезжайте в наш шоурум, чтобы лично протестировать технику,
                или свяжитесь с нами удобным способом.
            </p>
            <div class="contacts-info">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h3>Адрес шоурума</h3>
                        <p>г. Москва, ул. Техническая, д. 15, ТЦ "Электроник"</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <h3>Часы работы</h3>
                        <p>Пн-Пт: 10:00 - 21:00<br>Сб-Вс: 11:00 - 20:00</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <h3>Телефон</h3>
                        <p>+7 (495) 123-45-67</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Email</h3>
                        <p>info@california.ru</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-image">
            <div class="map-container">
                <iframe
                        src="https://yandex.ru/map-widget/v1/?ll=37.6173%2C55.7558&z=15&pt=37.6173%2C55.7558%2Cpm2rdm&l=map"
                        width="100%"
                        height="400"
                        frameborder="0"
                        style="border: 1px solid #333; border-radius: 10px;"
                        allowfullscreen="true">
                </iframe>
            </div>
        </div>
    </div>
</section>
<script>
    // Инициализация Яндекс.Карты
    document.addEventListener('DOMContentLoaded', function() {
        // Замените 'ваш_api_ключ' на ваш настоящий ключ API Яндекс.Карт
        // Или используйте версию без ключа (с ограничениями)

        // Координаты шоурума (Москва, ул. Техническая, 15)
        const shopCoordinates = [55.7558, 37.6173];

        // Инициализация карты
        ymaps.ready(init);

        function init() {
            // Создаем карту
            const map = new ymaps.Map("map", {
                center: shopCoordinates,
                zoom: 15,
                controls: ['zoomControl', 'fullscreenControl']
            });

            // Создаем метку
            const shopPlacemark = new ymaps.Placemark(shopCoordinates, {
                balloonContentHeader: 'CALIFORNIA TECH STORE',
                balloonContentBody: '<strong>Адрес:</strong> г. Москва, ул. Техническая, д. 15, ТЦ "Электроник"<br><strong>Часы работы:</strong> Пн-Пт: 10:00-21:00, Сб-Вс: 11:00-20:00',
                balloonContentFooter: '<em>Приезжайте в наш шоурум!</em>',
                hintContent: 'Наш шоурум'
            }, {
                preset: 'islands#redDotIconWithCaption',
                iconColor: '#ff0000'
            });

            // Добавляем метку на карту
            map.geoObjects.add(shopPlacemark);

            // Открываем балун при клике на метку
            shopPlacemark.events.add('click', function(e) {
                e.get('target').balloon.open();
            });

            // Адаптивный дизайн карты
            map.behaviors.disable('scrollZoom');

            // Добавляем кнопку построения маршрута
            const routeControl = new ymaps.control.Button({
                data: {
                    content: "Построить маршрут",
                    title: "Построить маршрут до магазина"
                },
                options: {
                    maxWidth: 150,
                    selectOnClick: false
                }
            });

            routeControl.events.add('click', function() {
                // Открываем Яндекс.Навигатор с маршрутом
                const url = `https://yandex.ru/maps/?rtext=~${shopCoordinates[0]},${shopCoordinates[1]}&rtt=auto`;
                window.open(url, '_blank');
            });

            map.controls.add(routeControl, {float: 'right'});
        }

        // Простая анимация для появления элементов при скролле
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

        // Анимируем появление блоков
        const infoBlocks = document.querySelectorAll('.info-block');
        infoBlocks.forEach(block => {
            block.style.opacity = '0';
            block.style.transform = 'translateY(30px)';
            block.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(block);
        });

        // Анимация для категорий
        const categoryItems = document.querySelectorAll('.category-item');
        categoryItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = `opacity 0.5s ease ${index * 0.1}s, transform 0.5s ease ${index * 0.1}s`;
            observer.observe(item);
        });
    });
</script>