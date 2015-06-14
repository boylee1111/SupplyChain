<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class RoadSectionTypeTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$roadSectionType = new RoadSectionType();

		$this->assertInstanceOf('Model', $roadSectionType);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$roadSectionType->serial_number = null;
			$roadSectionType->name = null;
            verify($roadSectionType->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$roadSectionType->longitude = 'abc';
			$roadSectionType->altitude = "ccd";
			verify($roadSectionType->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('roadSectionType', function() {
			$roadSectionType->serial_number = "WH42144";
			$roadSectionType->name = "Warehouse";
			$roadSectionType->longitude = '23.34';
			$roadSectionType->altitude = '24.3';
			verify($roadSectionType->validate()->true());
		});
	}

	public function testPersistence()
	{
		$roadSectionType = new RoadSectionType();
		$roadSectionType->serial_number = 'WH21844';
		$roadSectionType->name = 'HK Hub Warehouse';
		$roadSectionType->save();

		$this->assertTrue(RoadSectionType::findOne($roadSectionType->roadSectionType_id) !== null);

		$roadSectionType->name = 'MY Hub Warehouse';
		$roadSectionType->save();

		$this->assertTrue(RoadSectionType::findOne($dpeot->roadSectionType_id)->name == 'MY Hub Warehouse');

		$roadSectionTypeId = $roadSectionType->roadSectionType_id;
		$roadSectionType->delete();

		$this->assertTrue(RoadSectionType::findOne($roadSectionTypeId) === null);
	}
}