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
 * @property integer $road_section_id
 * @property integer $vendor_id
 *
 * @property Vendor $vendor
 * @property RoadSection $roadSection
 * @property StationType $stationType
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
            [['serial_number', 'name', 'station_type_id', 'road_section_id', 'vendor_id'], 'required'],
            [['longitude', 'altitude'], 'number'],
            [['status', 'station_type_id', 'road_section_id', 'vendor_id'], 'integer'],
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
            'road_section_id' => 'Road Section ID',
            'vendor_id' => 'Vendor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['vendor_id' => 'vendor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadSection()
    {
        return $this->hasOne(RoadSection::className(), ['road_section_id' => 'road_section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStationType()
    {
        return $this->hasOne(StationType::className(), ['station_type_id' => 'station_type_id']);
    }
}
