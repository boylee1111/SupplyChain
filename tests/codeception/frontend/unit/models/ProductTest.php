<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;
use app\models\Product;

class ProductTest extends DbTestCase
{
	use Specify;

	protected $productType;
	protected $currency;
	protected $client;
	protected $supplier;

	protected function setUp()
    {
        parent::setUp();

        $this->productType = parent::fakeProductType();
        $this->currency = parent::fakeCurrency();
        $this->client = parent::fakeClient();
        $this->supplier = parent::fakeSupplier();
    }

    protected function tearDown()
    {
    	$this->productType = null;
    	$this->currency = null;
    	$this->client = null;
    	$this->supplier = null;

    	parent::tearDown();
    }

	public function testValidation()
	{
		$product = new Product();

		$this->assertInstanceOf('Model', $depot);

		$this->specify('\'serial_number\', \'primary_name\', \'product_type_id\', \'currency_id\', \'client_id\' and \'supplier_id\' is required', function() {
			$product->serial_number = null;
			$product->primary_name = null;
			$product->product_type_id = null;
			$product->currency_id = null;
			$product->client_id = null;
			$product->supplier_id = null;
            verify($product->validate(['serial_number', 'primary_name', 'product_type_id', 'currency_id', 'client_id', 'supplier_id'])->false());
		});

		$this->specify('\'length\', \'width\', \'height\', \'volume\', \'weight\', \'amount\', \'minimum_stock\' and \'maximum_stock\' must be number', function() {
			$product->length = 'sfa';
			$product->width = 'sda';
			$product->height = 'sf';
			$product->volume = 'saf';
			$product->weight = 'rf3';
			$product->amount = 'f2r';
			$product->minimum_stock = 'asfwq';
			$product->maximum_stock = 'safaf';
			verify($product->validate(['length', 'width', 'height', 'volume', 'weight', 'amount', 'minimum_stock', 'maximum_stock'])->false());
		});

		$this->specify('product', function() {
			$product->serial_number = 'P217842';
			$product->primary_name = 'product';
			$product->product_type_id = $this->productType->product_type_id;
			$product->currency_id = $this->currency->currency_id;
			$product->client_id = $this->client->client_id;
			$product->supplier_id = $this->supplier->supplier_id;
            verify($product->validate()->true());
		});
	}

	public function testPersistence()
	{
		$product = new product();
		$product->serial_number = 'P217842';
		$product->primary_name = 'product';
		$product->product_type_id = $this->productType->product_type_id;
		$product->currency_id = $this->currency->currency_id;
		$product->client_id = $this->client->client_id;
		$product->supplier_id = $this->supplier->supplier_id;
		$product->save();

		$this->assertTrue(product::findOne($product->product_id) !== null);

		$product->remarks = "Remarks";
		$product->save();

		$this->assertTrue(product::findOne($product->product_id)->remarks == 'Remarks');

		$productId = $product->product_id;
		$product->delete();

		$this->assertTrue(product::findOne($productId) === null);
	}
}