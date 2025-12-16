<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Управление продуктами';
?>
    <div class="products-index">
        <div class="d-flex justify-content-between mb-4">
            <h2 class="admin-title-1"><?= Html::encode($this->title) ?></h2>
            <?= Html::a('Добавить продукт', ['create-product'], [
                    'class' => 'btn btn-primary d-flex justify-content-around align-items-center px-4',
                    'title' => 'Добавить новый продукт'
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
                                            'header' => 'ID',
                                    ],
                                    [
                                            'attribute' => 'name',
                                            'header' => 'Название',
                                            'format' => 'raw',
                                            'value' => function($model) {
                                                return Html::a(Html::encode($model->name), ['view-product', 'id' => $model->id], [
                                                        'class' => 'font-weight-bold',
                                                        'title' => 'Просмотр деталей продукта'
                                                ]);
                                            }
                                    ],
                                    [
                                            'attribute' => 'category_id',
                                            'header' => 'Категория',
                                            'value' => function($model) {
                                                return $model->category ? Html::encode($model->category->name) :
                                                        '<span class="badge badge-warning">Без категории</span>';
                                            },
                                            'format' => 'raw',
                                    ],
                                    [
                                            'attribute' => 'price',
                                            'header' => 'Цена',
                                            'format' => 'raw',
                                            'value' => function($model) {
                                                return '<span class="font-weight-bold">$' . Html::encode($model->price) . '</span>';
                                            },
                                            'contentOptions' => ['class' => 'text-nowrap'],
                                            'headerOptions' => ['width' => '100'],
                                    ],
                                    [
                                            'attribute' => 'image',
                                            'header' => 'Изображение',
                                            'format' => 'raw',
                                            'value' => function($model) {
                                                if ($model->image) {
                                                    return Html::img(Yii::getAlias('@web') . '/media/' . $model->image, [
                                                            'alt' => $model->name,
                                                            'class' => 'img-thumbnail',
                                                            'style' => 'width: 60px; height: 60px; object-fit: cover;',
                                                            'title' => 'Просмотр изображения',
                                                            'data-toggle' => 'tooltip'
                                                    ]);
                                                }
                                                return '<span class="text-muted">Нет изображения</span>';
                                            },
                                            'contentOptions' => ['style' => 'text-align: center;'],
                                            'headerOptions' => ['width' => '100'],
                                    ],
                                    [
                                            'attribute' => 'description',
                                            'header' => 'Описание',
                                            'format' => 'raw',
                                            'value' => function($model) {
                                                if (empty($model->description)) {
                                                    return '<span class="text-muted">—</span>';
                                                }
                                                $shortDescription = mb_strlen($model->description) > 100
                                                        ? mb_substr($model->description, 0, 100) . '...'
                                                        : $model->description;
                                                return '<span title="' . Html::encode($model->description) . '" data-toggle="tooltip">'
                                                        . Html::encode($shortDescription) . '</span>';
                                            },
                                            'headerOptions' => ['width' => '250'],
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
                                            'template' => '<div class="btn-group btn-group-sm">{view}{update}{delete}</div>',
                                            'buttons' => [
                                                    'view' => function ($url, $model) {
                                                        return Html::a(
                                                                '<i class="fa-solid fa-eye"></i>',
                                                                ['view-product', 'id' => $model->id],
                                                                [
                                                                        'class' => 'btn btn-primary btn-sm',
                                                                        'title' => 'Просмотр продукта',
                                                                        'data-toggle' => 'tooltip',
                                                                ]
                                                        );
                                                    },
                                                    'update' => function ($url, $model) {
                                                        return Html::a(
                                                                '<i class="fa-solid fa-pen"></i>',
                                                                ['update-product', 'id' => $model->id],
                                                                [
                                                                        'class' => 'btn btn-primary btn-sm mx-1',
                                                                        'title' => 'Редактировать продукт',
                                                                        'data-toggle' => 'tooltip',
                                                                ]
                                                        );
                                                    },
                                                    'delete' => function ($url, $model) {
                                                        return Html::a(
                                                                '<i class="fa-solid fa-trash"></i>',
                                                                ['delete-product', 'id' => $model->id],
                                                                [
                                                                        'class' => 'btn btn-primary btn-sm',
                                                                        'title' => 'Удалить продукт',
                                                                        'data-toggle' => 'tooltip',
                                                                        'data-confirm' => 'Вы уверены, что хотите удалить продукт "' . $model->name . '"?',
                                                                        'data-method' => 'post',
                                                                ]
                                                        );
                                                    },
                                            ],
                                    ],
                            ],
                            'rowOptions' => function ($model, $key, $index, $grid) {
                                return [
                                        'id' => 'product-' . $model->id,
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
        
        // просомтр изображения
        $(\'.img-thumbnail\').on(\'click\', function() {
            var src = $(this).attr(\'src\');
            var modal = \'<div class="modal fade" id="imageModal" tabindex="-1" role="dialog">\' +
                        \'<div class="modal-dialog modal-dialog-centered" role="document">\' +
                        \'<div class="modal-content">\' +
                        \'<div class="modal-image-body text-center">\' +
                        \'<img src="\' + src + \'" class="img-fluid" style="max-height: 90vh; width: 100%;object-fit: cover;">\' +
                        \'</div>\' +
                        \'</div>\' +
                        \'</div>\' +
                        \'</div>\';
            $(\'body\').append(modal);
            $(\'#imageModal\').modal(\'show\');
            $(\'#imageModal\').on(\'hidden.bs.modal\', function () {
                $(this).remove();
            });
        });
    });
');
?>