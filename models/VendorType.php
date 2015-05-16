<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor_type".
 *
 * @property integer $vendor_type_id
 * @property string $vendor_type_name
 *
 * @property Vendor[] $vendors
 */
class VendorType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_type_id'], 'required'],
            [['vendor_type_id'], 'integer'],
            [['vendor_type_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vendor_type_id' => 'Vendor Type ID',
            'vendor_type_name' => 'Vendor Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendors()
    {
        return $this->hasMany(Vendor::className(), ['vendor_type_id' => 'vendor_type_id']);
    }
}
