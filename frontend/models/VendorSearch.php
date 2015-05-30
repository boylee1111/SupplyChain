<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vendor;

/**
 * VendorSearch represents the model behind the search form about `app\models\Vendor`.
 */
class VendorSearch extends Vendor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_id', 'vendor_type_id'], 'integer'],
            [['serial_number', 'primary_name', 'secondary_name', 'short_name', 'remarks', 'vendorType.vendor_type_name'], 'safe'],
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(), ['vendorType.vendor_type_name']);
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
        $query = Vendor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['vendorType.vendor_type_name'] = [
            'asc' => ['vendor_type.vendor_type_name' => SORT_ASC],
            'desc' => ['vendor_type.vendor_type_name' => SORT_DESC],
        ];

        $query->joinWith(['vendorType']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'vendor_id' => $this->vendor_id,
            'vendor_type_id' => $this->vendor_type_id,
        ]);

        $query->andFilterWhere(['like', 'serial_number', $this->serial_number])
            ->andFilterWhere(['like', 'primary_name', $this->primary_name])
            ->andFilterWhere(['like', 'secondary_name', $this->secondary_name])
            ->andFilterWhere(['like', 'short_name', $this->short_name])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'vendor_type.vendor_type_name', $this->getAttribute('vendorType.vendor_type_name')]);

        return $dataProvider;
    }
}
