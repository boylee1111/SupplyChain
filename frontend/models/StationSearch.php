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
            [['depot_id', 'station_type_id', 'vendor_id'], 'integer'],
            [['remarks', 'depot.serial_number', 'depot.name', 'depot.short_name', 'stationType.station_type_name', 'vendor.primary_name'], 'safe'],
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(),
            [
                'depot.serial_number',
                'depot.name', 
                'depot.short_name', 
                'stationType.station_type_name',
                'vendor.primary_name',
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
        $query = Station::find();

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
        $dataProvider->sort->attributes['stationType.station_type_name'] = [
            'asc' => ['station_type.station_type_name' => SORT_ASC],
            'desc' => ['station_type.station_type_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['vendor.primary_name'] = [
            'asc' => ['vendor.primary_name' => SORT_ASC],
            'desc' => ['vendor.primary_name' => SORT_DESC],
        ];

        $query->joinWith(['stationType', 'depot', 'vendor']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'depot_id' => $this->depot_id,
            'station_type_id' => $this->station_type_id,
            'vendor_id' => $this->vendor_id,
        ]);

        $query->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'depot.serial_number', $this->getAttribute('depot.serial_number')])
            ->andFilterWhere(['like', 'depot.name', $this->getAttribute('depot.name')])
            ->andFilterWhere(['like', 'depot.short_name', $this->getAttribute('depot.short_name')])
            ->andFilterWhere(['like', 'station_type.station_type_name', $this->getAttribute('stationType.station_type_name')])
            ->andFilterWhere(['like', 'vendor.primary_name', $this->getAttribute('vendor.primary_name')]);

        return $dataProvider;
    }
}
