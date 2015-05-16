<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_type".
 *
 * @property integer $client_type_id
 * @property string $client_type_name
 *
 * @property Client $client
 */
class ClientType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_type_id'], 'required'],
            [['client_type_id'], 'integer'],
            [['client_type_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_type_id' => 'Client Type ID',
            'client_type_name' => 'Client Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['client_id' => 'client_type_id']);
    }
}
