<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transportation".
 *
 * @property integer $transportation_id
 * @property string $transportation_name
 * @property string $transportation_cost
 * @property string $transportation_time
 * @property integer $road_section_id
 *
 * @property RoadSection $roadSection
 */
class Transportation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transportation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transportation_id', 'transportation_name', 'road_section_id'], 'required'],
            [['transportation_id', 'road_section_id'], 'integer'],
            [['transportation_cost', 'transportation_time'], 'number'],
            [['transportation_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transportation_id' => 'Transportation ID',
            'transportation_name' => 'Transportation Name',
            'transportation_cost' => 'Transportation Cost',
            'transportation_time' => 'Transportation Time',
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
}
