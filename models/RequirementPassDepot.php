<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requirement_pass_depot".
 *
 * @property integer $requirement_id
 * @property integer $depot_id
 *
 * @property Depot $depot
 * @property Requirement $requirement
 */
class RequirementPassDepot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requirement_pass_depot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['requirement_id', 'depot_id'], 'required'],
            [['requirement_id', 'depot_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'requirement_id' => 'Requirement ID',
            'depot_id' => 'Depot ID',
        ];
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
    public function getRequirement()
    {
        return $this->hasOne(Requirement::className(), ['requirement_id' => 'requirement_id']);
    }
}
