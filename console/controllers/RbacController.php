<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // Create Permissions
        $vendorManagement = $auth->createPermission('vendorManagement');
        $vendorManagement->description = 'Vendor Management';
        $auth->add($vendorManagement);

        $clientManagement = $auth->createPermission('clientManagement');
        $clientManagement->description = 'Client Management';
        $auth->add($clientManagement);

        $productManagement = $auth->createPermission('productManagement');
        $productManagement->description = 'Product Management';
        $auth->add($productManagement);

        $purchasingOrderManagement = $auth->createPermission('purchasingOrderManagement');
        $purchasingOrderManagement->description = 'Purchasing Order Management';
        $auth->add($purchasingOrderManagement);

        $returningOrderManagement = $auth->createPermission('returningOrderManagement');
        $returningOrderManagement->description = 'Returning Order Management';
        $auth->add($returningOrderManagement);

        $supplierManagement = $auth->createPermission('supplierManagement');
        $supplierManagement->description = 'Supplier Management';
        $auth->add($supplierManagement);

        $reviewOrder = $auth->createPermission('reviewOrder');
        $reviewOrder->description = 'Review and Approve Order';
        $auth->add($reviewOrder);

        $userManagement = $auth->createPermission('userManagement');
        $userManagement->description = 'User Management';
        $auth->add($userManagement);

        $depotManagement = $auth->createPermission('depotManagement');
        $depotManagement->description = 'Depot Management';
        $auth->add($depotManagement);

        $roadSectionManagement = $auth->createPermission('roadSectionManagement');
        $roadSectionManagement->description = 'Road Section Management';
        $auth->add($roadSectionManagement);

        $shippingOrderManagement = $auth->createPermission('shippingOrderManagement');
        $shippingOrderManagement->description = 'Shipping Order Management';
        $auth->add($shippingOrderManagement);

        $requirementManagement = $auth->createPermission('requirementManagement');
        $requirementManagement->description = 'Requirement Management';
        $auth->add($requirementManagement);

        // Permission Parent-Child
        $auth->addChild($purchasingOrderManagement, $returningOrderManagement);
        $auth->addChild($requirementManagement, $shippingOrderManagement);

        // Create Roles
        $marketing = $auth->createRole('marketing');
        $auth->add($marketing);

        $purchasing = $auth->createRole('purchasing');
        $auth->add($purchasing);

        $manager = $auth->createRole('manager');
        $auth->add($manager);

        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $transporting = $auth->createRole('transporting');
        $auth->add($transporting);

        $superadmin = $auth->createRole('superadmin');
        $auth->add($superadmin);

        // Roles Parent-Child
        $auth->addChild($superadmin, $marketing);
        $auth->addChild($superadmin, $purchasing);
        $auth->addChild($superadmin, $manager);
        $auth->addChild($superadmin, $admin);
        $auth->addChild($superadmin, $transporting);

        // Roles-Permissions Parent-Child
        $auth->addChild($marketing, $vendorManagement);
        $auth->addChild($marketing, $clientManagement);
        $auth->addChild($marketing, $productManagement);

        $auth->addChild($purchasing, $productManagement);
        $auth->addChild($purchasing, $purchasingOrderManagement);
        $auth->addChild($purchasing, $supplierManagement);

        $auth->addChild($manager, $reviewOrder);

        $auth->addChild($admin, $userManagement);

        $auth->addChild($transporting, $depotManagement);
        $auth->addChild($transporting, $roadSectionManagement);
        $auth->addChild($transporting, $requirementManagement);
        $auth->addChild($transporting, $shippingOrderManagement);

        $auth->assign($superadmin, 1);
    }
}