<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class StationTypeTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$stationType = new StationType();

		$this->assertInstanceOf('Model', $stationType);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$stationType->serial_number = null;
			$stationType->name = null;
            verify($stationType->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$stationType->longitude = 'abc';
			$stationType->altitude = "ccd";
			verify($stationType->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('stationType', function() {
			$stationType->serial_number = "WH42144";
			$stationType->name = "Warehouse";
			$stationType->longitude = '23.34';
			$stationType->altitude = '24.3';
			verify($stationType->validate()->true());
		});
	}

	public function testPersistence()
	{
		$stationType = new StationType();
		$stationType->serial_number = 'WH21844';
		$stationType->name = 'HK Hub Warehouse';
		$stationType->save();

		$this->assertTrue(StationType::findOne($stationType->stationType_id) !== null);

		$stationType->name = 'MY Hub Warehouse';
		$stationType->save();

		$this->assertTrue(StationType::findOne($dpeot->stationType_id)->name == 'MY Hub Warehouse');

		$stationTypeId = $stationType->stationType_id;
		$stationType->delete();

		$this->assertTrue(StationType::findOne($stationTypeId) === null);
	}
}