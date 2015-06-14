<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Requirement;

/**
 * RequirementSearch represents the model behind the search form about `app\models\Requirement`.
 */
class RequirementSearch extends Requirement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requirement_id', 'start_depot_id', 'end_depot_id'], 'integer'],
            [['requirement_time_limit', 'requirement_cost'], 'number'],
            [['requirement_path', 'startDepot.name', 'endDepot.name'], 'safe'],
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

    public function attributes()
    {
        return array_merge(parent::attributes(), ['startDepot.name', 'endDepot.name']);
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
        $query = Requirement::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['startDepot.name'] = [
            'asc' => ['depot.name' => SORT_ASC],
            'desc' => ['depot.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['endDepot.name'] = [
            'asc' => ['depot.name' => SORT_ASC],
            'desc' => ['depot.name' => SORT_DESC],
        ];

        $query->joinWith(['startDepot']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'requirement_id' => $this->requirement_id,
            'requirement_time_limit' => $this->requirement_time_limit,
            'requirement_cost' => $this->requirement_cost,
            'start_depot_id' => $this->start_depot_id,
            'end_depot_id' => $this->end_depot_id,
        ]);

        $query->andFilterWhere(['like', 'requirement_path', $this->requirement_path])
            ->andFilterWhere(['like', 'depot.name', $this->getAttribute('startDepot.name')])
            ->andFilterWhere(['like', 'depot.name', $this->getAttribute('endDepot.name')]);

        return $dataProvider;
    }
}
