<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "station_type".
 *
 * @property integer $station_type_id
 * @property string $station_type_name
 *
 * @property Station $station
 */
class StationType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'station_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['station_type_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'station_type_id' => 'Station Type ID',
            'station_type_name' => 'Station Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStation()
    {
        return $this->hasOne(Station::className(), ['station_id' => 'station_type_id']);
    }
}
