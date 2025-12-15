<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "california_product".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string $image
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'category_id' => 'Категория',
            'image' => 'Изображение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public static function getProductsList()
    {
        $products = self::find()
            ->select(['id', 'name', 'price'])
            ->orderBy(['name' => SORT_ASC])
            ->asArray()
            ->all();

        $list = [];
        foreach ($products as $product) {
            $list[$product['id']] = $product['name'] . ' ($' . $product['price'] . ')';
        }

        return $list;
    }
}