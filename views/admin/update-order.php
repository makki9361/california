<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Редактировать заказ #' . $model->id;
?>
    <div class="orders-update">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><?= Html::encode($this->title) ?></h4>
                <?= Yii::$app->formatter->asDatetime($model->created_at, 'dd.MM.yyyy HH:mm') ?>
            </div>

            <div class="card-body">
                <div class="orders-form">
                    <?php $form = ActiveForm::begin([
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                    'template' => "{label}\n{input}\n{hint}\n{error}",
                                    'labelOptions' => ['class' => 'control-label col-md-3'],
                            ],
                    ]); ?>

                    <div class="form-group row">
                        <?= $form->field($model, 'product_id', [
                                'template' => "{label}\n{input}\n{hint}\n{error}",
                        ])->dropDownList(
                                $productsList,
                                [
                                        'prompt' => '-- Выберите товар --',
                                        'class' => 'form-control select2'
                                ]
                        ) ?>
                    </div>

                    <div class="form-group row">
                        <?= $form->field($model, 'name')->textInput([
                                'maxlength' => true,
                                'class' => 'form-control',
                                'placeholder' => 'Введите имя клиента'
                        ]) ?>
                    </div>

                    <div class="form-group row">
                        <?= $form->field($model, 'comment')->textarea([
                                'rows' => 4,
                                'class' => 'form-control',
                                'placeholder' => 'Введите комментарий клиента'
                        ]) ?>
                    </div>

                    <div class="form-group row">
                        <?= $form->field($model, 'phone')->textInput([
                                'maxlength' => true,
                                'class' => 'form-control',
                                'placeholder' => '+7 (999) 999-99-99'
                        ]) ?>
                    </div>

                    <div class="form-group row">
                        <?= $form->field($model, 'email')->textInput([
                                'maxlength' => true,
                                'type' => 'email',
                                'class' => 'form-control',
                                'placeholder' => 'client@example.com'
                        ]) ?>
                    </div>

                    <div class="form-group row">
                        <div class="btn-group" role="group">
                            <?= Html::submitButton('Сохранить изменения', [
                                    'class' => 'btn btn-primary'
                            ]) ?>
                            <?= Html::a('Отмена', ['view-order', 'id' => $model->id], [
                                    'class' => 'btn btn-primary'
                            ]) ?>
                            <?= Html::a('Удалить', ['delete-order', 'id' => $model->id], [
                                    'class' => 'btn btn-primary',
                                    'data' => [
                                            'confirm' => 'Вы уверены, что хотите удалить этот заказ?',
                                            'method' => 'post',
                                    ],
                            ]) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>