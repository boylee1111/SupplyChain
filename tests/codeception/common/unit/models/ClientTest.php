<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class ClientTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$$client = new Client();

		$this->assertInstanceOf('Model', $$client);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$$client->serial_number = null;
			$$client->name = null;
            verify($$client->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$$client->longitude = 'abc';
			$$client->altitude = "ccd";
			verify($$client->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('$client', function() {
			$$client->serial_number = "WH42144";
			$$client->name = "Warehouse";
			$$client->longitude = '23.34';
			$$client->altitude = '24.3';
			verify($$client->validate()->true());
		});
	}

	public function testPersistence()
	{
		$$client = new Client();
		$$client->serial_number = 'WH21844';
		$$client->name = 'HK Hub Warehouse';
		$$client->save();

		$this->assertTrue(Client::findOne($$client->$client_id) !== null);

		$$client->name = 'MY Hub Warehouse';
		$$client->save();

		$this->assertTrue(Client::findOne($dpeot->$client_id)->name == 'MY Hub Warehouse');

		$$clientId = $$client->$client_id;
		$$client->delete();

		$this->assertTrue(Client::findOne($$clientId) === null);
	}
}