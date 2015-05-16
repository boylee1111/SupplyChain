<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $product_id
 * @property string $primary_name
 * @property string $secondary_name
 * @property string $short_name
 * @property string $length
 * @property string $width
 * @property string $height
 * @property string $volume
 * @property string $weight
 * @property string $amount
 * @property integer $currency_id
 * @property string $minimum_stock
 * @property string $maximum_stock
 * @property string $remarks
 *
 * @property Currency $currency
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'primary_name', 'currency_id'], 'required'],
            [['product_id', 'currency_id'], 'integer'],
            [['length', 'width', 'height', 'volume', 'weight', 'amount', 'minimum_stock', 'maximum_stock'], 'number'],
            [['primary_name', 'secondary_name', 'short_name'], 'string', 'max' => 255],
            [['remarks'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'primary_name' => 'Primary Name',
            'secondary_name' => 'Secondary Name',
            'short_name' => 'Short Name',
            'length' => 'Length',
            'width' => 'Width',
            'height' => 'Height',
            'volume' => 'Volume',
            'weight' => 'Weight',
            'amount' => 'Amount',
            'currency_id' => 'Currency ID',
            'minimum_stock' => 'Minimum Stock',
            'maximum_stock' => 'Maximum Stock',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['currency_id' => 'currency_id']);
    }
}
