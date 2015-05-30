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
            [['depot_id', 'transit_point_type_id'], 'integer'],
            [['remarks', 'depot.serial_number', 'depot.name', 'depot.short_name', 'transitPointType.transit_point_type_name'], 'safe'],
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(),
            [
                'depot.serial_number',
                'depot.name', 
                'depot.short_name', 
                'transitPointType.transit_point_type_name',
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
        $query = TransitPoint::find();

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
        $dataProvider->sort->attributes['transitPointType.transit_point_type_name'] = [
            'asc' => ['transit_point_type.transit_point_type_name' => SORT_ASC],
            'desc' => ['transit_point_type.transit_point_type_name' => SORT_DESC],
        ];

        $query->joinWith(['transitPointType', 'depot']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'depot_id' => $this->depot_id,
            'transit_point_type_id' => $this->transit_point_type_id,
        ]);

        $query->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'depot.serial_number', $this->getAttribute('depot.serial_number')])
            ->andFilterWhere(['like', 'depot.name', $this->getAttribute('depot.name')])
            ->andFilterWhere(['like', 'depot.short_name', $this->getAttribute('depot.short_name')])
            ->andFilterWhere(['like', 'transit_point_type.transit_point_type_name', $this->getAttribute('transitPointType.transit_point_type_name')]);

        return $dataProvider;
    }
}
