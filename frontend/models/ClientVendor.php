<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_vendor".
 *
 * @property integer $client_id
 * @property integer $vendor_id
 *
 * @property Client $client
 * @property Vendor $vendor
 */
class ClientVendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client_vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id', 'vendor_id'], 'required'],
            [['client_id', 'vendor_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'vendor_id' => 'Vendor ID',
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
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['vendor_id' => 'vendor_id']);
    }
}
