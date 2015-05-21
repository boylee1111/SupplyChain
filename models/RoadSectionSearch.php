<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RoadSection;

/**
 * RoadSectionSearch represents the model behind the search form about `app\models\RoadSection`.
 */
class RoadSectionSearch extends RoadSection
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['road_section_id', 'road_section_type_id'], 'integer'],
            [['serial_number', 'road_section_name', 'remarks'], 'safe'],
            [['time_cost', 'basic_cost', 'volume_based_cost', 'weight_based_cost', 'minimum_volume_limit', 'maximum_volume_limit'], 'number'],
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
        $query = RoadSection::find();

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
            'road_section_id' => $this->road_section_id,
            'time_cost' => $this->time_cost,
            'basic_cost' => $this->basic_cost,
            'volume_based_cost' => $this->volume_based_cost,
            'weight_based_cost' => $this->weight_based_cost,
            'minimum_volume_limit' => $this->minimum_volume_limit,
            'maximum_volume_limit' => $this->maximum_volume_limit,
            'road_section_type_id' => $this->road_section_type_id,
        ]);

        $query->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'road_section_name', $this->road_section_name])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
