<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Создать новый заказ';
?>
    <div class="orders-create">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0 admin-title-1"><?= Html::encode($this->title) ?></h4>
            </div>

            <div class="card-body">
                <div class="orders-form">
                    <?php $form = ActiveForm::begin([
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                    'template' => "{input}\n{hint}\n{error}",
                                    'labelOptions' => ['class' => 'control-label col-md-3'],
                            ],
                    ]); ?>

                    <div class="form-group row">
                        <?= $form->field($model, 'product_id', [
                                'template' => "{input}\n{hint}\n{error}",
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
                                'placeholder' => 'Введите имя клиента',
                                'required' => true
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
                        <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '+7 999 999-99-99'])->textInput([
                                'maxlength' => true,
                                'class' => 'form-control',
                                'placeholder' => '+7 (999) 999-99-99',
                                'required' => true
                        ]) ?>
                    </div>

                    <div class="form-group row">
                        <?= $form->field($model, 'email')->textInput([
                                'maxlength' => true,
                                'type' => 'email',
                                'class' => 'form-control',
                                'placeholder' => 'client@example.com',
                                'required' => true
                        ]) ?>
                    </div>

                    <div class="form-group row">
                        <div class="btn-group" role="group">
                            <?= Html::submitButton('Создать заказ', [
                                    'class' => 'btn btn-primary'
                            ]) ?>
                            <?= Html::a('Отмена', ['orders'], [
                                    'class' => 'btn btn-primary'
                            ]) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>