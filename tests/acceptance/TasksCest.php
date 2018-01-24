<?php

use Codeception\Util\Locator;

class TasksCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillFieldSlow('Email', 'test@ribbbon.com');
        $I->fillFieldSlow('Password', 'secret');
        $I->click('Login');
        $I->amOnPage('/projects/2');
    }

    protected $taskName;

    // tests
    public function createTask(AcceptanceTester $I)
    {
        $this->taskName = 'Task'.microtime();
        $I->click('New Task');
        $I->seeElement('.new-task');
        $I->fillField('.new-task .first', $this->taskName);
        $I->fillField('.new-task textarea', 'Loremipsum dolores');
        $I->click('Save','.new-task');
        $I->wait(2);
        $I->see($this->taskName, Locator::lastElement('ul.task-list li'));
    }

    public function createHighPriorityTask(AcceptanceTester $I)
    {
        $taskName = 'HighTask'.microtime();
        $I->click('New Task');
        $I->seeElement('.new-task');
        $I->fillField('.new-task .first', $taskName);
        $I->selectOption(
            Locator::contains('label','Priority').'/../select',
            'high');
        $I->fillField('.new-task textarea', 'Loremipsum dolores');
        $I->click('Save','.new-task');
        $I->wait(2);
        $I->see($taskName, Locator::lastElement('ul.task-list li'));
        $I->seeElement(Locator::lastElement('ul.task-list li .priority-high'));
    }

    /**
     * @before createTask
     */
    public function deleteTask(AcceptanceTester $I)
    {
        $I->moveMouseOver(Locator::lastElement('ul.task-list li'));
        $I->click('.ion-close-round', Locator::lastElement('ul.task-list li'));
        $I->waitForElementVisible('#pop-up-prompt #confirm-btn');
        $I->click('#pop-up-prompt #confirm-btn');
        $I->wait(3);
//        $I->waitForElementVisible('#pop-up-prompt #confirm-btn');
        $I->dontSee($this->taskName, Locator::lastElement('ul.task-list li'));
    }

}
