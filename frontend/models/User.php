<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property PurchasingOrder[] $purchasingOrders
 * @property PurchasingOrder[] $purchasingOrders0
 * @property ReturningOrder[] $returningOrders
 * @property ReturningOrder[] $returningOrders0
 * @property ShippingOrder[] $shippingOrders
 * @property ShippingOrder[] $shippingOrders0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchasingOrders()
    {
        return $this->hasMany(PurchasingOrder::className(), ['apply_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchasingOrders0()
    {
        return $this->hasMany(PurchasingOrder::className(), ['approval_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReturningOrders()
    {
        return $this->hasMany(ReturningOrder::className(), ['apply_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReturningOrders0()
    {
        return $this->hasMany(ReturningOrder::className(), ['approval_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingOrders()
    {
        return $this->hasMany(ShippingOrder::className(), ['apply_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingOrders0()
    {
        return $this->hasMany(ShippingOrder::className(), ['approval_user_id' => 'id']);
    }
}
