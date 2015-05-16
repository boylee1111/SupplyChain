<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "road_section".
 *
 * @property integer $road_section_id
 * @property string $serial_number
 * @property string $name
 * @property integer $road_section_type_id
 * @property string $time_cost
 * @property string $basic_cost
 * @property string $volume_based_cost
 * @property string $weight_based_cost
 * @property string $minimum_volume_limit
 * @property string $maximum_volume_limit
 * @property string $remarks
 *
 * @property RoadSectionType $roadSection
 */
class RoadSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'road_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['road_section_id', 'serial_number', 'name', 'road_section_type_id'], 'required'],
            [['road_section_id', 'road_section_type_id'], 'integer'],
            [['time_cost', 'basic_cost', 'volume_based_cost', 'weight_based_cost', 'minimum_volume_limit', 'maximum_volume_limit'], 'number'],
            [['serial_number', 'name'], 'string', 'max' => 255],
            [['remarks'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'road_section_id' => 'Road Section ID',
            'serial_number' => 'Serial Number',
            'name' => 'Name',
            'road_section_type_id' => 'Road Section Type ID',
            'time_cost' => 'Time Cost',
            'basic_cost' => 'Basic Cost',
            'volume_based_cost' => 'Volume Based Cost',
            'weight_based_cost' => 'Weight Based Cost',
            'minimum_volume_limit' => 'Minimum Volume Limit',
            'maximum_volume_limit' => 'Maximum Volume Limit',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadSection()
    {
        return $this->hasOne(RoadSectionType::className(), ['road_section_type_id' => 'road_section_id']);
    }
}
