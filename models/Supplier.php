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
 * @property string $short_name
 * @property string $remarkds
 * @property integer $supplier_type_id
 *
 * @property SupplierType $supplierType
 * @property SupplierProduct[] $supplierProducts
 * @property Product[] $products
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
            [['serial_number', 'primary_name', 'supplier_type_id'], 'required'],
            [['supplier_type_id'], 'integer'],
            [['serial_number', 'primary_name', 'secondary_name', 'short_name', 'remarkds'], 'string', 'max' => 255]
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
            'short_name' => 'Short Name',
            'remarkds' => 'Remarkds',
            'supplier_type_id' => 'Supplier Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplierType()
    {
        return $this->hasOne(SupplierType::className(), ['supplier_type_id' => 'supplier_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplierProducts()
    {
        return $this->hasMany(SupplierProduct::className(), ['supplier_id' => 'supplier_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'product_id'])->viaTable('supplier_product', ['supplier_id' => 'supplier_id']);
    }
}
