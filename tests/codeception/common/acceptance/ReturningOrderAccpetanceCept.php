<?php use tests\codeception\frontend\AcceptanceTester;
$I = new AcceptanceTester($scenario);
$I->wantTo('ensure whole procedure of ReturningOrder works.');

$returningPage = ReturningPage::openBy($I);

$I->see('Returning', 'h1');

$I->amGoingTo('submit returning form with no data');
$returningPage->submit([]);
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->expectTo('see validations errors');
$I->see('Returning', 'h1');
$I->see('Name cannot be blank', '.help-block');
$I->see('Email cannot be blank', '.help-block');
$I->see('Subject cannot be blank', '.help-block');
$I->see('Body cannot be blank', '.help-block');
$I->see('The verification code is incorrect', '.help-block');

$I->amGoingTo('submit returning form with not correct email');
$returningPage->submit([
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

$I->amGoingTo('submit returning form with correct data');
$returningPage->submit([
    'name' => 'tester',
    'email' => 'tester@example.com',
    'subject' => 'test subject',
    'body' => 'test content',
    'verifyCode' => 'testme',
]);
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->see('Thank you for returninging us. We will respond to you as soon as possible.');