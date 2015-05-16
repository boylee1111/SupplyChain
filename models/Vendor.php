<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property integer $vendor_id
 * @property string $serial_number
 * @property string $primary_name
 * @property string $secondary_name
 * @property string $short_name
 * @property string $remarks
 * @property integer $vendor_type_id
 *
 * @property VendorType $vendorType
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial_number', 'primary_name', 'vendor_type_id'], 'required'],
            [['vendor_type_id'], 'integer'],
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
            'vendor_id' => 'Vendor ID',
            'serial_number' => 'Serial Number',
            'primary_name' => 'Primary Name',
            'secondary_name' => 'Secondary Name',
            'short_name' => 'Short Name',
            'remarks' => 'Remarks',
            'vendor_type_id' => 'Vendor Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendorType()
    {
        return $this->hasOne(VendorType::className(), ['vendor_type_id' => 'vendor_type_id']);
    }
}