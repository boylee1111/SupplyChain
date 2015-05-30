<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fault_rate_forecast".
 *
 * @property integer $product_id
 * @property string $average_fault_rate_1
 * @property string $average_fault_rate_2
 * @property string $average_fault_rate_3
 * @property string $sum_1
 * @property string $sum_2
 * @property string $sum_3
 *
 * @property Product $product
 * @property FaultRateForecastData[] $faultRateForecastDatas
 */
class FaultRateForecast extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fault_rate_forecast';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'average_fault_rate_1', 'average_fault_rate_2', 'average_fault_rate_3', 'sum_1', 'sum_2', 'sum_3'], 'required'],
            [['product_id'], 'integer'],
            [['average_fault_rate_1', 'average_fault_rate_2', 'average_fault_rate_3', 'sum_1', 'sum_2', 'sum_3'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'average_fault_rate_1' => 'Average Fault Rate 1',
            'average_fault_rate_2' => 'Average Fault Rate 2',
            'average_fault_rate_3' => 'Average Fault Rate 3',
            'sum_1' => 'Sum 1',
            'sum_2' => 'Sum 2',
            'sum_3' => 'Sum 3',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaultRateForecastDatas()
    {
        return $this->hasMany(FaultRateForecastData::className(), ['fault_rate_forecast_id' => 'product_id']);
    }
}
