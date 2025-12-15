<?php
/**
 * @var app\models\OrdersForm $order
 * @var app\models\Product $product
 */
?>
<div class="container">
    <div class="header">
        <h2>Вы оформили заявку на товар: <?= $productName ?>. Номер заявки #<?= $order->id ?></h2>
        <p>Дата создания: <?= Yii::$app->formatter->asDatetime($order->created_at) ?></p>
    </div>

    <div class="field d-flex flex-row">
        <div class="label">Имя:</div>
        <div class="value"><?= htmlspecialchars($order->name) ?></div>
    </div>

    <div class="field d-flex flex-row">
        <div class="label">Телефон:</div>
        <div class="value"><?= htmlspecialchars($order->phone) ?></div>
    </div>

    <div class="field d-flex flex-row">
        <div class="label">Email:</div>
        <div class="value"><?= htmlspecialchars($order->email) ?></div>
    </div>

    <div class="field d-flex flex-row">
        <div class="label">Комментарий:</div>
        <div class="value"><?= nl2br(htmlspecialchars($order->comment)) ?></div>
    </div>

    <?php if ($order->product_id): ?>
        <div class="field d-flex flex-row">
            <div class="label">ID товара:</div>
            <div class="value"><?= $order->product_id ?></div>
        </div>
    <?php endif; ?>

    <hr>
    <p><small>Это письмо было отправлено автоматически. Пожалуйста, не отвечайте на него.</small></p>
</div>
