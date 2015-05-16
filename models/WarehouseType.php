<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warehouse_type".
 *
 * @property integer $warehouse_type_id
 * @property string $warehouse_type_name
 *
 * @property Warehouse $warehouse
 */
class WarehouseType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warehouse_type_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'warehouse_type_id' => 'Warehouse Type ID',
            'warehouse_type_name' => 'Warehouse Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['warehouse_id' => 'warehouse_type_id']);
    }
}
