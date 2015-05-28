<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StationType;

/**
 * StationTypeSearch represents the model behind the search form about `app\models\StationType`.
 */
class StationTypeSearch extends StationType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['station_type_id'], 'integer'],
            [['station_type_name'], 'safe'],
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
        $query = StationType::find();

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
            'station_type_id' => $this->station_type_id,
        ]);

        $query->andFilterWhere(['like', 'station_type_name', $this->station_type_name]);

        return $dataProvider;
    }
}
