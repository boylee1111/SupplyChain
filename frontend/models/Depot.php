<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "depot".
 *
 * @property integer $depot_id
 * @property string $serial_number
 * @property string $name
 * @property string $short_name
 * @property string $longitude
 * @property string $altitude
 * @property integer $status
 *
 * @property Factory[] $factories
 * @property Requirement[] $requirements
 * @property RequirementPassDepot[] $requirementPassDepots
 * @property Requirement[] $requirements0
 * @property RoadSection[] $roadSections
 * @property RoadSection[] $roadSections0
 * @property Station[] $stations
 * @property TransitPoint[] $transitPoints
 * @property Warehouse[] $warehouses
 */
class Depot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'depot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial_number', 'name'], 'required'],
            [['longitude', 'altitude'], 'number'],
            [['status'], 'integer'],
            [['serial_number', 'name', 'short_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'depot_id' => 'Depot ID',
            'serial_number' => 'Serial Number',
            'name' => 'Name',
            'short_name' => 'Short Name',
            'longitude' => 'Longitude',
            'altitude' => 'Altitude',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactories()
    {
        return $this->hasMany(Factory::className(), ['depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirements()
    {
        return $this->hasMany(Requirement::className(), ['end_depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirementPassDepots()
    {
        return $this->hasMany(RequirementPassDepot::className(), ['depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirements0()
    {
        return $this->hasMany(Requirement::className(), ['requirement_id' => 'requirement_id'])->viaTable('requirement_pass_depot', ['depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadSections()
    {
        return $this->hasMany(RoadSection::className(), ['end_depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadSections0()
    {
        return $this->hasMany(RoadSection::className(), ['start_depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStations()
    {
        return $this->hasMany(Station::className(), ['depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransitPoints()
    {
        return $this->hasMany(TransitPoint::className(), ['depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouses()
    {
        return $this->hasMany(Warehouse::className(), ['depot_id' => 'depot_id']);
    }
}
