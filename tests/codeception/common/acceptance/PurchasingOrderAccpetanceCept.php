<?php use tests\codeception\frontend\AcceptanceTester;
$I = new AcceptanceTester($scenario);
$I->wantTo('ensure whole procedure of PurchasingOrder works.');

$purchasingPage = PurchasingOrderPage::openBy($I);

$I->see('PurchasingOrder', 'h1');

$I->amGoingTo('submit purchasing form with no data');
$purchasingPage->submit([]);
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->expectTo('see validations errors');
$I->see('PurchasingOrder', 'h1');
$I->see('Name cannot be blank', '.help-block');
$I->see('Email cannot be blank', '.help-block');
$I->see('Subject cannot be blank', '.help-block');
$I->see('Body cannot be blank', '.help-block');
$I->see('The verification code is incorrect', '.help-block');

$I->amGoingTo('submit purchasing form with not correct email');
$purchasingPage->submit([
    'name' => 'tester',
    'email' => 'tester.email',
    'subject' => 'test subject',
    'body' => 'test content',
    'verifyCode' => 'testme',
]);
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->expectTo('see that email adress is wrong');
$I->dontSee('Name cannot be blank', '.help-block');
$I->see('Email is not a valid email address.', '.help-block');
$I->dontSee('Subject cannot be blank', '.help-block');
$I->dontSee('Body cannot be blank', '.help-block');
$I->dontSee('The verification code is incorrect', '.help-block');

$I->amGoingTo('submit purchasing form with correct data');
$purchasingPage->submit([
    'name' => 'tester',
    'body' => 'test content',
    'verifyCode' => 'testme',
]);
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->see('Thank you for purchasinging us.');