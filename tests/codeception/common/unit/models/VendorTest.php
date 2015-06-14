<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class VendorTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$vendor = new Vendor();

		$this->assertInstanceOf('Model', $vendor);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$vendor->serial_number = null;
			$vendor->name = null;
            verify($vendor->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$vendor->longitude = 'abc';
			$vendor->altitude = "ccd";
			verify($vendor->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('vendor', function() {
			$vendor->serial_number = "WH42144";
			$vendor->name = "Warehouse";
			$vendor->longitude = '23.34';
			$vendor->altitude = '24.3';
			verify($vendor->validate()->true());
		});
	}

	public function testPersistence()
	{
		$vendor = new Vendor();
		$vendor->serial_number = 'WH21844';
		$vendor->name = 'HK Hub Warehouse';
		$vendor->save();

		$this->assertTrue(Vendor::findOne($vendor->vendor_id) !== null);

		$vendor->name = 'MY Hub Warehouse';
		$vendor->save();

		$this->assertTrue(Vendor::findOne($dpeot->vendor_id)->name == 'MY Hub Warehouse');

		$vendorId = $vendor->vendor_id;
		$vendor->delete();

		$this->assertTrue(Vendor::findOne($vendorId) === null);
	}
}