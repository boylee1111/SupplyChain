<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ShippingOrder;

/**
 * ShippingOrderSearch represents the model behind the search form about `app\models\ShippingOrder`.
 */
class ShippingOrderSearch extends ShippingOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shipping_order_id', 'apply_user_id', 'approval_user_id', 'product_id', 'quantity', 'depart_depot_id', 'arrival_depot_id', 'status'], 'integer'],
            [['shipping_order_code', 'apply_date', 'expect_depart_date', 'shipping_date', 'expect_arrival_date', 'arrival_date', 'remarks'], 'safe'],
        ];
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
        $query = ShippingOrder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'shipping_order_id' => $this->shipping_order_id,
            'apply_user_id' => $this->apply_user_id,
            'approval_user_id' => $this->approval_user_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'depart_depot_id' => $this->depart_depot_id,
            'arrival_depot_id' => $this->arrival_depot_id,
            'apply_date' => $this->apply_date,
            'expect_depart_date' => $this->expect_depart_date,
            'shipping_date' => $this->shipping_date,
            'expect_arrival_date' => $this->expect_arrival_date,
            'arrival_date' => $this->arrival_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'shipping_order_code', $this->shipping_order_code])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
