<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "returning_order".
 *
 * @property integer $returning_order_id
 * @property integer $purchasing_order_id
 * @property integer $apply_user
 * @property integer $approve_user
 * @property integer $quantity
 * @property string $apply_date
 * @property string $expect_returning_date
 * @property string $returning_date
 * @property integer $status
 * @property string $reason
 * @property string $remarks
 *
 * @property User $applyUser
 * @property User $approveUser
 * @property PurchasingOrder $purchasingOrder
 */
class ReturningOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'returning_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchasing_order_id', 'apply_user', 'quantity', 'apply_date'], 'required'],
            [['purchasing_order_id', 'apply_user', 'approve_user', 'quantity', 'status'], 'integer'],
            [['apply_date', 'expect_returning_date', 'returning_date'], 'safe'],
            [['reason', 'remarks'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'returning_order_id' => 'Returning Order ID',
            'purchasing_order_id' => 'Purchasing Order ID',
            'apply_user' => 'Apply User',
            'approve_user' => 'Approve User',
            'quantity' => 'Quantity',
            'apply_date' => 'Apply Date',
            'expect_returning_date' => 'Expect Returning Date',
            'returning_date' => 'Returning Date',
            'status' => 'Status',
            'reason' => 'Reason',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplyUser()
    {
        return $this->hasOne(User::className(), ['id' => 'apply_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApproveUser()
    {
        return $this->hasOne(User::className(), ['id' => 'approve_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchasingOrder()
    {
        return $this->hasOne(PurchasingOrder::className(), ['purchasing_order_id' => 'purchasing_order_id']);
    }
}
