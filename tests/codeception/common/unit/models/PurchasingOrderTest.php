<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;
use app\models\PurchasingOrder;

class PurchasingOrderTest extends DbTestCase
{
	use Specify;

	protected $applyUser;
	protected $product;
	protected $destinationDepot;

	protected function setUp()
    {
        // parent::setUp();

        // $this->applyUser = parent::fakeUser();
        // $this->product = parent::fakeProduct();
        // $this->destinationDepot = parent::fakeDepot();
    }

    protected function tearDown()
    {
    	// $this->applyUser = null;
    	// $this->statiproductonType = null;
    	// $this->destinationDepot = null;

     //    parent::tearDown();
    }

	public function testValidation()
	{
		// $purchasingOrder = new PurchasingOrder();

		// $this->assertInstanceOf('Model', $purchasingOrder);

		// $this->specify('\'purchasing_order_code\', \'apply_user_id\', \'product_id\', \'quantity\', \'destination_depot_id\' and \'apply_date\' is required', function() {
		// 	$purchasingOrder->purchasing_order_code = null;
		// 	$purchasingOrder->apply_user_id = null;
		// 	$purchasingOrder->product_id = null;
		// 	$purchasingOrder->quantity = null;
		// 	$purchasingOrder->destination_depot_id = null;
		// 	$purchasingOrder->apply_date = null;
  //           verify($purchasingOrder->validate(['purchasing_order_code', 'apply_user_id', 'product_id', 'quantity', 'destination_depot_id', 'apply_date'])->false());
		// });

		// $this->specify('PurchasingOrder', function() {
		// 	$purchasingOrder->purchasing_order_code = 'PO2189744';
		// 	$purchasingOrder->apply_user_id = $this->applyUser->id;
		// 	$purchasingOrder->product_id = $this->product->product_id;
		// 	$purchasingOrder->quantity = 40;
		// 	$purchasingOrder->destination_depot_id = $this->destinationDepot->depot_id;
		// 	$purchasingOrder->apply_date = date("Y-m-d H:i:s");
		// 	verify($purchasingOrder->validate()->true());
		// });
	}

	public function testPersistence()
	{
		// $purchasingOrder = new PurchasingOrder();
		// $purchasingOrder->purchasing_order_code = 'PO2189744';
		// $purchasingOrder->apply_user_id = $this->applyUser->id;
		// $purchasingOrder->product_id = $this->product->product_id;
		// $purchasingOrder->quantity = 40;
		// $purchasingOrder->destination_depot_id = $this->destinationDepot->depot_id;
		// $purchasingOrder->apply_date = date("Y-m-d H:i:s");
		// $purchasingOrder->save();

		// $this->assertTrue(PurchasingOrder::findOne($purchasingOrder->purchasing_order_id) !== null);

		// $purchasingOrder->quantity = 30;
		// $purchasingOrder->save();

		// $this->assertTrue(PurchasingOrder::findOne($dpeot->purchasing_order_id)->quantity == 30);

		// $purchasingOrderId = $purchasingOrder->purchasing_order_id;
		// $purchasingOrder->delete();

		// $this->assertTrue(PurchasingOrder::findOne($purchasingOrderId) === null);
	}
}