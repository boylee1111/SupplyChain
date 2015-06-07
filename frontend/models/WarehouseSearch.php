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
            [['depot_id', 'warehouse_type_id'], 'integer'],
            [['active'], 'boolean'],
            [['area', 'rent', 'summary_salary', 'max_quantity_limit', 'max_cost_limit'], 'number'],
            [['remarks', 'depot.serial_number', 'depot.name', 'depot.short_name', 'warehouseType.warehouse_type_name'], 'safe'],
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(),
            [
                'depot.serial_number',
                'depot.name', 
                'depot.short_name', 
                'warehouseType.warehouse_type_name',
                'active',
            ]);
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

        $dataProvider->sort->attributes['depot.serial_number'] = [
            'asc' => ['depot.serial_number' => SORT_ASC],
            'desc' => ['depot.serial_number' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['depot.name'] = [
            'asc' => ['depot.name' => SORT_ASC],
            'desc' => ['depot.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['depot.short_name'] = [
            'asc' => ['depot.short_name' => SORT_ASC],
            'desc' => ['depot.short_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['warehouseType.warehouse_type_name'] = [
            'asc' => ['warehouse_type.warehouse_type_name' => SORT_ASC],
            'desc' => ['warehouse_type.warehouse_type_name' => SORT_DESC],
        ];

        $query->joinWith(['warehouseType', 'depot']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'depot_id' => $this->depot_id,
            'area' => $this->area,
            'rent' => $this->rent,
            'summary_salary' => $this->summary_salary,
            'max_quantity_limit' => $this->max_quantity_limit,
            'max_cost_limit' => $this->max_cost_limit,
            'warehouse_type_id' => $this->warehouse_type_id,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'depot.serial_number', $this->getAttribute('depot.serial_number')])
            ->andFilterWhere(['like', 'depot.name', $this->getAttribute('depot.name')])
            ->andFilterWhere(['like', 'depot.short_name', $this->getAttribute('depot.short_name')])
            ->andFilterWhere(['like', 'warehouse_type.warehouse_type_name', $this->getAttribute('warehouseType.warehouse_type_name')]);

        return $dataProvider;
    }
}
