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
 * @property boolean $active
 *
 * @property Factory $factory
 * @property Requirement[] $requirements
 * @property Requirement[] $requirements0
 * @property RequirementPassDepot[] $requirementPassDepots
 * @property Requirement[] $requirements1
 * @property RoadSection[] $roadSections
 * @property RoadSection[] $roadSections0
 * @property ShippingOrder[] $shippingOrders
 * @property ShippingOrder[] $shippingOrders0
 * @property Station $station
 * @property TransitPoint $transitPoint
 * @property Warehouse $warehouse
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
            [['serial_number'], 'unique'],
            [['serial_number', 'name'], 'required'],
            [['longitude', 'altitude'], 'number'],
            [['status'], 'integer'],
            [['active'], 'boolean'],
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
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactory()
    {
        return $this->hasOne(Factory::className(), ['depot_id' => 'depot_id']);
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
    public function getRequirements0()
    {
        return $this->hasMany(Requirement::className(), ['start_depot_id' => 'depot_id']);
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
    public function getRequirements1()
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
    public function getShippingOrders()
    {
        return $this->hasMany(ShippingOrder::className(), ['arrival_depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingOrders0()
    {
        return $this->hasMany(ShippingOrder::className(), ['depart_depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStation()
    {
        return $this->hasOne(Station::className(), ['depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransitPoint()
    {
        return $this->hasOne(TransitPoint::className(), ['depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['depot_id' => 'depot_id']);
    }

    public static isExist($id)
    {
        if (($model = Depot::findOne($id)) !== null) {
            return $model->active;
        }
        return false;
    }
}
