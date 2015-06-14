<?php

namespace tests\codeception\frontend\_pages;

use yii\codeception\BasePage;

/**
 * Represents contact page
 * @property \codeception_frontend\AcceptanceTester|\codeception_frontend\FunctionalTester $actor
 */
class ShippingOrderApplyPage extends BasePage
{
    public $route = 'shipping-order/apply';

    public function create(array $shippingOrderData)
    {
        foreach ($shippingOrderData as $field => $value) {
            $inputType = ($field === 'product_id' || $field === 'depart_depot_id' || $field == 'arrival_depot_id') ? 'select' : 'input';
            $this->actor->fillField($inputType . '[name="ShippingOrder[' . $field . ']"]', $value);
        }
        $this->actor->click('create-button');
    }
}
