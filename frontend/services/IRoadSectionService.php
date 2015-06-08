<?php

namespace frontend\services;

use yii\base\Object;
use app\models\RoadSection;

interface IRoadSectionService
{
    public function findBySerialNumber($serialNumber);
}

class RoadSectionService extends Object implements IRoadSectionService
{
    function findBySerialNumber($serialNumber)
    {
        if (($model = RoadSection::find()->where(['serial_number' => $serialNumber])->one()) !== null) {
            return $model;
        } else {
            return null;
        }
    }
}