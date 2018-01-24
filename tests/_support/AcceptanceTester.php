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

    public function login()
    {
        if ($this->loadSessionSnapshot('login')) {
            return;
        } // logged in
        $this->amOnPage('/login');
        $this->fillFieldSlow('Email', 'test@ribbbon.com');
        $this->fillFieldSlow('Password', 'secret');
        $this->click('Login');

        // saving snapshot
        $this->saveSessionSnapshot('login');
    }
   /**
    * Define custom actions here
    */
    public function fillFieldSlow($field, $value)
    {
        $this->fillField($field, $value);
        $this->wait(0.5);
   }

    public function selectizeOption($cssSelector, $value)
    {
        $this->executeJS('$("'.$cssSelector.'")[0].selectize.setValue("' . $value . '")');
   }

//    public function waitForNextTick()
//    {
//        $this->waitForJS()
//    }
}
