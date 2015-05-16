<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $supplier_id
 * @property string $serial_number
 * @property string $primary_name
 * @property string $secondary_name
 * @property string $remarkds
 * @property string $short_name
 * @property integer $supplier_type_id
 *
 * @property SupplierType $supplier
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'serial_number', 'primary_name', 'supplier_type_id'], 'required'],
            [['supplier_id', 'supplier_type_id'], 'integer'],
            [['serial_number', 'primary_name', 'secondary_name', 'remarkds', 'short_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'supplier_id' => 'Supplier ID',
            'serial_number' => 'Serial Number',
            'primary_name' => 'Primary Name',
            'secondary_name' => 'Secondary Name',
            'remarkds' => 'Remarkds',
            'short_name' => 'Short Name',
            'supplier_type_id' => 'Supplier Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(SupplierType::className(), ['supplier_type_id' => 'supplier_id']);
    }
}
