<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "road_section_type".
 *
 * @property integer $road_section_type_id
 * @property string $road_section_type_name
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
            [['road_section_type_name'], 'required'],
            [['road_section_type_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'road_section_type_id' => 'Road Section Type ID',
            'road_section_type_name' => 'Road Section Type Name',
        ];
    }
}
