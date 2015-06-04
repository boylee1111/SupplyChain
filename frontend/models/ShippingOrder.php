<?php

namespace app\models;

use Yii;

use common\models\User;

/**
 * This is the model class for table "shipping_order".
 *
 * @property integer $shipping_order_id
 * @property string $shipping_order_code
 * @property integer $apply_user_id
 * @property integer $approval_user_id
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $depart_depot_id
 * @property integer $arrival_depot_id
 * @property string $apply_date
 * @property string $expect_depart_date
 * @property string $shipping_date
 * @property string $expect_arrival_date
 * @property string $arrival_date
 * @property integer $status
 * @property string $remarks
 *
 * @property User $applyUser
 * @property User $approvalUser
 * @property Depot $arrivalDepot
 * @property Depot $departDepot
 * @property Product $product
 */
class ShippingOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shipping_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shipping_order_code', 'apply_user_id', 'product_id', 'quantity', 'depart_depot_id', 'arrival_depot_id'], 'required'],
            [['apply_user_id', 'approval_user_id', 'product_id', 'quantity', 'depart_depot_id', 'arrival_depot_id', 'status'], 'integer'],
            [['apply_date', 'expect_depart_date', 'shipping_date', 'expect_arrival_date', 'arrival_date'], 'safe'],
            [['shipping_order_code'], 'string', 'max' => 45],
            ['arrival_depot_id', 'compare', 'compareAttribute' => 'depart_depot_id', 'operator' => '!=', 'message' => 'Destination must not be the same as departure depot.'],
            [['remarks'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shipping_order_id' => 'Shipping Order ID',
            'shipping_order_code' => 'Shipping Order Code',
            'apply_user_id' => 'Apply User ID',
            'approval_user_id' => 'Approval User ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'depart_depot_id' => 'Depart Depot ID',
            'arrival_depot_id' => 'Arrival Depot ID',
            'apply_date' => 'Apply Date',
            'expect_depart_date' => 'Expect Depart Date',
            'shipping_date' => 'Shipping Date',
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
    public function getArrivalDepot()
    {
        return $this->hasOne(Depot::className(), ['depot_id' => 'arrival_depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartDepot()
    {
        return $this->hasOne(Depot::className(), ['depot_id' => 'depart_depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }
    
    public static function shippingStatusDescription($code)
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
                $description = "shipping";
                break;
            case 3:
                $description = "arrived";
                break;
            case 4:
                $description = "closed";
                break;
            case 8:
                $description = "rejected";
                break;
            case 9:
                $description = "discrepancy";
                break;
        }
        return $description;
    }
}
