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
 * @property integer $vendor_id
 *
 * @property StationType $stationType
 * @property Vendor $vendor
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
            [['serial_number', 'name', 'station_type_id', 'vendor_id'], 'required'],
            [['longitude', 'altitude'], 'number'],
            [['status', 'station_type_id', 'vendor_id'], 'integer'],
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
            'vendor_id' => 'Vendor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStationType()
    {
        return $this->hasOne(StationType::className(), ['station_type_id' => 'station_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['vendor_id' => 'vendor_id']);
    }
}
