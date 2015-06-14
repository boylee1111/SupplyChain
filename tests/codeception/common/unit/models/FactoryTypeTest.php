<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class FactoryTypeTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$factoryType = new FactoryType();

		$this->assertInstanceOf('Model', $factoryType);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$factoryType->serial_number = null;
			$factoryType->name = null;
            verify($factoryType->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$factoryType->longitude = 'abc';
			$factoryType->altitude = "ccd";
			verify($factoryType->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('factoryType', function() {
			$factoryType->serial_number = "WH42144";
			$factoryType->name = "Warehouse";
			$factoryType->longitude = '23.34';
			$factoryType->altitude = '24.3';
			verify($factoryType->validate()->true());
		});
	}

	public function testPersistence()
	{
		$factoryType = new FactoryType();
		$factoryType->serial_number = 'WH21844';
		$factoryType->name = 'HK Hub Warehouse';
		$factoryType->save();

		$this->assertTrue(FactoryType::findOne($factoryType->factoryType_id) !== null);

		$factoryType->name = 'MY Hub Warehouse';
		$factoryType->save();

		$this->assertTrue(FactoryType::findOne($dpeot->factoryType_id)->name == 'MY Hub Warehouse');

		$factoryTypeId = $factoryType->factoryType_id;
		$factoryType->delete();

		$this->assertTrue(FactoryType::findOne($factoryTypeId) === null);
	}
}