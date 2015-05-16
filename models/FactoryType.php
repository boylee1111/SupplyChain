<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factory_type".
 *
 * @property integer $factory_type_id
 * @property string $factory_type_name
 *
 * @property Factory $factory
 */
class FactoryType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factory_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['factory_type_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'factory_type_id' => 'Factory Type ID',
            'factory_type_name' => 'Factory Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactory()
    {
        return $this->hasOne(Factory::className(), ['factory_id' => 'factory_type_id']);
    }
}
