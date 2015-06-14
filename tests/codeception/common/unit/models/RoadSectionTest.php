<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;
use app\models\RoadSection;

class RoadSectionTest extends DbTestCase
{
	use Specify;

	protected $roadSectionType;
	protected $startDepot;
	protected $endDepot;

	protected function setUp()
    {
        // parent::setUp();

        // $this->RoadSectionType = parent::fakeRoadSectionType();
        // $this->startDepot = parent::fakeDepot();
        // $this->endDepot = parent::fakeDepot2();
    }

    protected function tearDown()
    {
    	// $this->RoadSectionType = null;
    	// $this->startDepot = null;
    	// $this->endDepot = null;

    	// parent::tearDown();
    }

	public function testValidation()
	{
		// $roadSection = new RoadSection();

		// $this->assertInstanceOf('Model', $roadSection);

		// $this->specify('\'serial_number\', \'road_section_name\', \'road_section_type_id\', \'start_depot_id\' and \'end_depot_id\' is required', function() {
		// 	$roadSection->serial_number = null;
		// 	$roadSection->road_section_name = null;
		// 	$roadSection->road_section_type_id = null;
		// 	$roadSection->start_depot_id = null;
		// 	$roadSection->end_depot_id = null;
  //           verify($roadSection->validate(['serial_number', 'road_section_name', 'road_section_type_id', 'start_depot_id', 'end_depot_id'])->false());
		// });

		// $this->specify('\'time_cost\', \'basic_cost\', \'volume_based_cost\', \'weight_based_cost\', \'minimum_volume_limit\' and \'maximum_volume_limit\' must be number', function() {
		// 	$roadSection->time_cost = 'sfa';
		// 	$roadSection->basic_cost = 'sda';
		// 	$roadSection->volume_based_cost = 'sf';
		// 	$roadSection->weight_based_cost = 'saf';
		// 	$roadSection->minimum_volume_limit = 'rf3';
		// 	$roadSection->maximum_volume_limit = 'f2r';
		// 	verify($roadSection->validate(['time_cost', 'basic_cost', 'volume_based_cost', 'weight_based_cost', 'minimum_volume_limit', 'maximum_volume_limit'])->false());
		// });

		// $this->specify('RoadSection', function() {
		// 	$roadSection->serial_number = 'RS241872';
		// 	$roadSection->road_section_name = 'Road Section';
		// 	$roadSection->road_section_type_id = $this->roadSectionType->road_section_type_id;
		// 	$roadSection->start_depot_id = $this->startDepot->depot_id;
		// 	$roadSection->end_depot_id = $this->endDepot->depot_id;
  //           verify($roadSection->validate()->true());
		// });
	}

	public function testPersistence()
	{
		// $roadSection = new RoadSection();
		// $roadSection->serial_number = 'RS241872';
		// $roadSection->road_section_name = 'Road Section';
		// $roadSection->road_section_type_id = $this->roadSectionType->road_section_type_id;
		// $roadSection->start_depot_id = $this->startDepot->depot_id;
		// $roadSection->end_depot_id = $this->endDepot->depot_id;
		// $roadSection->save();

		// $this->assertTrue(RoadSection::findOne($roadSection->road_section_id) !== null);

		// $roadSection->remarks = "Remarks";
		// $roadSection->save();

		// $this->assertTrue(RoadSection::findOne($roadSection->road_section_id)->remarks == 'Remarks');

		// $roadSectionId = $roadSection->road_section_id;
		// $roadSection->delete();

		// $this->assertTrue(RoadSection::findOne($roadSectionId) === null);
	}
}