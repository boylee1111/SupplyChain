<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fault_rate_forecast_data".
 *
 * @property integer $fault_rate_forecast_data_id
 * @property integer $fault_rate_forecast_id
 * @property string $date
 * @property string $sales_date
 * @property integer $sales_count
 * @property string $fault_rate_1
 * @property string $fault_rate_2
 * @property string $fault_rate_3
 *
 * @property FaultRateForecast $faultRateForecast
 */
class FaultRateForecastData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fault_rate_forecast_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fault_rate_forecast_id', 'sales_count', 'fault_rate_1', 'fault_rate_2', 'fault_rate_3'], 'required'],
            [['fault_rate_forecast_id', 'sales_count'], 'integer'],
            [['date', 'sales_date'], 'safe'],
            [['fault_rate_1', 'fault_rate_2', 'fault_rate_3'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fault_rate_forecast_data_id' => 'Fault Rate Forecast Data ID',
            'fault_rate_forecast_id' => 'Fault Rate Forecast ID',
            'date' => 'Date',
            'sales_date' => 'Sales Date',
            'sales_count' => 'Sales Count',
            'fault_rate_1' => 'Fault Rate 1',
            'fault_rate_2' => 'Fault Rate 2',
            'fault_rate_3' => 'Fault Rate 3',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaultRateForecast()
    {
        return $this->hasOne(FaultRateForecast::className(), ['product_id' => 'fault_rate_forecast_id']);
    }
}
