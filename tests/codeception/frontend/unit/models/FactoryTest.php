<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;
use app\models\Depot;
use app\models\Factory;

class FactoryTest extends DbTestCase
{
	use Specify;

	protected $depot;
	protected $factoryType;

	protected function setUp()
    {
        parent::setUp();

        $this->depot = parent::fakeDepot();
        $this->factoryType = parent::fakeFactoryType();
    }

    protected function tearDown()
    {
    	$this->depot = null;
    	$this->factoryType = null;

        parent::tearDown();
    }

	public function testValidation()
	{
		$factory = new Factory();

		$this->assertInstanceOf('Model', $depot);

		$this->specify('\'depot_id and\' \'factory_type_id\' is required', function() {
			$factory->depot_id = null;
			$factory->factory_type_id = null;
            verify($factory->validate(['depot_id', 'factory_type_id'])->false());
		});

		$this->specify('factory', function() {
			$factory->depot_id = $this->depot->depot_id;
			$factory->factory_type_id = $this->factoryType->factory_type_id;
			verify($factory->validate()->true());
		});
	}

	public function testPersistence()
	{
		$factory = new Factory();
		$factory->depot_id = $this->depot->depot_id;
		$factory->factory_type_id = $this->factoryType->factory_type_id;
		$factory->save();

		$this->assertTrue(Factory::findOne($factory->depot_id) !== null);

		$factory->remarks = "Remarks";
		$factory->save();

		$this->assertTrue(Factory::findOne($factory->depot_id)->remarks == 'Remarks');

		$factoryId = $factory->depot_id;
		$factory->delete();

		$this->assertTrue(Factory::findOne($factoryId) === null);
	}
}