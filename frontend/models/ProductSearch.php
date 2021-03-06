<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_type_id', 'currency_id', 'client_id', 'supplier_id'], 'integer'],
            [['serial_number', 'primary_name', 'secondary_name', 'short_name', 'remarks', 'productType.product_type_name'], 'safe'],
            [['length', 'width', 'height', 'volume', 'weight', 'amount', 'minimum_stock', 'maximum_stock'], 'number'],
            [['is_broken'], 'boolean'],
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), ['productType.product_type_name']);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
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
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['productType.product_type_name'] = [
            'asc' => ['product_type.product_type_name' => SORT_ASC],
            'desc' => ['product_type.product_type_name' => SORT_DESC],
        ];

        $query->joinWith(['productType']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'product_id' => $this->product_id,
            'product_type_id' => $this->product_type_id,
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'volume' => $this->volume,
            'weight' => $this->weight,
            'amount' => $this->amount,
            'is_broken' => $this->is_broken,
            'currency_id' => $this->currency_id,
            'minimum_stock' => $this->minimum_stock,
            'maximum_stock' => $this->maximum_stock,
            'client_id' => $this->client_id,
            'supplier_id' => $this->supplier_id,
        ]);

        $query->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'primary_name', $this->primary_name])
            ->andFilterWhere(['like', 'secondary_name', $this->secondary_name])
            ->andFilterWhere(['like', 'short_name', $this->short_name])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'product_type.product_type_name', $this->getAttribute('productType.product_type_name')]);

        return $dataProvider;
    }
}
