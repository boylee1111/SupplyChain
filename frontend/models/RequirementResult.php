<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requirement_result".
 *
 * @property integer $requirement_result_id
 * @property integer $requirement_id
 * @property string $result_time
 * @property string $result_cost
 * @property string $result_path
 *
 * @property Requirement $requirement
 */
class RequirementResult extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requirement_result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requirement_id'], 'required'],
            [['requirement_id'], 'integer'],
            [['result_time', 'result_cost'], 'number'],
            [['result_path'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'requirement_result_id' => 'Requirement Result ID',
            'requirement_id' => 'Requirement ID',
            'result_time' => 'Result Time',
            'result_cost' => 'Result Cost',
            'result_path' => 'Result Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirement()
    {
        return $this->hasOne(Requirement::className(), ['requirement_id' => 'requirement_id']);
    }
}
