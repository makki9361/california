<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Редактировать продукт: ' . $model->name;
?>
    <div class="products-update">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
                <span class="mb-0">ID: <?= $model->id ?></span>
            </div>

            <div class="card-body">
                <div class="products-form">
                    <?php $form = ActiveForm::begin([
                            'options' => [
                                    'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data'
                            ],
                            'fieldConfig' => [
                                    'template' => "{label}\n{input}\n{hint}\n{error}",
                                    'labelOptions' => ['class' => 'control-label col-md-3'],
                            ],
                    ]); ?>

                    <div class="form-group row">
                        <?= $form->field($model, 'name', [
                                'template' => "{label}\n{input}\n{hint}\n{error}",
                        ])->textInput([
                                'maxlength' => true,
                                'class' => 'form-control',
                                'placeholder' => 'Введите название продукта'
                        ]) ?>
                    </div>

                    <div class="form-group row">
                        <?= $form->field($model, 'category_id', [
                                'template' => "{label}\n{input}\n{hint}\n{error}",
                        ])->dropDownList(
                                $categories,
                        ) ?>
                    </div>

                    <div class="form-group row">
                        <?= $form->field($model, 'price', [
                                'template' => "{label}\n{input}\n{hint}\n{error}",
                        ])->textInput([
                                'maxlength' => true,
                                'class' => 'form-control',
                                'placeholder' => 'Введите цену (например: 99.99)'
                        ]) ?>
                    </div>

                    <div class="form-group row">
                        <?= $form->field($model, 'description', [
                                'template' => "{label}\n{input}\n{hint}\n{error}",
                        ])->textarea([
                                'rows' => 6,
                                'class' => 'form-control',
                                'placeholder' => 'Введите описание продукта'
                        ]) ?>
                    </div>

                    <div class="form-group row">
                        <?= $form->field($model, 'imageFile', [
                                'template' => "{label}\n{input}\n{hint}\n{error}",
                        ])->fileInput([
                                'class' => 'form-control-file rounded-0'
                        ])->hint('Оставьте пустым, чтобы сохранить текущее изображение') ?>
                    </div>

                    <?php if ($model->image && file_exists($model->image)): ?>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Текущее изображение:</label>
                            <div class="col-md-9">
                                <div class="current-image-container mb-2">
                                    <?= Html::img('/' . $model->image, [
                                            'alt' => $model->name,
                                            'class' => 'img-thumbnail',
                                            'style' => 'max-height: 150px; cursor: pointer;',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#imagePreviewModal'
                                    ]) ?>
                                </div>
                                <div class="text-muted small">
                                    <i class="fa-solid fa-image mr-1"></i>
                                    Кликните для увеличения
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group row">
                    <div class="col-md-9 offset-md-3">
                        <div class="btn-group" role="group">
                            <?= Html::submitButton('<i class="fas fa-save mr-1"></i> Сохранить изменения', [
                                    'class' => 'btn btn-primary'
                            ]) ?>
                            <?= Html::a('<i class="fas fa-times mr-1"></i> Отмена', ['view-product', 'id' => $model->id], [
                                    'class' => 'btn btn-primary ml-2'
                            ]) ?>
                            <?= Html::a('<i class="fas fa-trash mr-1"></i> Удалить', ['delete-product', 'id' => $model->id], [
                                    'class' => 'btn btn-primary ml-2',
                                    'data' => [
                                            'confirm' => 'Вы уверены, что хотите удалить продукт "' . $model->name . '"?',
                                            'method' => 'post',
                                    ],
                            ]) ?>
                        </div>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

<?php if ($model->image && file_exists($model->image)): ?>
    <!-- Modal для предпросмотра изображения -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Просмотр изображения</h5>
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