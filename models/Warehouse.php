<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warehouse".
 *
 * @property integer $warehouse_id
 * @property string $serial_number
 * @property string $name
 * @property string $short_name
 * @property string $longitude
 * @property string $altitude
 * @property integer $status
 * @property string $area
 * @property string $rent
 * @property string $summary_salary
 * @property string $max_quantity_limit
 * @property string $max_cost_limit
 * @property string $remarks
 * @property integer $warehouse_type_id
 *
 * @property WarehouseType $warehouseType
 */
class Warehouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial_number', 'name', 'warehouse_type_id'], 'required'],
            [['longitude', 'altitude', 'area', 'rent', 'summary_salary', 'max_quantity_limit', 'max_cost_limit'], 'number'],
            [['status', 'warehouse_type_id'], 'integer'],
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
            'warehouse_id' => 'Warehouse ID',
            'serial_number' => 'Serial Number',
            'name' => 'Name',
            'short_name' => 'Short Name',
            'longitude' => 'Longitude',
            'altitude' => 'Altitude',
            'status' => 'Status',
            'area' => 'Area',
            'rent' => 'Rent',
            'summary_salary' => 'Summary Salary',
            'max_quantity_limit' => 'Max Quantity Limit',
            'max_cost_limit' => 'Max Cost Limit',
            'remarks' => 'Remarks',
            'warehouse_type_id' => 'Warehouse Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouseType()
    {
        return $this->hasOne(WarehouseType::className(), ['warehouse_type_id' => 'warehouse_type_id']);
    }
}
