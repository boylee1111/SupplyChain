<?php

namespace app\models;

use common\models\User;

use Yii;

/**
 * This is the model class for table "returning_order".
 *
 * @property integer $returning_order_id
 * @property integer $purchasing_order_id
 * @property string $returning_order_code
 * @property integer $quantity
 * @property integer $apply_user_id
 * @property integer $approval_user_id
 * @property string $apply_date
 * @property string $expect_returning_date
 * @property string $returning_date
 * @property integer $status
 * @property string $reason
 * @property string $remarks
 *
 * @property User $applyUser
 * @property User $approvalUser
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
            [['purchasing_order_id', 'returning_order_code', 'apply_user_id', 'apply_date'], 'required'],
            [['purchasing_order_id', 'quantity', 'apply_user_id', 'approval_user_id', 'status'], 'integer'],
            [['apply_date', 'expect_returning_date', 'returning_date'], 'safe'],
            [['returning_order_code'], 'string', 'max' => 255],
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
            'purchasing_order_id' => 'Purchasing Order',
            'returning_order_code' => 'Returning Order Code',
            'quantity' => 'Quantity',
            'apply_user_id' => 'Apply User',
            'approval_user_id' => 'Approval User',
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
        return $this->hasOne(User::className(), ['id' => 'apply_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApprovalUser()
    {
        return $this->hasOne(User::className(), ['id' => 'approval_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchasingOrder()
    {
        return $this->hasOne(PurchasingOrder::className(), ['purchasing_order_id' => 'purchasing_order_id']);
    }

    public static function returningStatusDescription($code) 
    { 
        $description = ""; 
        switch ($code) { 
            case 0: 
                $description = "applying"; 
                break; 
            case 1: 
                $description = "approval"; 
                break; 
            case 2: 
                $description = "returned"; 
                break; 
            case 4: 
                $description = "closed"; 
                break; 
            case 8: 
                $description = "rejected"; 
                break; 
        } 
        return $description; 
    } 
}
