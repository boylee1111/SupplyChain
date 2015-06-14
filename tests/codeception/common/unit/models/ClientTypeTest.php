<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class ClientTypeTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$clientType = new ClientType();

		$this->assertInstanceOf('Model', $clientType);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$clientType->serial_number = null;
			$clientType->name = null;
            verify($clientType->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$clientType->longitude = 'abc';
			$clientType->altitude = "ccd";
			verify($clientType->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('clientType', function() {
			$clientType->serial_number = "WH42144";
			$clientType->name = "Warehouse";
			$clientType->longitude = '23.34';
			$clientType->altitude = '24.3';
			verify($clientType->validate()->true());
		});
	}

	public function testPersistence()
	{
		$clientType = new ClientType();
		$clientType->serial_number = 'WH21844';
		$clientType->name = 'HK Hub Warehouse';
		$clientType->save();

		$this->assertTrue(ClientType::findOne($clientType->clientType_id) !== null);

		$clientType->name = 'MY Hub Warehouse';
		$clientType->save();

		$this->assertTrue(ClientType::findOne($dpeot->clientType_id)->name == 'MY Hub Warehouse');

		$clientTypeId = $clientType->clientType_id;
		$clientType->delete();

		$this->assertTrue(ClientType::findOne($clientTypeId) === null);
	}
}