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
            [['returning_order_id', 'purchasing_order_id', 'apply_user_id', 'approval_user_id', 'status'], 'integer'],
            [['apply_date', 'expect_returning_date', 'returning_date', 'reason', 'remarks'], 'safe'],
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
        $query = ReturningOrder::find();

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
            'returning_order_id' => $this->returning_order_id,
            'purchasing_order_id' => $this->purchasing_order_id,
            'apply_user_id' => $this->apply_user_id,
            'approval_user_id' => $this->approval_user_id,
            'apply_date' => $this->apply_date,
            'expect_returning_date' => $this->expect_returning_date,
            'returning_date' => $this->returning_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
