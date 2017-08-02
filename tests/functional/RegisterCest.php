<?php
class RegisterCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/register');
    }

    public function registerUserSuccessfully(FunctionalTester $I)
    {
        $I->submitForm('', []);
        $I->fillField('fullName', 'Michael B');
        $I->fillField('email', 'davert@codeception.com');
        $I->fillField('password', '123456789');
        $I->click('Register');
        $I->see('Hud', 'h1');
        $I->seeRecord(\App\User::class, ['full_name' => 'Michael B', 'email' => 'davert@codeception.com']);
    }

    public function registerWithoutPasswordFails(FunctionalTester $I)
    {
        $I->fillField('fullName', 'Michael B');
        $I->fillField('email', 'davert@codeception.com');
        $I->fillField('password', '');
        $I->click('Register');
        $I->see('Hud', 'h1');
        $I->seeRecord(\App\User::class, ['full_name' => 'Michael B', 'email' => 'davert@codeception.com']);
    }


    public function registerUserAndFail(FunctionalTester $I)
    {
        $I->fillField('fullName', 'Michael B');
        $I->fillField('email', 'davert@codeception.com');
        $I->fillField('password', '12345');
        $I->click('Register');
        $I->see('The password must be at least 8 characters.', '.status-msg');
        $I->dontSeeRecord('users', ['full_name' => 'Michael B', 'email' => 'davert@codeception.com']);
    }


}
