<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;
use app\models\Depot;
use app\models\TransitPoint;

class TransitPointTest extends DbTestCase
{
	use Specify;

	protected $depot;
	protected $transit_pointType;

	protected function setUp()
    {
        // parent::setUp();

        // $this->depot = parent::fakeDepot();
        // $this->transit_pointType = parent::fakeTransitPointType();
    }

    protected function tearDown()
    {
    	// $this->depot = null;
    	// $this->transit_pointType = null;

     //    parent::tearDown();
    }

	public function testValidation()
	{
		// $transitPoint = new TransitPoint();

		// $this->assertInstanceOf('Model', $depot);

		// $this->specify('\'depot_id and\' \'transit_point_type_id\' is required', function() {
		// 	$transitPoint->depot_id = null;
		// 	$transitPoint->transit_point_type_id = null;
  //           verify($transitPoint->validate(['depot_id', 'transit_point_type_id'])->false());
		// });

		// $this->specify('transitPoint', function() {
		// 	$transitPoint->depot_id = $this->depot->depot_id;
		// 	$fatocry->transit_point_type_id = $this->transit_pointType->transit_point_type_id;
		// 	verify($transitPoint->validate()->true());
		// });
	}

	public function testPersistence()
	{
		// $transitPoint = new TransitPoint();
		// $transitPoint->depot_id = $this->depot->depot_id;
		// $transitPoint->transit_point_type_id = $this->transit_pointType->transit_point_type_id;
		// $transitPoint->save();

		// $this->assertTrue(TransitPoint::findOne($transitPoint->depot_id) !== null);

		// $transitPoint->remarks = "Remarks";
		// $transitPoint->save();

		// $this->assertTrue(TransitPoint::findOne($transitPoint->depot_id)->remarks == 'Remarks');

		// $transit_pointId = $transitPoint->depot_id;
		// $transitPoint->delete();

		// $this->assertTrue(TransitPoint::findOne($transit_pointId) === null);
	}
}