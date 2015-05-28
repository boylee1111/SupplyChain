<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transit_point".
 *
 * @property integer $transit_point_id
 * @property integer $depot_id
 * @property integer $transit_point_type_id
 * @property string $remarks
 *
 * @property TransitPointType $transitPointType
 * @property Depot $depot
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
            [['depot_id', 'transit_point_type_id'], 'required'],
            [['depot_id', 'transit_point_type_id'], 'integer'],
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
            'depot_id' => 'Depot ID',
            'transit_point_type_id' => 'Transit Point Type ID',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransitPointType()
    {
        return $this->hasOne(TransitPointType::className(), ['transit_point_type_id' => 'transit_point_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepot()
    {
        return $this->hasOne(Depot::className(), ['depot_id' => 'depot_id']);
    }
}
