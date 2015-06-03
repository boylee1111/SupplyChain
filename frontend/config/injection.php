<?php

$container = Yii::$container;

$container->set('frontend\services\IFactoryService', 'frontend\services\FactoryService');
$container->set('frontend\services\IProductService', 'frontend\services\ProductService');
$container->set('frontend\services\PurchasingOrderService', 'frontend\services\PurchasingOrderService');
$container->set('frontend\services\IShippingOrderService', 'frontend\services\ShippingOrderService');
$container->set('frontend\services\IStationService', 'frontend\services\StationService');
$container->set('frontend\services\ITransitPointService', 'frontend\services\TransitPointService');
$container->set('frontend\services\IUserService', 'frontend\services\UserService');
$container->set('frontend\services\IWarehouseService', 'frontend\services\WarehouseService');