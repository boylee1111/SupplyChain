<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;
use app\models\Depot;
use app\models\Station;

class StationTest extends DbTestCase
{
	use Specify;

	protected $depot;
	protected $stationType;
	protected $vendor;

	protected function setUp()
    {
        // parent::setUp();

        // $this->depot = parent::fakeDepot();
        // $this->stationType = parent::fakeStationType();
        // $this->vendor = parent::fakeVendor();
    }

    protected function tearDown()
    {
    	// $this->depot = null;
    	// $this->stationType = null;
    	// $this->vendor = null;

     //    parent::tearDown();
    }

	public function testValidation()
	{
		// $station = new Station();

		// $this->assertInstanceOf('Model', $depot);

		// $this->specify('\'depot_id and\' \'station_type_id\' and \'vendor_id\' is required', function() {
		// 	$station->depot_id = null;
		// 	$station->station_type_id = null;
		// 	$station->vendor_id = null;
  //           verify($station->validate(['depot_id', 'station_type_id', 'vendor_id'])->false());
		// });

		// $this->specify('station', function() {
		// 	$station->depot_id = $this->depot->depot_id;
		// 	$station->station_type_id = $this->stationType->station_type_id;
		// 	$station->vendor_id = $this->vendor->vendor_id;
		// 	verify($station->validate()->true());
		// });
	}

	public function testPersistence()
	{
		// $station = new Station();
		// $station->depot_id = $this->depot->depot_id;
		// $station->station_type_id = $this->stationType->station_type_id;
		// $station->vendor_id = $this->vendor->vendor_id;
		// $station->save();

		// $this->assertTrue(Station::findOne($station->depot_id) !== null);

		// $station->remarks = "Remarks";
		// $station->save();

		// $this->assertTrue(Station::findOne($station->depot_id)->remarks == 'Remarks');

		// $stationId = $station->depot_id;
		// $station->delete();

		// $this->assertTrue(Station::findOne($stationId) === null);
	}
}