<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class OrdersForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }

    public function rules()
    {
        return [
            [['product_id', 'name', 'phone', 'email'], 'required'],
            [['product_id'], 'integer'],
            [['name', 'comment', 'phone', 'email'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'safe'],
            ['email', 'email'],
            ['phone', 'match', 'pattern' => '/^[\d\s\-\+\(\)]+$/', 'message' => 'Телефон может содержать только цифры, пробелы и знаки +-()'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Товар',
            'name' => 'Имя клиента',
            'comment' => 'Комментарий',
            'phone' => 'Телефон',
            'email' => 'Email',
            'created_at' => 'Дата создания',
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
    public function getProductName()
    {
        if ($this->product_id && $this->product) {
            return $this->product->name . ' ($' . $this->product->price . ')';
        }
        return 'Не выбран';
    }
}