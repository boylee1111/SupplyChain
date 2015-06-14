<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;
use app\models\Supplier;

class SupplierTest extends DbTestCase
{
	use Specify;

	protected $supplierType;

	protected function setUp()
    {
        // parent::setUp();

        // $this->supplierType = parent::fakeSupplierType();
    }

    protected function tearDown()
    {
    	// $this->supplierType = null;

    	// parent::tearDown();
    }

	public function testValidation()
	{
		// $supplier = new Supplier();

		// $this->assertInstanceOf('Model', $supplier);

		// $this->specify('\'serial_number\', \'primary_name\' and \'supplier_type_id\' is required', function() {
		// 	$supplier->serial_number = null;
		// 	$supplier->primary_name = null;
		// 	$supplier->supplier_type_id = null;
  //           verify($supplier->validate(['serial_number', 'primary_name', 'supplier_type_id'])->false());
		// });

		// $this->specify('Supplier', function() {
		// 	$supplier->serial_number = 'RS241872';
		// 	$supplier->primary_name = 'Road Section';
		// 	$supplier->supplier_type_id = $this->supplierType->supplier_type_id;
  //           verify($supplier->validate()->true());
		// });
	}

	public function testPersistence()
	{
		// $supplier = new Supplier();
		// $supplier->serial_number = 'RS241872';
		// $supplier->primary_name = 'Supplier';
		// $supplier->supplier_type_id = $this->supplierType->supplier_type_id;
		// $supplier->save();

		// $this->assertTrue(Supplier::findOne($supplier->supplier_id) !== null);

		// $supplier->remarks = "Remarks";
		// $supplier->save();

		// $this->assertTrue(Supplier::findOne($supplier->supplier_id)->remarks == 'Remarks');

		// $supplierId = $supplier->supplier_id;
		// $supplier->delete();

		// $this->assertTrue(Supplier::findOne($supplierId) === null);
	}
}