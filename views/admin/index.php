<?php
$this->title = 'Админ-панель';
?>
<div class="admin-index">
    <h1 style="font-family: 'Jost', sans-serif">Добро пожаловать в админ-панель</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-body d-flex flex-column gap-2">
                    <p>Просмотр, редактирование и удаление заказов</p>
                    <a href="<?= \yii\helpers\Url::to(['admin/orders']) ?>" class="btn btn-primary">
                        Перейти к заказам
                    </a>
                    <a href="<?= \yii\helpers\Url::to(['admin/products']) ?>" class="btn btn-primary">
                        Перейти к продуктам
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
