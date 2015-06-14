<?php

namespace app\models;

use Yii;

use common\models\User;

/**
 * This is the model class for table "purchasing_order".
 *
 * @property integer $purchasing_order_id
 * @property string $purchasing_order_code
 * @property integer $apply_user_id
 * @property integer $approval_user_id
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $destination_depot_id
 * @property string $apply_date
 * @property string $expect_arrival_date
 * @property string $arrival_date
 * @property integer $status
 * @property string $remarks
 *
 * @property User $applyUser
 * @property User $approvalUser
 * @property Product $product
 * @property Depot $destinationDepot
 */
class PurchasingOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchasing_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchasing_order_code', 'apply_user_id', 'product_id', 'quantity', 'destination_depot_id', 'apply_date'], 'required'],
            [['apply_user_id', 'approval_user_id', 'product_id', 'quantity', 'destination_depot_id', 'status'], 'integer'],
            [['apply_date', 'expect_arrival_date', 'arrival_date'], 'safe'],
            [['purchasing_order_code'], 'string', 'max' => 45],
            [['remarks'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'purchasing_order_id' => 'Purchasing Order ID',
            'purchasing_order_code' => 'Purchasing Order Code',
            'apply_user_id' => 'Apply User',
            'approval_user_id' => 'Approval User',
            'product_id' => 'Product',
            'quantity' => 'Quantity',
            'destination_depot_id' => 'Destination Depot',
            'apply_date' => 'Apply Date',
            'expect_arrival_date' => 'Expect Arrival Date',
            'arrival_date' => 'Arrival Date',
            'status' => 'Status',
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
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDestinationDepot()
    {
        return $this->hasOne(Depot::className(), ['depot_id' => 'destination_depot_id']);
    }
    
    public static function purchasingStatusDescription($code)
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
                $description = "in transaction";
                break;
            case 4:
                $description = "warehoused";
                break;
            case 8:
                $description = "rejected";
                break;
            case 9:
                $description = "discrepancy";
                break;
            case 10:
                $description = "returned";
                break;
        }
        return $description;
    }
}
