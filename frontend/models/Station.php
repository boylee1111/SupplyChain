<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "station".
 *
 * @property integer $station_id
 * @property integer $depot_id
 * @property integer $station_type_id
 * @property string $remarks
 * @property integer $vendor_id
 *
 * @property StationType $stationType
 * @property Depot $depot
 * @property Vendor $vendor
 */
class Station extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'station';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['depot_id', 'station_type_id', 'vendor_id'], 'required'],
            [['depot_id', 'station_type_id', 'vendor_id'], 'integer'],
            [['remarks'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'station_id' => 'Station ID',
            'depot_id' => 'Depot ID',
            'station_type_id' => 'Station Type ID',
            'remarks' => 'Remarks',
            'vendor_id' => 'Vendor ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStationType()
    {
        return $this->hasOne(StationType::className(), ['station_type_id' => 'station_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepot()
    {
        return $this->hasOne(Depot::className(), ['depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['vendor_id' => 'vendor_id']);
    }
}
