<?php

namespace tests\codeception\frontend\models;

use tests\codeception\frontend\unit\DbTestCase;
use Codeception\Specify;
use common\models\User;

class UserTest extends DbTestCase
{
	use Specify;

	public function testValidation()
	{
		$user = new User();

		$this->assertInstanceOf('Model', $user);

		$this->specify('\'username\', \'auth_key\', \'password_hash\' and \'email\' is required', function() {
			$user->username = null;
			$user->auth_key = null;
			$user->password_hash = null;
			$user->email = null;
            verify($user->validate(['username', 'auth_key', 'password_hash', 'email'])->false());
		});

		$this->specify('User', function() {
			$user->username = 'User';
			$user->auth_key = '12if092f1j0fj2901h9sa0hfas';
			$user->password_hash = 'jf1209jfsacxzojkowf21';
			$user->email = 'user@maitrox.com';
            verify($user->validate()->true());
		});
	}

	public function testPersistence()
	{
		$user = new User();
		$user->username = 'User';
		$user->auth_key = '12if092f1j0fj290';
		$user->password_hash = 'jf1209jfsac';
		$user->email = 'user@maitrox.com';
		$user->save();

		$this->assertTrue(User::findOne($user->id) !== null);

		$user->email = "newuser@maitrox.com";
		$user->save();

		$this->assertTrue(User::findOne($user->id)->username == 'newuser@maitrox.com');

		$userId = $user->id;
		$user->delete();

		$this->assertTrue(User::findOne($userId) === null);
	}
}