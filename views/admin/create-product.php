<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Добавить продукт';
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['products']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0 admin-title-1"><?= Html::encode($this->title) ?></h4>
        </div>

        <div class="card-body">
            <div class="orders-form">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <div class="form-group row">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="form-group row">
                    <?= $form->field($model, 'category_id')->dropDownList($categories, ['placeholder' => 'Выберите категорию...'],) ?>
                </div>

                <div class="form-group row">
                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="form-group row">
                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                </div>

                <div class="form-group row">
                    <?= $form->field($model, 'imageFile')->fileInput(['class' => 'rounded-0']) ?>
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