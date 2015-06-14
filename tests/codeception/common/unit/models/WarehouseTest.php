<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;
use app\models\Depot;
use app\models\Warehouse;

class WarehouseTest extends DbTestCase
{
	use Specify;

	protected $depot;
	protected $warehouseType;

	protected function setUp()
    {
        parent::setUp();

        $this->depot = parent::fakeDepot();
        $this->warehouseType = parent::fakeWarehouseType();
    }

    protected function tearDown()
    {
    	$this->depot = null;
    	$this->warehouseType = null;

        parent::tearDown();
    }

	public function testValidation()
	{
		$warehouse = new Warehouse();

		$this->assertInstanceOf('Model', $depot);

		$this->specify('\'depot_id and\' \'warehouse_type_id\' is required', function() {
			$warehouse->depot_id = null;
			$warehouse->warehouse_type_id = null;
            verify($warehouse->validate(['depot_id', 'warehouse_type_id'])->false());
		});

		$this->specify('\'area\', \'rent\', \'summary_salary\', \'max_quantity_limit\' and \'max_cost_limit\' must be number', function() {
			$warehouse->area = 'dsajhd';
			$warehouse->rent = 'dasfwqf';
			$warehouse->summary_salary = 'dsafj';
			$warehouse->max_quantity_limit = 'sajf';
			$warehouse->max_cost_limit = '2197sda';
			verify($warehouse->validate(['area', 'rent', 'summary_salary', 'max_quantity_limit', 'max_cost_limit'])->false());
		});

		$this->specify('warehouse', function() {
			$warehouse->depot_id = $this->depot->depot_id;
			$warehouse->warehouse_type_id = $this->warehouseType->warehouse_type_id;
			verify($warehouse->validate()->true());
		});
	}

	public function testPersistence()
	{
		$warehouse = new Warehouse();
		$warehouse->depot_id = $this->depot->depot_id;
		$warehouse->warehouse_type_id = $this->warehouseType->warehouse_type_id;
		$warehouse->save();

		$this->assertTrue(Warehouse::findOne($warehouse->depot_id) !== null);

		$warehouse->remarks = "Remarks";
		$warehouse->save();

		$this->assertTrue(Warehouse::findOne($warehouse->depot_id)->remarks == 'Remarks');

		$warehouseId = $warehouse->depot_id;
		$warehouse->delete();

		$this->assertTrue(Warehouse::findOne($warehouseId) === null);
	}
}