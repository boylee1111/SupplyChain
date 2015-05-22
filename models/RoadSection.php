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
 * @property integer $factory_id
 * @property integer $station_id
 * @property integer $transit_point_id
 * @property integer $warehouse_id
 *
 * @property Factory $factory
 * @property Station $station
 * @property TransitPoint $transitPoint
 * @property Warehouse $warehouse
 * @property RoadSectionType $roadSectionType
 * @property Transportation[] $transportations
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
            [['road_section_type_id', 'factory_id', 'station_id', 'transit_point_id', 'warehouse_id'], 'integer'],
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
            'factory_id' => 'Factory ID',
            'station_id' => 'Station ID',
            'transit_point_id' => 'Transit Point ID',
            'warehouse_id' => 'Warehouse ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactory()
    {
        return $this->hasOne(Factory::className(), ['factory_id' => 'factory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStation()
    {
        return $this->hasOne(Station::className(), ['station_id' => 'station_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransitPoint()
    {
        return $this->hasOne(TransitPoint::className(), ['transit_point_id' => 'transit_point_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['warehouse_id' => 'warehouse_id']);
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
    public function getTransportations()
    {
        return $this->hasMany(Transportation::className(), ['road_section_id' => 'road_section_id']);
    }
}
