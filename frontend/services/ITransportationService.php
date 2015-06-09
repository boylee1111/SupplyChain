<?php

namespace frontend\services;

use yii\base\Object;
use app\models\Transportation;

interface ITransportationService
{
    public function findByNameInRoadSection($roadSectionId, $name);
}

class TransportationService extends Object implements ITransportationService
{
    function findByNameInRoadSection($roadSectionId, $name)
    {
        if (($model = Transportation::find()->where(['road_section_id' => $roadSectionId, 'serial_number' => $serialNumber])->one()) !== null) {
            return $model;
        } else {
            return null;
        }
    }
}