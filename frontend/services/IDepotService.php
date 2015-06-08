<?php

namespace frontend\services;

use yii\base\Object;
use app\models\Depot;

interface IDepotService
{
    public function findBySerialNumber($serialNumber);
}

class DepotService extends Object implements IDepotService
{
    function findBySerialNumber($serialNumber)
    {
        if (($model = Depot::find()->where(['serial_number' => $serialNumber])->one()) !== null) {
            return $model;
        } else {
            return null;
        }
    }
}