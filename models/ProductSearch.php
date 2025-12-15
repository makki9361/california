<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    public $sort;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['name', 'image', 'sort'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find()->joinWith('category');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'product.name', $this->name])
            ->andFilterWhere(['like', 'image', $this->image]);

        if ($this->sort) {
            switch ($this->sort) {
                case 'name_asc':
                    $query->orderBy(['product.name' => SORT_ASC]);
                    break;
                case 'name_desc':
                    $query->orderBy(['product.name' => SORT_DESC]);
                    break;
                case 'newest':
                    $query->orderBy(['product.id' => SORT_DESC]);
                    break;
                case 'oldest':
                    $query->orderBy(['product.id' => SORT_ASC]);
                    break;
            }
        } else {
            $query->orderBy(['product.id' => SORT_DESC]);
        }

        return $dataProvider;
    }
}