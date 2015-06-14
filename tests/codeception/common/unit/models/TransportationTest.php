<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class TransportationTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$transportation = new Transportation();

		$this->assertInstanceOf('Model', $transportation);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$transportation->serial_number = null;
			$transportation->name = null;
            verify($transportation->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$transportation->longitude = 'abc';
			$transportation->altitude = "ccd";
			verify($transportation->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('transportation', function() {
			$transportation->serial_number = "WH42144";
			$transportation->name = "Warehouse";
			$transportation->longitude = '23.34';
			$transportation->altitude = '24.3';
			verify($transportation->validate()->true());
		});
	}

	public function testPersistence()
	{
		$transportation = new Transportation();
		$transportation->serial_number = 'WH21844';
		$transportation->name = 'HK Hub Warehouse';
		$transportation->save();

		$this->assertTrue(Transportation::findOne($transportation->transportation_id) !== null);

		$transportation->name = 'MY Hub Warehouse';
		$transportation->save();

		$this->assertTrue(Transportation::findOne($dpeot->transportation_id)->name == 'MY Hub Warehouse');

		$transportationId = $transportation->transportation_id;
		$transportation->delete();

		$this->assertTrue(Transportation::findOne($transportationId) === null);
	}
}