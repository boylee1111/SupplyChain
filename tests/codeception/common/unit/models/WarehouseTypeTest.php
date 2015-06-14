<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class WarehouseTypeTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$warehouseType = new WarehouseType();

		$this->assertInstanceOf('Model', $warehouseType);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$warehouseType->serial_number = null;
			$warehouseType->name = null;
            verify($warehouseType->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$warehouseType->longitude = 'abc';
			$warehouseType->altitude = "ccd";
			verify($warehouseType->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('warehouseType', function() {
			$warehouseType->serial_number = "WH42144";
			$warehouseType->name = "Warehouse";
			$warehouseType->longitude = '23.34';
			$warehouseType->altitude = '24.3';
			verify($warehouseType->validate()->true());
		});
	}

	public function testPersistence()
	{
		$warehouseType = new WarehouseType();
		$warehouseType->serial_number = 'WH21844';
		$warehouseType->name = 'HK Hub Warehouse';
		$warehouseType->save();

		$this->assertTrue(WarehouseType::findOne($warehouseType->warehouseType_id) !== null);

		$warehouseType->name = 'MY Hub Warehouse';
		$warehouseType->save();

		$this->assertTrue(WarehouseType::findOne($dpeot->warehouseType_id)->name == 'MY Hub Warehouse');

		$warehouseTypeId = $warehouseType->warehouseType_id;
		$warehouseType->delete();

		$this->assertTrue(WarehouseType::findOne($warehouseTypeId) === null);
	}
}