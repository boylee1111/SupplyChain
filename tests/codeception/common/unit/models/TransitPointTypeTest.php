<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class TransitPointTypeTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$transitPointType = new TransitPointType();

		$this->assertInstanceOf('Model', $transitPointType);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$transitPointType->serial_number = null;
			$transitPointType->name = null;
            verify($transitPointType->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$transitPointType->longitude = 'abc';
			$transitPointType->altitude = "ccd";
			verify($transitPointType->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('transitPointType', function() {
			$transitPointType->serial_number = "WH42144";
			$transitPointType->name = "Warehouse";
			$transitPointType->longitude = '23.34';
			$transitPointType->altitude = '24.3';
			verify($transitPointType->validate()->true());
		});
	}

	public function testPersistence()
	{
		$transitPointType = new TransitPointType();
		$transitPointType->serial_number = 'WH21844';
		$transitPointType->name = 'HK Hub Warehouse';
		$transitPointType->save();

		$this->assertTrue(TransitPointType::findOne($transitPointType->transitPointType_id) !== null);

		$transitPointType->name = 'MY Hub Warehouse';
		$transitPointType->save();

		$this->assertTrue(TransitPointType::findOne($dpeot->transitPointType_id)->name == 'MY Hub Warehouse');

		$transitPointTypeId = $transitPointType->transitPointType_id;
		$transitPointType->delete();

		$this->assertTrue(TransitPointType::findOne($transitPointTypeId) === null);
	}
}