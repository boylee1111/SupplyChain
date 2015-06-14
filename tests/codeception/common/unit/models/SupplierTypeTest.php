<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class SupplierTypeTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$suppierType = new SuppierType();

		$this->assertInstanceOf('Model', $suppierType);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$suppierType->serial_number = null;
			$suppierType->name = null;
            verify($suppierType->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$suppierType->longitude = 'abc';
			$suppierType->altitude = "ccd";
			verify($suppierType->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('suppierType', function() {
			$suppierType->serial_number = "WH42144";
			$suppierType->name = "Warehouse";
			$suppierType->longitude = '23.34';
			$suppierType->altitude = '24.3';
			verify($suppierType->validate()->true());
		});
	}

	public function testPersistence()
	{
		$suppierType = new SuppierType();
		$suppierType->serial_number = 'WH21844';
		$suppierType->name = 'HK Hub Warehouse';
		$suppierType->save();

		$this->assertTrue(SuppierType::findOne($suppierType->suppierType_id) !== null);

		$suppierType->name = 'MY Hub Warehouse';
		$suppierType->save();

		$this->assertTrue(SuppierType::findOne($dpeot->suppierType_id)->name == 'MY Hub Warehouse');

		$suppierTypeId = $suppierType->suppierType_id;
		$suppierType->delete();

		$this->assertTrue(SuppierType::findOne($suppierTypeId) === null);
	}
}