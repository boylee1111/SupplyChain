<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;
use app\models\Depot;

class DepotTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		// $depot = new Depot();

		// $this->assertInstanceOf('Model', $depot);

		// $this->specify('\'serial_number\' and \'name\' is required', function() {
		// 	$depot->serial_number = null;
		// 	$depot->name = null;
  //           verify($depot->validate(['serial_number', 'name'])->false());
		// });

		// $this->specify('\'longitude\' and \'altitude\' must be number', function() {
		// 	$depot->longitude = 'abc';
		// 	$depot->altitude = "ccd";
		// 	verify($depot->validate(['longitude', 'altitude'])->false());
		// });

		// $this->specify('depot', function() {
		// 	$depot->serial_number = "WH42144";
		// 	$depot->name = "Warehouse";
		// 	$depot->longitude = '23.34';
		// 	$depot->altitude = '24.3';
		// 	verify($depot->validate()->true());
		// });
	}

	public function testPersistence()
	{
		// $depot = new Depot();
		// $depot->serial_number = 'WH21844';
		// $depot->name = 'HK Hub Warehouse';
		// $depot->save();

		// $this->assertTrue(Depot::findOne($depot->depot_id) !== null);

		// $depot->name = 'MY Hub Warehouse';
		// $depot->save();

		// $this->assertTrue(Depot::findOne($dpeot->depot_id)->name == 'MY Hub Warehouse');

		// $depotId = $depot->depot_id;
		// $depot->delete();

		// $this->assertTrue(Depot::findOne($depotId) === null);
	}
}