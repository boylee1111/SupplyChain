<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;
use app\models\FaultRateForecast;

class FaultRateForecastTest extends DbTestCase
{
	use Specify;

	protected $product;

	protected function setUp()
    {
        parent::setUp();

        $this->product = parent::fakeProduct();
    }

    protected function tearDown()
    {
    	$this->product = null;

    	parent::tearDown();
    }

	public function testValidation()
	{
		$faultRateForecast = new FaultRateForecast();

		$this->assertInstanceOf('Model', $depot);

		$this->specify('\'product_id\', \'average_fault_rate_1\', \'average_fault_rate_2\', \'average_fault_rate_3\', \'sum_1\', \'sum_2\', and \'sum_3\' is required', function() {
			$faultRateForecast->product_id = null;
			$faultRateForecast->average_fault_rate_1 = null;
			$faultRateForecast->average_fault_rate_2 = null;
			$faultRateForecast->average_fault_rate_3 = null;
			$faultRateForecast->sum_1 = null;
			$faultRateForecast->sum_2 = null;
			$faultRateForecast->sum_3 = null;
            verify($faultRateForecast->validate(['product_id', 'average_fault_rate_1', 'average_fault_rate_2', 'average_fault_rate_3', 'sum_1', 'sum_2', 'sum_3'])->false());
		});

		$this->specify('\'average_fault_rate_1\', \'average_fault_rate_2\', \'average_fault_rate_3\', \'sum_1\', \'sum_2\' and \'sum_3\' must be number', function() {
			$faultRateForecast->average_fault_rate_1 = 'sfa';
			$faultRateForecast->average_fault_rate_2 = 'sda';
			$faultRateForecast->average_fault_rate_3 = 'sf';
			$faultRateForecast->sum_1 = 'saf';
			$faultRateForecast->sum_2 = 'rf3';
			$faultRateForecast->sum_3 = 'f2r';
			verify($faultRateForecast->validate(['average_fault_rate_1', 'average_fault_rate_2', 'average_fault_rate_3', 'sum_1', 'sum_2', 'sum_3'])->false());
		});

		$this->specify('FaultRateForecast', function() {
			$faultRateForecast->product_id = $this->product->product_id;
			$faultRateForecast->average_fault_rate_1 = '23.3';
			$faultRateForecast->average_fault_rate_2 = '23.3';
			$faultRateForecast->average_fault_rate_3 = '23.3';
			$faultRateForecast->sum_1 = '423.3';
			$faultRateForecast->sum_2 = '423.3';
			$faultRateForecast->sum_3 = '423.3';
            verify($faultRateForecast->validate()->true());
		});
	}

	public function testPersistence()
	{
		$faultRateForecast = new FaultRateForecast();
		$faultRateForecast->product_id = $this->product->product_id;
		$faultRateForecast->average_fault_rate_1 = 23.3;
		$faultRateForecast->average_fault_rate_2 = 23.3;
		$faultRateForecast->average_fault_rate_3 = 23.3;
		$faultRateForecast->sum_1 = 423.3;
		$faultRateForecast->sum_2 = 423.3;
		$faultRateForecast->sum_3 = 423.3;
		$faultRateForecast->save();

		$this->assertTrue(FaultRateForecast::findOne($faultRateForecast->product_id) !== null);

		$faultRateForecast->average_fault_rate_1 = 44.2;
		$faultRateForecast->save();

		$this->assertTrue(FaultRateForecast::findOne($faultRateForecast->product_id)->average_fault_rate_1 == 44.2);

		$faultRateForecastId = $faultRateForecast->product_id;
		$faultRateForecast->delete();

		$this->assertTrue(FaultRateForecast::findOne($faultRateForecastId) === null);
	}
}