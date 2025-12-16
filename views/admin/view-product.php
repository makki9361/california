<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Продукт: ' . $model->name;
?>
    <div class="products-view d-flex justify-content-between">
        <div class="card">
            <div class="admin-card-header">
                <h4 class="mb-0">
                    <?= Html::encode($this->title) ?>
                </h4>
                <div class="d-flex gap-3">
                    <span>Время создания: <?= date('d.m.Y H:i', strtotime($model->created_at ?? 'now')) ?></span>
                    <span>ID: <?= $model->id ?></span>
                </div>
            </div>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="info-card mb-4">
                        <div class="info-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="admin-title">Название:<br>
                                        <span class="admin-sub-text"><?= Html::encode($model->name) ?></span></p>

                                    <p class="admin-title">Категория:<br>
                                        <?php if ($model->category): ?>
                                            <span class="admin-sub-text"><?= Html::encode($model->category->name) ?></span>
                                        <?php else: ?>
                                            <span class="admin-title">Без категории</span>
                                        <?php endif; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="admin-title">Цена:<br>
                                        <span class="admin-sub-text"><?= Html::encode($model->price) ?> РУБ.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($model->description)): ?>
                        <div class="info-card">
                            <h5 class="admin-title">Описание продукта</h5>
                            <div class="admin-sub-text">
                                <?= nl2br(Html::encode($model->description)) ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="product-btn-toolbar justify-content-between">
                <div class="btn-group-1">
                    <?= Html::a('Назад к списку', ['products'], [
                            'class' => 'btn btn-primary',
                            'style' => 'white-space: nowrap; width: fit-content !important; padding: 13px !important;'
                    ]) ?>
                </div>
                <div class="btn-group-2">
                    <?= Html::a('<i class="fas fa-pen"></i>', ['update-product', 'id' => $model->id], [
                            'class' => 'btn btn-primary'
                    ]) ?>
                    <?= Html::a('<i class="fas fa-trash"></i>', ['delete-product', 'id' => $model->id], [
                            'class' => 'btn btn-primary ml-2',
                            'data' => [
                                    'confirm' => 'Вы уверены, что хотите удалить продукт "' . $model->name . '"?',
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

        <div class="admin-product-image">
            <h5 class="mx-3 my-2">Изображение продукта</h5>
            <div class="product-info-content text-center">
                <?php if ($model->image): ?>
                    <div class="product-image-container">
                        <?= Html::img(Yii::getAlias("@web") . '/media/' . $model->image, [
                                'alt' => $model->name,
                                'class' => 'img-fluid rounded shadow',
                                'style' => 'max-height: 70vh; cursor: pointer;',
                                'data-toggle' => 'modal',
                                'data-target' => '#imageModal',
                                'title' => 'Кликните для увеличения'
                        ]) ?>
                    </div>
                <?php else: ?>
                    <div class="no-image text-center py-4">
                        <i class="fa-solid fa-image fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Изображение отсутствует</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modal для увеличенного изображения -->
<?php if ($model->image && file_exists($model->image)): ?>
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= Html::encode($model->name) ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center p-0">
                    <?= Html::img('/' . $model->image, [
                            'alt' => $model->name,
                            'class' => 'img-fluid'
                    ]) ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
