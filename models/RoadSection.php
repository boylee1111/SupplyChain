<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "road_section".
 *
 * @property integer $road_section_id
 * @property string $serial_number
 * @property string $road_section_name
 * @property string $time_cost
 * @property string $basic_cost
 * @property string $volume_based_cost
 * @property string $weight_based_cost
 * @property string $minimum_volume_limit
 * @property string $maximum_volume_limit
 * @property string $remarks
 * @property integer $road_section_type_id
 *
 * @property Factory[] $factories
 * @property RoadSectionType $roadSectionType
 * @property Station[] $stations
 * @property TransitPoint[] $transitPoints
 * @property Warehouse[] $warehouses
 */
class RoadSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'road_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial_number', 'road_section_name', 'road_section_type_id'], 'required'],
            [['time_cost', 'basic_cost', 'volume_based_cost', 'weight_based_cost', 'minimum_volume_limit', 'maximum_volume_limit'], 'number'],
            [['road_section_type_id'], 'integer'],
            [['serial_number', 'road_section_name'], 'string', 'max' => 255],
            [['remarks'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'road_section_id' => 'Road Section ID',
            'serial_number' => 'Serial Number',
            'road_section_name' => 'Road Section Name',
            'time_cost' => 'Time Cost',
            'basic_cost' => 'Basic Cost',
            'volume_based_cost' => 'Volume Based Cost',
            'weight_based_cost' => 'Weight Based Cost',
            'minimum_volume_limit' => 'Minimum Volume Limit',
            'maximum_volume_limit' => 'Maximum Volume Limit',
            'remarks' => 'Remarks',
            'road_section_type_id' => 'Road Section Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactories()
    {
        return $this->hasMany(Factory::className(), ['road_section_id' => 'road_section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadSectionType()
    {
        return $this->hasOne(RoadSectionType::className(), ['road_section_type_id' => 'road_section_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStations()
    {
        return $this->hasMany(Station::className(), ['road_section_id' => 'road_section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransitPoints()
    {
        return $this->hasMany(TransitPoint::className(), ['road_section_id' => 'road_section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouses()
    {
        return $this->hasMany(Warehouse::className(), ['road_section_id' => 'road_section_id']);
    }
}
