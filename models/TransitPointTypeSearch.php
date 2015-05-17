<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransitPointType;

/**
 * TransitPointTypeSearch represents the model behind the search form about `app\models\TransitPointType`.
 */
class TransitPointTypeSearch extends TransitPointType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transit_point_type_id'], 'integer'],
            [['transit_point_type_name'], 'safe'],
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
        $query = TransitPointType::find();

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
            'transit_point_type_id' => $this->transit_point_type_id,
        ]);

        $query->andFilterWhere(['like', 'transit_point_type_name', $this->transit_point_type_name]);

        return $dataProvider;
    }
}
