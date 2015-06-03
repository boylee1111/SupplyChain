<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Depot;

/**
 * DepotSearch represents the model behind the search form about `app\models\Depot`.
 */
class DepotSearch extends Depot
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['depot_id', 'status'], 'integer'],
            [['serial_number', 'name', 'short_name'], 'safe'],
            [['longitude', 'altitude'], 'number'],
            [['active'], 'boolean'],
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
        $query = Depot::find();

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
            'depot_id' => $this->depot_id,
            'longitude' => $this->longitude,
            'altitude' => $this->altitude,
            'status' => $this->status,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short_name', $this->short_name]);

        return $dataProvider;
    }
}
