<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "station".
 *
 * @property integer $station_id
 * @property string $serial_number
 * @property string $name
 * @property string $short_name
 * @property string $longitude
 * @property string $altitude
 * @property integer $status
 * @property integer $station_type_id
 * @property string $remarks
 *
 * @property StationType $station
 */
class Station extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'station';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['station_id', 'serial_number', 'name', 'station_type_id'], 'required'],
            [['station_id', 'status', 'station_type_id'], 'integer'],
            [['longitude', 'altitude'], 'number'],
            [['serial_number', 'name', 'short_name'], 'string', 'max' => 255],
            [['remarks'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'station_id' => 'Station ID',
            'serial_number' => 'Serial Number',
            'name' => 'Name',
            'short_name' => 'Short Name',
            'longitude' => 'Longitude',
            'altitude' => 'Altitude',
            'status' => 'Status',
            'station_type_id' => 'Station Type ID',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStation()
    {
        return $this->hasOne(StationType::className(), ['station_type_id' => 'station_id']);
    }
}
