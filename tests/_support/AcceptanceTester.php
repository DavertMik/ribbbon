<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    public function logIn()
    {
        if ($this->loadSessionSnapshot('login')) {
            return;
        }

        $this->amOnPage('/login');
        $this->click('Confirm');
        $this->submitForm('.special-form form', [
            'email' => 'admin@admin.com',
            'password' => '123456789'
        ]);

        $this->saveSessionSnapshot('login');
    }

    public function selectizeOption($cssLocator, $value)
    {
        $this->executeJS("$('$cssLocator')[0].selectize.setValue('$value')");
    }

    public function haveTask($name, $description = '')
    {
        $this->sendPOST('/login', [
            'email' => 'admin@admin.com',
            'password' => '123456789'
        ]);
        $this->sendPOST('/api/clients', ['user_id' => 1, 'name' => 'davert']);
        $this->seeResponseCodeIs(200);
    }
}
