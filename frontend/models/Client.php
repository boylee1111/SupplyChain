<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $client_id
 * @property string $serial_number
 * @property string $primary_name
 * @property string $secondary_name
 * @property string $short_name
 * @property string $remarks
 * @property integer $client_type_id
 *
 * @property ClientType $clientType
 * @property ClientVendor[] $clientVendors
 * @property Vendor[] $vendors
 * @property Product[] $products
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial_number'], 'unique'],
            [['serial_number', 'primary_name', 'client_type_id'], 'required'],
            [['client_type_id'], 'integer'],
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
            'client_id' => 'Client ID',
            'serial_number' => 'Serial Number',
            'primary_name' => 'Primary Name',
            'secondary_name' => 'Secondary Name',
            'short_name' => 'Short Name',
            'remarks' => 'Remarks',
            'client_type_id' => 'Client Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientType()
    {
        return $this->hasOne(ClientType::className(), ['client_type_id' => 'client_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientVendors()
    {
        return $this->hasMany(ClientVendor::className(), ['client_id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendors()
    {
        return $this->hasMany(Vendor::className(), ['vendor_id' => 'vendor_id'])->viaTable('client_vendor', ['client_id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['client_id' => 'client_id']);
    }
}
