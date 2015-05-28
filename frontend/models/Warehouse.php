<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warehouse".
 *
 * @property integer $warehouse_id
 * @property integer $depot_id
 * @property string $area
 * @property string $rent
 * @property string $summary_salary
 * @property string $max_quantity_limit
 * @property string $max_cost_limit
 * @property string $remarks
 * @property integer $warehouse_type_id
 *
 * @property WarehouseType $warehouseType
 * @property Depot $depot
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
            [['depot_id', 'warehouse_type_id'], 'required'],
            [['depot_id', 'warehouse_type_id'], 'integer'],
            [['area', 'rent', 'summary_salary', 'max_quantity_limit', 'max_cost_limit'], 'number'],
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
            'depot_id' => 'Depot ID',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepot()
    {
        return $this->hasOne(Depot::className(), ['depot_id' => 'depot_id']);
    }
}
