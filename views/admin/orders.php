<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Управление заказами';
?>
<div class="orders-index">
    <div class="d-flex justify-content-between mb-4">
        <h2 class="admin-title-1"><?= Html::encode($this->title) ?></h2>
        <?= Html::a('Создать заказ', ['create'], [
                'class' => 'btn btn-primary d-flex justify-content-around align-items-center px-4',
                'title' => 'Создать новый заказ'
        ]) ?>
    </div>

    <?php Pjax::begin(['timeout' => 5000]); ?>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'tableOptions' => ['class' => 'table table-hover mb-0'],
                        'layout' => "{items}\n<div class='p-3'>{summary}\n{pager}</div>",
                        'pager' => [
                                'options' => ['class' => 'pagination justify-content-center'],
                                'linkOptions' => ['class' => 'page-link'],
                                'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link disabled'],
                        ],
                        'columns' => [
                                [
                                        'attribute' => 'id',
                                        'headerOptions' => ['width' => '80', 'style' => 'text-align: center;'],
                                        'contentOptions' => ['style' => 'font-weight: bold; text-align: center;'],
                                        'header' => '№',
                                ],
                                [
                                        'attribute' => 'name',
                                        'header' => 'Имя',
                                        'format' => 'raw',
                                        'value' => function($model) {
                                            return Html::a(Html::encode($model->name), ['view-order', 'id' => $model->id], [
                                                    'class' => 'font-weight-bold',
                                                    'title' => 'Просмотр деталей'
                                            ]);
                                        }
                                ],
                                [
                                        'attribute' => 'email',
                                        'header' => 'Почта',
                                        'format' => 'email',
                                        'contentOptions' => ['class' => 'text-nowrap'],
                                ],
                                [
                                        'attribute' => 'phone',
                                        'header' => 'Телефон',
                                        'format' => 'raw',
                                        'value' => function($model) {
                                            return Html::encode($model->phone);
                                        }
                                ],
                                [
                                        'attribute' => 'product_id',
                                        'header' => 'Товар',
                                        'value' => function($model) {
                                            if ($model->product) {
                                                return Html::encode($model->product->name);
                                            }
                                            return '<span class="badge badge-warning">Товар #' . $model->product_id . '</span>';
                                        },
                                        'format' => 'raw',
                                        'contentOptions' => ['style' => 'max-width: 200px;'],
                                ],
                                [
                                        'attribute' => 'created_at',
                                        'label' => 'Дата создания',
                                        'header' => 'Дата создания',
                                        'format' => ['datetime', 'php:d.m.Y H:i'],
                                        'headerOptions' => ['width' => '150'],
                                        'contentOptions' => ['class' => 'text-nowrap'],
                                ],
                                [
                                        'attribute' => 'comment',
                                        'header' => 'Комментарий к заказу',
                                        'format' => 'raw',
                                        'value' => function($model) {
                                            if (empty($model->comment)) {
                                                return '<span class="text-muted">—</span>';
                                            }
                                            $shortComment = mb_strlen($model->comment) > 50
                                                    ? mb_substr($model->comment, 0, 50) . '...'
                                                    : $model->comment;
                                            return '<span title="' . Html::encode($model->comment) . '" data-toggle="tooltip">'
                                                    . Html::encode($shortComment) . '</span>';
                                        },
                                        'headerOptions' => ['width' => '200'],
                                ],
                                [
                                        'class' => 'yii\grid\ActionColumn',
                                        'header' => 'Действия',
                                        'headerOptions' => [
                                                'width' => '180',
                                                'style' => 'text-align: center; background-color: #f8f9fa;'
                                        ],
                                        'contentOptions' => [
                                                'style' => 'text-align: center; white-space: nowrap;',
                                                'class' => 'action-column'
                                        ],
                                        'template' => '<div class="btn-group btn-group-sm">{view-order}{update-order}{delete}</div>',
                                        'buttons' => [
                                                'view-order' => function ($url, $model) {
                                                    return Html::a(
                                                            '<i class="fa-solid fa-file"></i>',
                                                            $url,
                                                            [
                                                                    'class' => 'btn btn-primary btn-sm',
                                                                    'title' => 'Просмотр деталей заказа',
                                                                    'data-toggle' => 'tooltip',
                                                            ]
                                                    );
                                                },
                                                'update-order' => function ($url, $model) {
                                                    return Html::a(
                                                            '<i class="fa-solid fa-pen"></i>',
                                                            $url,
                                                            [
                                                                    'class' => 'btn btn-primary btn-sm mx-1',
                                                                    'title' => 'Редактировать заказ',
                                                                    'data-toggle' => 'tooltip',
                                                            ]
                                                    );
                                                },
                                                'delete' => function ($url, $model) {
                                                    return Html::a(
                                                            '<i class="fa-solid fa-trash"></i>',
                                                            $url,
                                                            [
                                                                    'class' => 'btn btn-primary btn-sm',
                                                                    'title' => 'Удалить заказ',
                                                                    'data-toggle' => 'tooltip',
                                                                    'data-confirm' => 'Вы уверены, что хотите удалить заказ #' . $model->id . '?',
                                                                    'data-method' => 'post',
                                                            ]
                                                    );
                                                },
                                        ],
                                ],
                        ],
                        'rowOptions' => function ($model, $key, $index, $grid) {
                            return [
                                    'id' => 'order-' . $model->id,
                                    'class' => $index % 2 ? 'odd' : 'even'
                            ];
                        },
                ]); ?>
            </div>
        </div>
    </div>

    <?php Pjax::end(); ?>
</div>

<?php
$this->registerJs('
    $(function () {
        $(\'[data-toggle="tooltip"]\').tooltip();
    });
');
?>