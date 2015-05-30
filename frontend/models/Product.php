<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $product_id
 * @property string $serial_number
 * @property string $primary_name
 * @property string $secondary_name
 * @property string $short_name
 * @property integer $product_type_id
 * @property string $length
 * @property string $width
 * @property string $height
 * @property string $volume
 * @property string $weight
 * @property string $amount
 * @property boolean $is_broken
 * @property integer $currency_id
 * @property string $minimum_stock
 * @property string $maximum_stock
 * @property string $remarks
 * @property integer $client_id
 * @property integer $supplier_id
 *
 * @property Client $client
 * @property Currency $currency
 * @property ProductType $productType
 * @property Supplier $supplier
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial_number', 'primary_name', 'product_type_id', 'currency_id', 'client_id', 'supplier_id'], 'required'],
            [['product_type_id', 'currency_id', 'client_id', 'supplier_id'], 'integer'],
            [['length', 'width', 'height', 'volume', 'weight', 'amount', 'minimum_stock', 'maximum_stock'], 'number'],
            [['is_broken'], 'boolean'],
            [['serial_number', 'primary_name', 'secondary_name', 'short_name'], 'string', 'max' => 255],
            [['remarks'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'serial_number' => 'Serial Number',
            'primary_name' => 'Primary Name',
            'secondary_name' => 'Secondary Name',
            'short_name' => 'Short Name',
            'product_type_id' => 'Product Type ID',
            'length' => 'Length',
            'width' => 'Width',
            'height' => 'Height',
            'volume' => 'Volume',
            'weight' => 'Weight',
            'amount' => 'Amount',
            'is_broken' => 'Is Broken',
            'currency_id' => 'Currency ID',
            'minimum_stock' => 'Minimum Stock',
            'maximum_stock' => 'Maximum Stock',
            'remarks' => 'Remarks',
            'client_id' => 'Client ID',
            'supplier_id' => 'Supplier ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['client_id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['currency_id' => 'currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductType()
    {
        return $this->hasOne(ProductType::className(), ['product_type_id' => 'product_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['supplier_id' => 'supplier_id']);
    }
}
