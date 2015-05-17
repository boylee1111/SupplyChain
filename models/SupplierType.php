<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier_type".
 *
 * @property integer $supplier_type_id
 * @property string $supplier_type_name
 *
 * @property Supplier[] $suppliers
 */
class SupplierType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_type_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'supplier_type_id' => 'Supplier Type ID',
            'supplier_type_name' => 'Supplier Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuppliers()
    {
        return $this->hasMany(Supplier::className(), ['supplier_type_id' => 'supplier_type_id']);
    }
}
