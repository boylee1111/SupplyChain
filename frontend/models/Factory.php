<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factory".
 *
 * @property integer $factory_id
 * @property integer $depot_id
 * @property integer $factory_type_id
 * @property string $remarks
 *
 * @property FactoryType $factoryType
 * @property Depot $depot
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
            [['factory_id', 'depot_id', 'factory_type_id'], 'required'],
            [['factory_id', 'depot_id', 'factory_type_id'], 'integer'],
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
            'depot_id' => 'Depot ID',
            'factory_type_id' => 'Factory Type ID',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactoryType()
    {
        return $this->hasOne(FactoryType::className(), ['factory_type_id' => 'factory_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepot()
    {
        return $this->hasOne(Depot::className(), ['depot_id' => 'depot_id']);
    }
}
