<?php

use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categories app\models\Category[] */

$this->title = 'Все продукты';
?>
<div class="product-index">
        <div class="product-filters">
            <div class="filters-header">
                <h3 class="filters-title">Найти нужный товар</h3>
                <p class="filters-subtitle">Отфильтруйте товары по категориям и отсортируйте <br> по вашему предпочтению</p>
            </div>

            <?php $form = ActiveForm::begin([
                    'method' => 'get',
                    'action' => ['index'],
                    'options' => [
                            'class' => 'filter-form',
                    ],
            ]); ?>

            <div class="filters-grid">
                <div class="filter-group">
                    <div class="filter-label">
                        Категория
                    </div>
                    <?= $form->field($searchModel, 'category_id', [
                            'template' => '{input}',
                            'options' => ['class' => 'filter-field']
                    ])->dropDownList(
                            ArrayHelper::map($categories, 'id', 'name'),
                            [
                                    'prompt' => 'Все категории',
                                    'class' => 'filter-select',
                            ]
                    ) ?>
                </div>
                <div class="filter-group">
                    <div class="filter-label">
                        Сортировка
                    </div>
                    <?= $form->field($searchModel, 'sort', [
                            'template' => '{input}',
                            'options' => ['class' => 'filter-field']
                    ])->dropDownList([
                            '' => 'По умолчанию',
                            'name_asc' => 'Название (А-Я)',
                            'name_desc' => 'Название (Я-А)',
                            'newest' => 'Сначала новые',
                            'oldest' => 'Сначала старые',
                    ], ['class' => 'filter-select']) ?>
                </div>
                <div class="filter-group">
                    <div class="filter-label">
                        Поиск
                    </div>
                    <?= $form->field($searchModel, 'name', [
                            'template' => '{input}',
                            'options' => ['class' => 'filter-field']
                    ])->textInput([
                            'placeholder' => 'Введите название товара...',
                            'class' => 'filter-input',
                    ])->label(false) ?>
                </div>
                <div class="filter-group filter-buttons">
                    <?= Html::submitButton('Применить', [
                            'class' => 'filter-btn filter-btn-apply',
                    ]) ?>
                    <?= Html::a('<span class="btn-icon">↺</span>', ['index'], [
                            'class' => 'filter-btn filter-btn-reset',
                    ]) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <div class="product-count">
            <h3>Всего товаров: <?= $dataProvider->getTotalCount() ?></h3>
        </div>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_product',
            'layout' => "{items}\n{pager}",
            'options' => ['class' => 'top-products-grid'],
            'itemOptions' => ['class' => 'top-product-item'],
            'pager' => [
                'options' => ['class' => 'pagination'],
                'linkOptions' => ['class' => 'page-link'],
                'activePageCssClass' => 'active',
                'disabledPageCssClass' => 'disabled',
            ],
        ]) ?>
</div>

<div class="modal-overlay" id="quickBuyOverlay"></div>
<div class="quick-buy-modal" id="quickBuyModal">
    <div class="modal-header">
        <h3 class="modal-title">Купить в 1 клик</h3>
        <button type="button" class="modal-close" id="closeQuickBuyModal">×</button>
    </div>
    <p class='modal-subtitle'>Менеджер перезвонит вам, узнает все детали и сам оформит заказ на ваше имя.</p>
    <div class="modal-body">

        <div class="product-info">
            <div id="modalProductImage"></div>
            <div class="product-text">
                <h4 id="modalProductName"></h4>
                <p id="modalProductPrice"></p>
            </div>
        </div>
        <div class="product-form">
            <?php
            $orderModel = new \app\models\OrdersForm();

            $form = ActiveForm::begin([
                    'id' => 'quickBuyForm',
                    'action' => ['order/send'],
                    'options' => ['class' => 'quick-buy-form'],
                'fieldConfig' => [
                        'template' => '
                        <div>
                            <div class="d-flex align-items-center justify-content-between">{label} {error}</div>
                            {input}
                        </div>
                        ',
                ]
            ]);
            ?>
            <div class="form-inputs">
                <?= Html::activeHiddenInput($orderModel, 'product_id', ['id' => 'orderProductId']) ?>

                <?= $form->field($orderModel, 'name')->textInput(['autofocus' => true, 'class' => 'quick-buy-input']) ?>
                <?= $form->field($orderModel, 'phone')->widget(MaskedInput::className(), ['mask' => '+7(999)999-99-99'])->textInput(['autofocus' => true, 'class' => 'quick-buy-input']) ?>
                <?= $form->field($orderModel, 'email')->textInput([
                        'class' => 'quick-buy-input',
                ]) ?>
                <?= $form->field($orderModel, 'comment')->textarea(['autofocus' => true, 'class' => 'quick-buy-input']) ?>
            </div>
            <div class="form-actions">
                <?= Html::submitButton('Оформить заказ', [
                        'class' => 'btn btn-primary btn-block',
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filters = document.querySelectorAll('.filter-group');
        filters.forEach((filter, index) => {
            filter.style.opacity = '0';
            filter.style.transform = 'translateY(20px)';
            filter.style.transition = 'opacity 0.5s ease, transform 0.5s ease';

            setTimeout(() => {
                filter.style.opacity = '1';
                filter.style.transform = 'translateY(0)';
            }, 100 * index);
        });
    });

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

        document.querySelectorAll('.top-product-item').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });

    });

    //  один клик

    function showQuickBuyModal(productId, productName, productImage, productPrice) {
        document.getElementById('modalProductName').textContent = productName;
        document.getElementById('orderProductId').value = productId;
        document.getElementById('modalProductImage').style.background = `url(../web/media/${productImage}) no-repeat`;
        document.getElementById('modalProductPrice').textContent = productPrice;

        document.getElementById('quickBuyOverlay').style.display = 'block';
        document.getElementById('quickBuyModal').style.display = 'block';
    }

    function hideQuickBuyModal() {
        document.getElementById('quickBuyOverlay').style.display = 'none';
        document.getElementById('quickBuyModal').style.display = 'none';
    }

    document.getElementById('quickBuyOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            hideQuickBuyModal();
        }
    });

    document.getElementById('closeQuickBuyModal').addEventListener('click', hideQuickBuyModal);
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            hideQuickBuyModal();
        }
    });

    document.querySelectorAll('.quick-buy-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var productId = this.getAttribute('data-product-id');
            var productName = this.getAttribute('data-product-name');
            showQuickBuyModal(productId, productName);
        });
    });

    window.addEventListener('load', function() {
        <?php if (Yii::$app->session->hasFlash('orderSuccess')): ?>
        alert("<?= str_replace(["\r", "\n"], ['', '\\n'], Yii::$app->session->getFlash('orderSuccess')) ?>");
        <?php endif; ?>

        <?php if (Yii::$app->session->hasFlash('orderErrors') && Yii::$app->session->hasFlash('orderData')): ?>
        <?php
        $orderData = Yii::$app->session->getFlash('orderData');
        $product = \app\models\Product::findOne($orderData['product_id'] ?? null);
        ?>
        showQuickBuyModal('<?= $orderData['product_id'] ?? '' ?>', '<?= $product ? addslashes($product->name) : '' ?>');
        <?php endif; ?>
    });
</script>