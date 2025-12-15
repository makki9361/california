<?php

use yii\helpers\Html;

$this->title = 'Заказ #' . $model->id;
?>
<div class="orders-view">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="mb-0">
                <?= Html::encode($this->title) ?>
            </h4>
            <span class="mb-0 pb-0"><?= date('d.m.Y H:i', strtotime($model->created_at)) ?></span>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="info-card">
                        <h5>Информация о клиенте</h5>
                        <div class="info-content">
                            <p>Имя: <?= Html::encode($model->name) ?></p>
                            <p>Email: <?= Html::mailto($model->email, $model->email) ?></p>
                            <p>Телефон: <?= Html::a($model->phone, 'tel:' . $model->phone) ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-card">
                        <h5>Информация о заказе</h5>
                        <div class="info-content">
                            <p>ID заказа:<span class="badge badge-primary">#<?= $model->id ?></span></p>
                            <p>Товар:
                                    <span ><?= $productsList[$model->product_id] ?></span>
                            </p>
                    </div>
                </div>
            </div>

            <?php if (!empty($model->comment)): ?>
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="info-card">
                            <h5>Комментарий клиента</h5>
                            <div class="comment-box">
                                <?= nl2br(Html::encode($model->comment)) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="card-footer">
            <div class="btn-toolbar justify-content-between" role="toolbar">
                <div class="btn-group">
                    <?= Html::a('Назад к списку', ['orders'], [
                            'class' => 'btn btn-primary'
                    ]) ?>
                </div>
                <div class="btn-group">
                    <?= Html::a('<i class="fas fa-pen"></i>', ['update-order', 'id' => $model->id], [
                            'class' => 'btn btn-primary'
                    ]) ?>
                    <?= Html::a('<i class="fas fa-trash"></i>', ['delete-order', 'id' => $model->id], [
                            'class' => 'btn btn-primary ml-2',
                            'data' => [
                                    'confirm' => 'Вы уверены, что хотите удалить этот заказ?',
                                    'method' => 'post',
                            ],
                    ]) ?>
                    <?= Html::a('<i class="fas fa-print"></i>', ['#'], [
                            'class' => 'btn btn-primary ml-2',
                            'onclick' => 'window.print(); return false;'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>