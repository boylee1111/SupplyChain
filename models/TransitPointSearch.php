<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransitPoint;

/**
 * TransitPointSearch represents the model behind the search form about `app\models\TransitPoint`.
 */
class TransitPointSearch extends TransitPoint
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transit_point_id', 'status', 'transit_point_type_id'], 'integer'],
            [['serial_number', 'name', 'short_name', 'remarks'], 'safe'],
            [['longitude', 'altitude'], 'number'],
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
        $query = TransitPoint::find();

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
            'transit_point_id' => $this->transit_point_id,
            'longitude' => $this->longitude,
            'altitude' => $this->altitude,
            'status' => $this->status,
            'transit_point_type_id' => $this->transit_point_type_id,
        ]);

        $query->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short_name', $this->short_name])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
