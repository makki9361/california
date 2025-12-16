<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Поддержка';
$this->registerCssFile('../css/supp.css');
?>
<section class="support-content">
        <div class="support-grid">
            <aside class="support-sidebar">
                <h3>Быстрые разделы</h3>
                <nav class="support-nav">
                    <a href="#faq-general" class="faq-nav-item">
                        <i class="fas fa-question-circle"></i>
                        <span>Общие вопросы</span>
                    </a>
                    <a href="#faq-orders" class="faq-nav-item">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Заказы и доставка</span>
                    </a>
                    <a href="#faq-warranty" class="faq-nav-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Гарантия и возврат</span>
                    </a>
                    <a href="#faq-tech" class="faq-nav-item">
                        <i class="fas fa-laptop"></i>
                        <span>Техподдержка</span>
                    </a>
                    <a href="#faq-payment" class="faq-nav-item">
                        <i class="fas fa-credit-card"></i>
                        <span>Оплата</span>
                    </a>
                </nav>
            </aside>
            <div class="support-main">
                <div class="faq-section" id="faq-general">
                    <h2><i class="fas fa-question-circle"></i> Общие вопросы</h2>
                    <div class="faq-list">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Какие бренды вы продаете?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Мы работаем с более чем 50 ведущими брендами электроники, включая Apple, Samsung, Xiaomi, Huawei, Asus, Acer, Lenovo, HP, Dell, Sony и многие другие. Все товары поставляются официальными дистрибьюторами с полной гарантией производителя.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Можно ли приехать и посмотреть товар перед покупкой?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Да, конечно! У нас есть шоурум по адресу: г. Москва, ул. Техническая, д. 15, ТЦ "Электроник". Вы можете приехать, посмотреть и протестировать технику перед покупкой. Наши консультанты помогут подобрать оптимальный вариант под ваши задачи.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Есть ли у вас доставка в другие города?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Да, мы осуществляем доставку по всей России через службы СДЭК, Boxberry и Почту России. Стоимость и сроки доставки рассчитываются индивидуально при оформлении заказа. Для товаров стоимостью от 50 000 рублей доставка по Москве бесплатна.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faq-section" id="faq-orders">
                    <h2><i class="fas fa-shopping-cart"></i> Заказы и доставка</h2>
                    <div class="faq-list">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Сколько времени занимает доставка?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p><strong>По Москве:</strong> 1-2 рабочих дня<br>
                                    <strong>По Московской области:</strong> 2-3 рабочих дня<br>
                                    <strong>По России:</strong> от 3 до 10 рабочих дней в зависимости от региона<br>
                                    Точные сроки уточняйте у менеджера при оформлении заказа.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Можно ли изменить адрес доставки после оформления заказа?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Да, вы можете изменить адрес доставки до момента отправки заказа. Для этого свяжитесь с нашим менеджером по телефону +7 (495) 123-45-67 или через онлайн-чат. После отправки заказа изменение адреса возможно только через службу доставки.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Как отследить статус моего заказа?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>После оформления заказа вам придет письмо с номером заказа и ссылкой для отслеживания. Также вы можете отслеживать статус в личном кабинете на сайте или связаться с нашим менеджером.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faq-section" id="faq-warranty">
                    <h2><i class="fas fa-shield-alt"></i> Гарантия и возврат</h2>
                    <div class="faq-list">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Какая гарантия на технику?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>На всю технику предоставляется официальная гарантия производителя: 12 месяцев для большинства устройств, 24 месяца для ноутбуков и смартфонов Apple. Гарантийный талон и все необходимые документы вы получите вместе с заказом.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Как произвести возврат товара?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Вы можете вернуть товар в течение 14 дней с момента покупки при условии сохранения товарного вида, упаковки и всех документов. Для возврата свяжитесь с нашим менеджером, и мы подробно объясним процедуру.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Где осуществляется гарантийный ремонт?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Мы сотрудничаем с официальными сервисными центрами всех представленных брендов. При возникновении гарантийного случая вы можете обратиться в любой из авторизованных сервисных центров или к нам - мы поможем организовать ремонт.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faq-section" id="faq-tech">
                    <h2><i class="fas fa-laptop"></i> Техподдержка</h2>
                    <div class="faq-list">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Вы помогаете с настройкой техники?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Да, мы предлагаем услуги по настройке техники. Наши специалисты могут помочь с установкой операционной системы, настройкой программ, переносом данных со старого устройства и другим. Услуга платная, стоимость зависит от сложности работ.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Где найти драйвера для моей модели ноутбука?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Все драйвера доступны на официальных сайтах производителей. Мы также можем отправить вам ссылки на необходимые драйвера - просто напишите нам модель вашего устройства в онлайн-чате или на email.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Что делать, если устройство перегревается?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Перегрев может быть вызван несколькими причинами: запыленность системы охлаждения, высыхание термопасты, интенсивная нагрузка. Рекомендуем сначала проверить систему охлаждения и снизить нагрузку. Если проблема persists, обратитесь в сервисный центр.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="faq-section" id="faq-payment">
                    <h2><i class="fas fa-credit-card"></i> Оплата</h2>
                    <div class="faq-list">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Какие способы оплаты вы принимаете?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Мы принимаем:<br>
                                    • Наличные при получении<br>
                                    • Банковские карты (Visa, MasterCard, МИР)<br>
                                    • Онлайн-платежи (Сбербанк Онлайн, Тинькофф, Альфа-Банк)<br>
                                    • Безналичный расчет для юридических лиц</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Можно ли купить товар в рассрочку?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Да, мы сотрудничаем с несколькими банками и предлагаем рассрочку на 6, 12 и 24 месяца. Условия рассрочки зависят от банка и суммы покупки. Подробности уточняйте у менеджера при оформлении заказа.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3>Безопасны ли онлайн-платежи на вашем сайте?</h3>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Да, все платежи защищены SSL-шифрованием. Мы используем современные системы защиты платежей и не храним данные ваших карт. Для онлайн-оплаты мы сотрудничаем с проверенными платежными системами.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<script>
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

        const faqSections = document.querySelectorAll('.faq-section');
        faqSections.forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(section);
        });

        const faqQuestions = document.querySelectorAll('.faq-question');
        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;
                item.classList.toggle('active');
                faqQuestions.forEach(otherQuestion => {
                    if (otherQuestion !== question) {
                        otherQuestion.parentElement.classList.remove('active');
                    }
                });
            });
        });

        window.addEventListener('scroll', () => {
            const scrollPos = window.scrollY + 250;

            faqSections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                const sectionId = section.getAttribute('id');

                if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                    navItems.forEach(item => {
                        item.classList.remove('active');
                        if (item.getAttribute('href') === `#${sectionId}`) {
                            item.classList.add('active');
                        }
                    });
                }
            });
        });
    });
</script>