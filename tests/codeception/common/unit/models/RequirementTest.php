<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;

class RequirementTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$requirement = new Requirement();

		$this->assertInstanceOf('Model', $requirement);

		$this->specify('\'serial_number\' and \'name\' is required', function() {
			$requirement->serial_number = null;
			$requirement->name = null;
            verify($requirement->validate(['serial_number', 'name'])->false());
		});

		$this->specify('\'longitude\' and \'altitude\' must be number', function() {
			$requirement->longitude = 'abc';
			$requirement->altitude = "ccd";
			verify($requirement->validate(['longitude', 'altitude'])->false());
		});

		$this->specify('requirement', function() {
			$requirement->serial_number = "WH42144";
			$requirement->name = "Warehouse";
			$requirement->longitude = '23.34';
			$requirement->altitude = '24.3';
			verify($requirement->validate()->true());
		});
	}

	public function testPersistence()
	{
		$requirement = new Requirement();
		$requirement->serial_number = 'WH21844';
		$requirement->name = 'HK Hub Warehouse';
		$requirement->save();

		$this->assertTrue(Requirement::findOne($requirement->requirement_id) !== null);

		$requirement->name = 'MY Hub Warehouse';
		$requirement->save();

		$this->assertTrue(Requirement::findOne($dpeot->requirement_id)->name == 'MY Hub Warehouse');

		$requirementId = $requirement->requirement_id;
		$requirement->delete();

		$this->assertTrue(Requirement::findOne($requirementId) === null);
	}
}