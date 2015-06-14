<?php

namespace tests\codeception\frontend\_pages;

use yii\codeception\BasePage;

/**
 * Represents contact page
 * @property \codeception_frontend\AcceptanceTester|\codeception_frontend\FunctionalTester $actor
 */
class PurchasingOrderApplyPage extends BasePage
{
    public $route = 'purchasing-order/apply';

    public function create(array $purchasingOrderData)
    {
        foreach ($purchasingOrderData as $field => $value) {
            $inputType = ($field === 'product_id' || $field === 'destination_depot_id') ? 'input' : 'select';
            $this->actor->fillField($inputType . '[name="PurchasingOrder[' . $field . ']"]', $value);
        }
        $this->actor->click('create-button');
    }
}
