<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class ProductTypeTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$productType = new ProductType();

		$this->assertInstanceOf('Model', $productType);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$productType->serial_number = null;
			$productType->name = null;
            verify($productType->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$productType->longitude = 'abc';
			$productType->altitude = "ccd";
			verify($productType->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('productType', function() {
			$productType->serial_number = "WH42144";
			$productType->name = "Warehouse";
			$productType->longitude = '23.34';
			$productType->altitude = '24.3';
			verify($productType->validate()->true());
		});
	}

	public function testPersistence()
	{
		$productType = new ProductType();
		$productType->serial_number = 'WH21844';
		$productType->name = 'HK Hub Warehouse';
		$productType->save();

		$this->assertTrue(ProductType::findOne($productType->productType_id) !== null);

		$productType->name = 'MY Hub Warehouse';
		$productType->save();

		$this->assertTrue(ProductType::findOne($dpeot->productType_id)->name == 'MY Hub Warehouse');

		$productTypeId = $productType->productType_id;
		$productType->delete();

		$this->assertTrue(ProductType::findOne($productTypeId) === null);
	}
}