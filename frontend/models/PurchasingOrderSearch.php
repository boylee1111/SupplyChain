<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PurchasingOrder;

/**
 * PurchasingOrderSearch represents the model behind the search form about `app\models\PurchasingOrder`.
 */
class PurchasingOrderSearch extends PurchasingOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchasing_order_id', 'apply_user_id', 'approval_user_id', 'product_id', 'quantity', 'destination_depot_id', 'status'], 'integer'],
            [['purchasing_order_code', 'apply_date', 'expect_arrival_date', 'arrival_date', 'remarks', 'applyUser.username', 'product.primary_name', 'destinationDepot.name'], 'safe'],
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
        return array_merge(parent::attributes(), ['applyUser.username', 'product.primary_name', 'destinationDepot.name']);
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
        $query = PurchasingOrder::find();

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

        $dataProvider->sort->attributes['destinationDepot.name'] = [
            'asc' => ['depot.name' => SORT_ASC],
            'desc' => ['depot.name' => SORT_DESC],
        ];

        $query->joinWith(['applyUser', 'product', 'destinationDepot']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'purchasing_order_id' => $this->purchasing_order_id,
            'apply_user_id' => $this->apply_user_id,
            'approval_user_id' => $this->approval_user_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'destination_depot_id' => $this->destination_depot_id,
            'apply_date' => $this->apply_date,
            'expect_arrival_date' => $this->expect_arrival_date,
            'arrival_date' => $this->arrival_date,
            'purchasing_order.status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'purchasing_order_code', $this->purchasing_order_code])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'user.username', $this->getAttribute('applyUser.username')])
            ->andFilterWhere(['like', 'product.primary_name', $this->getAttribute('product.primary_name')])
            ->andFilterWhere(['like', 'depot.name', $this->getAttribute('destinationDepot.name')]);

        return $dataProvider;
    }
}
