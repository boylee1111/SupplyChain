<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClientType;

/**
 * ClientTypeSearch represents the model behind the search form about `app\models\ClientType`.
 */
class ClientTypeSearch extends ClientType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_type_id'], 'integer'],
            [['client_type_name'], 'safe'],
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
        $query = ClientType::find();

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
            'client_type_id' => $this->client_type_id,
        ]);

        $query->andFilterWhere(['like', 'client_type_name', $this->client_type_name]);

        return $dataProvider;
    }
}
