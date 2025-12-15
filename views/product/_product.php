<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $model app\models\Product */
/* @var $this yii\web\View */
?>
<div class="top-product-image">
    <?= Html::img(Yii::getAlias('@web') . '/media/' . $model->image, ['alt' => 'arrow'])?>
</div>
<div class="top-product-info">
    <h3 class="top-product-name"><?= $model->name?></h3>
    <p class="top-product-desc">
        <?= $model->description?>
    </p>
    <div class="top-product-pricing">
        <span class="top-product-price">₽ <?= $model->price?></span>
        <button type="button"
                class="btn btn-primary btn-sm quick-buy-btn"
                data-product-id="<?= $model->id ?>"
                data-product-name="<?= Html::encode($model->name) ?>"
                data-product-image="<?= Html::encode($model->image) ?>"
                data-product-price="<?= Html::encode($model->price) ?>">
            Купить в 1 клик
        </button>
    </div>
</div>
<?php
$this->registerJs("
    $(document).ready(function() {
        $('.quick-buy-btn[data-product-id=\"".$model->id."\"]').on('click', function() {
            var productId = $(this).data('product-id');
            var productName = $(this).data('product-name');
            var productImage = $(this).data('product-image');
            var productPrice = $(this).data('product-price');
            
            // Показываем модальное окно
            showQuickBuyModal(productId, productName, productImage, productPrice);
        });
    });
", View::POS_READY);
?>