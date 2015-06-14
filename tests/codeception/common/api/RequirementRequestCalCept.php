<?php use tests\codeception\frontend\ApiTester;
$I = new ApiTester($scenario);
$I->wantTo('ensure requesting Requirement REST API works.');
