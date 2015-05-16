<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Factory;

/**
 * FactorySearch represents the model behind the search form about `app\models\Factory`.
 */
class FactorySearch extends Factory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['factory_id', 'status', 'factory_type_id'], 'integer'],
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
        $query = Factory::find();

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
            'factory_id' => $this->factory_id,
            'longitude' => $this->longitude,
            'altitude' => $this->altitude,
            'status' => $this->status,
            'factory_type_id' => $this->factory_type_id,
        ]);

        $query->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short_name', $this->short_name])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
