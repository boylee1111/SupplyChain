<?php use tests\codeception\frontend\AcceptanceTester;
$I = new AcceptanceTester($scenario);
$I->wantTo('ensure whole procedure of RequirementRequest works.');

$requirementPage = RequirementPage::openBy($I);

$I->see('Requirement', 'h1');

$I->amGoingTo('submit requirement form with no data');
$requirementPage->submit([]);
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->expectTo('see validations errors');
$I->see('Requirement', 'h1');
$I->see('Name cannot be blank', '.help-block');
$I->see('Email cannot be blank', '.help-block');
$I->see('Subject cannot be blank', '.help-block');
$I->see('Body cannot be blank', '.help-block');
$I->see('The verification code is incorrect', '.help-block');

$I->amGoingTo('submit requirement form with not correct email');
$requirementPage->submit([
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

$I->amGoingTo('submit requirement form with correct data');
$requirementPage->submit([
    'name' => 'tester',
    'subject' => 'test subject',
]);
if (method_exists($I, 'wait')) {
    $I->wait(3); // only for selenium
}
$I->see('Thank you for requirementing.');