<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class VendorTypeTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$vendorType = new VendorType();

		$this->assertInstanceOf('Model', $vendorType);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$vendorType->serial_number = null;
			$vendorType->name = null;
            verify($vendorType->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$vendorType->longitude = 'abc';
			$vendorType->altitude = "ccd";
			verify($vendorType->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('vendorType', function() {
			$vendorType->serial_number = "WH42144";
			$vendorType->name = "Warehouse";
			$vendorType->longitude = '23.34';
			$vendorType->altitude = '24.3';
			verify($vendorType->validate()->true());
		});
	}

	public function testPersistence()
	{
		$vendorType = new VendorType();
		$vendorType->serial_number = 'WH21844';
		$vendorType->name = 'HK Hub Warehouse';
		$vendorType->save();

		$this->assertTrue(VendorType::findOne($vendorType->vendorType_id) !== null);

		$vendorType->name = 'MY Hub Warehouse';
		$vendorType->save();

		$this->assertTrue(VendorType::findOne($dpeot->vendorType_id)->name == 'MY Hub Warehouse');

		$vendorTypeId = $vendorType->vendorType_id;
		$vendorType->delete();

		$this->assertTrue(VendorType::findOne($vendorTypeId) === null);
	}
}