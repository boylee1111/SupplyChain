<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "depot".
 *
 * @property integer $depot_id
 *
 * @property Requirement[] $requirements
 * @property Requirement[] $requirements0
 * @property RequirementPassDepot[] $requirementPassDepots
 * @property Requirement[] $requirements1
 */
class Depot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'depot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'depot_id' => 'Depot ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirements()
    {
        return $this->hasMany(Requirement::className(), ['end_depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirements0()
    {
        return $this->hasMany(Requirement::className(), ['start_depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirementPassDepots()
    {
        return $this->hasMany(RequirementPassDepot::className(), ['depot_id' => 'depot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirements1()
    {
        return $this->hasMany(Requirement::className(), ['requirement_id' => 'requirement_id'])->viaTable('requirement_pass_depot', ['depot_id' => 'depot_id']);
    }
}
