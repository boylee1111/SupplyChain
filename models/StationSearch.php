<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Station;

/**
 * StationSearch represents the model behind the search form about `app\models\Station`.
 */
class StationSearch extends Station
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['station_id', 'status', 'station_type_id', 'road_section_id', 'vendor_id'], 'integer'],
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
        $query = Station::find();

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
            'station_id' => $this->station_id,
            'longitude' => $this->longitude,
            'altitude' => $this->altitude,
            'status' => $this->status,
            'station_type_id' => $this->station_type_id,
            'road_section_id' => $this->road_section_id,
            'vendor_id' => $this->vendor_id,
        ]);

        $query->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short_name', $this->short_name])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
