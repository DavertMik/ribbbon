<?php
class TaskCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->logIn();
    }

    // tests
    public function createAndDeleteTask(AcceptanceTester $I)
    {
        $title = sq('task');
        $I->amOnPage('/projects/2');
        $I->click('New Task');
        $I->seeElement('.new-task');
        $I->fillField('.lc-task-title', $title);
        $I->fillField('.lc-task-description', 'This is very important task');
        $I->click('Save', '.new-task');
        $I->waitForElementNotVisible('.new-task');
        $I->waitForElement('.task-list>li');
        $I->see($title, '.task-list');
        $element = \Codeception\Util\Locator::contains('li',$title);
        $I->moveMouseOver($element);
        $I->click('.ion-close-round', $element);
        $I->see('Are you sure you want to delete this task?');
        $I->click('#confirm-btn');
        $I->wait(2);
        $I->dontSee($title);
    }

    public function selectOption(AcceptanceTester $I)
    {
        $I->amOnPage('/projects/2');
        $I->click('New Task');
        $I->seeElement('.new-task');
        $I->seeElement('.lc-select-priority');
        $I->fillField('.new-task .first', 'This is important');
        $I->selectizeOption('.lc-select-priority', 'high');
        $I->click('Save', '.new-task');
        $I->waitForElementNotVisible('.new-task');
        $I->see('Please fix that', '.task-list');
    }
}
