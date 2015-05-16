<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transit_point".
 *
 * @property integer $transit_point_id
 * @property string $serial_number
 * @property string $name
 * @property string $short_name
 * @property string $longitude
 * @property string $altitude
 * @property integer $status
 * @property integer $transit_point_type_id
 * @property string $remarks
 *
 * @property TransitPointType $transitPoint
 */
class TransitPoint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transit_point';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transit_point_id', 'serial_number', 'name', 'transit_point_type_id'], 'required'],
            [['transit_point_id', 'status', 'transit_point_type_id'], 'integer'],
            [['longitude', 'altitude'], 'number'],
            [['serial_number', 'name', 'short_name'], 'string', 'max' => 255],
            [['remarks'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transit_point_id' => 'Transit Point ID',
            'serial_number' => 'Serial Number',
            'name' => 'Name',
            'short_name' => 'Short Name',
            'longitude' => 'Longitude',
            'altitude' => 'Altitude',
            'status' => 'Status',
            'transit_point_type_id' => 'Transit Point Type ID',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransitPoint()
    {
        return $this->hasOne(TransitPointType::className(), ['transit_point_type_id' => 'transit_point_id']);
    }
}
