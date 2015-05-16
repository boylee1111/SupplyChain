<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "road_section_type".
 *
 * @property integer $road_section_type_id
 * @property string $name
 *
 * @property RoadSection $roadSection
 */
class RoadSectionType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'road_section_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'road_section_type_id' => 'Road Section Type ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoadSection()
    {
        return $this->hasOne(RoadSection::className(), ['road_section_id' => 'road_section_type_id']);
    }
}
