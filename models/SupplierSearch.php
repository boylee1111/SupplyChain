<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Supplier;

/**
 * SupplierSearch represents the model behind the search form about `app\models\Supplier`.
 */
class SupplierSearch extends Supplier
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'supplier_type_id'], 'integer'],
            [['serial_number', 'primary_name', 'secondary_name', 'remarkds', 'short_name'], 'safe'],
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
        $query = Supplier::find();

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
            'supplier_id' => $this->supplier_id,
            'supplier_type_id' => $this->supplier_type_id,
        ]);

        $query->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'primary_name', $this->primary_name])
            ->andFilterWhere(['like', 'secondary_name', $this->secondary_name])
            ->andFilterWhere(['like', 'remarkds', $this->remarkds])
            ->andFilterWhere(['like', 'short_name', $this->short_name]);

        return $dataProvider;
    }
}
