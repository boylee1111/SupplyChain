<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Warehouse;

/**
 * WarehouseSearch represents the model behind the search form about `app\models\Warehouse`.
 */
class WarehouseSearch extends Warehouse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warehouse_id', 'status', 'warehouse_type_id', 'road_section_id'], 'integer'],
            [['serial_number', 'name', 'short_name', 'remarks'], 'safe'],
            [['longitude', 'altitude', 'area', 'rent', 'summary_salary', 'max_quantity_limit', 'max_cost_limit'], 'number'],
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
        $query = Warehouse::find();

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
            'warehouse_id' => $this->warehouse_id,
            'longitude' => $this->longitude,
            'altitude' => $this->altitude,
            'status' => $this->status,
            'area' => $this->area,
            'rent' => $this->rent,
            'summary_salary' => $this->summary_salary,
            'max_quantity_limit' => $this->max_quantity_limit,
            'max_cost_limit' => $this->max_cost_limit,
            'warehouse_type_id' => $this->warehouse_type_id,
            'road_section_id' => $this->road_section_id,
        ]);

        $query->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short_name', $this->short_name])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
