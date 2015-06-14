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
            [['shipping_order_code', 'apply_date', 'expect_depart_date', 'shipping_date', 'expect_arrival_date', 'arrival_date', 'remarks', 'applyUser.username', 'product.primary_name', 'departDepot.name', 'arrivalDepot.name'], 'safe'],
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

    public function attributes()
    {
        return array_merge(parent::attributes(), ['applyUser.username', 'product.primary_name', 'departDepot.name', 'arrivalDepot.name']);
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

        $dataProvider->sort->attributes['applyUser.username'] = [
            'asc' => ['user.username' => SORT_ASC],
            'desc' => ['user.username' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['product.primary_name'] = [
            'asc' => ['product.primary_name' => SORT_ASC],
            'desc' => ['product.primary_name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['departDepot.name'] = [
            'asc' => ['depot.name' => SORT_ASC],
            'desc' => ['depot.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['arrivalDepot.name'] = [
            'asc' => ['depot.name' => SORT_ASC],
            'desc' => ['depot.name' => SORT_DESC],
        ];

        $query->joinWith(['applyUser', 'product', 'departDepot']);

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
            'shipping_order.status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'shipping_order_code', $this->shipping_order_code])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'user.username', $this->getAttribute('applyUser.username')])
            ->andFilterWhere(['like', 'product.primary_name', $this->getAttribute('product.primary_name')])
            ->andFilterWhere(['like', 'depot.name', $this->getAttribute('departDepot.name')])
            ->andFilterWhere(['like', 'depot.name', $this->getAttribute('arrivalDepot.name')]);

        return $dataProvider;
    }
}
