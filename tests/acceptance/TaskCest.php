<?php
class TaskCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->logIn();
    }

    public function createTask(AcceptanceTester $I)
    {
        $I->amOnPage('/projects/2');
        $I->click('New Task');
        $I->seeElement('.new-task');
        $I->fillField('.new-task .first', 'Please fix that');
        $I->fillField('.new-task textarea', 'This is very important task');
        $I->click('Save', '.new-task');
        $I->waitForElementNotVisible('.new-task');
        $I->see('Please fix that', '.task-list');
    }

    public function changePriority(AcceptanceTester $I)
    {
        $I->amOnPage('/projects/2');
        $I->click('New Task');
        $I->seeElement('.new-task');
        $I->seeElement('.lc-select-priority');
        $I->fillField('.new-task .first', 'This is important');
        $I->selectizeOption('.new-task .lc-select-priority', 'high');
        $I->click('Save', '.new-task');
        $I->waitForElementNotVisible('.new-task');
        $I->see('Please fix that', '.task-list');
    }
}
