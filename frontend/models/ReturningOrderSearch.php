<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReturningOrder;

/**
 * ReturningOrderSearch represents the model behind the search form about `app\models\ReturningOrder`.
 */
class ReturningOrderSearch extends ReturningOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['returning_order_id', 'purchasing_order_id', 'quantity', 'apply_user_id', 'approval_user_id', 'status'], 'integer'],
            [['returning_order_code' ,'apply_date', 'expect_returning_date', 'returning_date', 'reason', 'remarks', 'applyUser.username', 'purchasingOrder.product.primary_name'], 'safe'],
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
        return array_merge(parent::attributes(), ['applyUser.username', 'purchasingOrder.product.primary_name']);
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
        $query = ReturningOrder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['applyUser.username'] = [
            'asc' => ['user.username' => SORT_ASC],
            'desc' => ['user.username' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['purchasingOrder.product.primary_name'] = [
            'asc' => ['product.primary_name' => SORT_ASC],
            'desc' => ['product.primary_name' => SORT_DESC],
        ];

        $query->joinWith(['applyUser', 'purchasingOrder.product']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'returning_order_id' => $this->returning_order_id,
            'purchasing_order_id' => $this->purchasing_order_id,
            'quantity' => $this->quantity,
            'apply_user_id' => $this->apply_user_id,
            'approval_user_id' => $this->approval_user_id,
            'apply_date' => $this->apply_date,
            'expect_returning_date' => $this->expect_returning_date,
            'returning_date' => $this->returning_date,
            'returning_order.status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'returning_order_code', $this->returning_order_code])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'product.primary_name', $this->getAttribute('purchasingOrder.product.primary_name')]);

        return $dataProvider;
    }
}
