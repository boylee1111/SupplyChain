<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factory".
 *
 * @property integer $factory_id
 * @property string $serial_number
 * @property string $name
 * @property string $short_name
 * @property string $longitude
 * @property string $altitude
 * @property integer $status
 * @property integer $factory_type_id
 * @property string $remarks
 * @property integer $road_section_id
 *
 * @property RoadSection $roadSection
 * @property FactoryType $factoryType
 */
class Factory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial_number', 'name', 'factory_type_id', 'road_section_id'], 'required'],
            [['longitude', 'altitude'], 'number'],
            [['status', 'factory_type_id', 'road_section_id'], 'integer'],
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
            'factory_id' => 'Factory ID',
            'serial_number' => 'Serial Number',
            'name' => 'Name',
            'short_name' => 'Short Name',
            'longitude' => 'Longitude',
            'altitude' => 'Altitude',
            'status' => 'Status',
            'factory_type_id' => 'Factory Type ID',
            'remarks' => 'Remarks',
            'road_section_id' => 'Road Section ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadSection()
    {
        return $this->hasOne(RoadSection::className(), ['road_section_id' => 'road_section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactoryType()
    {
        return $this->hasOne(FactoryType::className(), ['factory_type_id' => 'factory_type_id']);
    }
}
