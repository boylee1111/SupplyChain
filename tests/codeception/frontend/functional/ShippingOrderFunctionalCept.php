<?php

namespace tests\codeception\frontend\functional;

use tests\codeception\frontend\_pages\ShippingOrderApplyPage;
use app\models\ShippingOrder;

class ShippingOrderFunctionalCept extends FunctionalCeptBase
{
    protected $product;
    protected $departDepot;
    protected $arrivalDepot;

    /**
     * This method is called before each cest class test method
     * @param \Codeception\Event\TestEvent $event
     */
    public function _before($event)
    {
        parent::_before();

        $this->product = parent::fakeProduct();
        $this->departDepot = parent::fakeDepot();
        $this->arrivalDepot = parent::fakeDepot2();
    }

    /**
     * This method is called after each cest class test method, even if test failed.
     * @param \Codeception\Event\TestEvent $event
     */
    public function _after($event)
    {
        parent::_after();

        $this->product = null;
        $this->departDepot = null;
        $this->arrivalDepot = null;
    }

    /**
     * This method is called when test fails.
     * @param \Codeception\Event\FailEvent $event
     */
    public function _fail($event)
    {
    }

    public function testApplyShippingOrder($I, $scenario)
    {
        $I->wantTo('ensure that shipping order applying works');

        $shippingOrderApplyPage = ShippingOrderApplyPage::openBy($I);
        $shippingOrderApplyPage->create([]);

        $I->expectTo('see validation errors');
        $I->see('Shipping Order Code cannot be blank.', '.help-block');
        $I->see('Product Id cannot be blank.', '.help-block');
        $I->see('Quantity cannot be blank.', '.help-block');
        $I->see('Depart Depot Id cannot be blank.', '.help-block');
        $I->see('Arrival Depot Id cannot be blank.', '.help-block');

        $shippingOrderCode = 'SO247824';

        $shippingOrderApplyPage->create([
                'shipping_order_code' => $shippingOrderCode,
                'product_id' => $this->product->product_id,
                'quantity' => 40,
                'depart_depot_id' => $this->departDepot->depot_id,
                'arrival_depot_id' => $this->arrivalDepot->depot_id,
            ]);

        $I->expectTo('see that shipping order is created');
        $I->seeRecord('app\models\ShippingOrder', [
            'shipping_order_code' => $shippingOrderCode,
            'product_id' => $this->product->product_id,
            'quantity' => 40,
            'depart_depot_id' => $this->departDepot->depot_id,
            'arrival_depot_id' => $this->arrivalDepot->depot_id,
        ]);

        $I->expectTo('see that shipping order is viewed');
        $I->see('Order: '.$shippingOrderCode);
    }

    public function testApproveShippingOrder($I, $scenario)
    {

    }

    public function testRejctShippingOrder($I, $scenario)
    {

    }

    public function testConfirmShippingOrder($I, $scenario)
    {

    }

    public function testReceivingShippingOrder($I, $scenario)
    {

    }

    public function testDiscrepantShippingOrder($I, $scenario)
    {
        
    }
}
