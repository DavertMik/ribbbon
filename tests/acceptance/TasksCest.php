<?php
use Codeception\Util\Locator;

class TasksCest
{
    public function _before(AcceptanceTester $I, TestData $data)
    {
        $I->login();
        $I->amOnPage('/projects/2');
        $this->taskName = $data->getTaskName();
    }

    protected $taskName;

    // tests
    public function createTask(AcceptanceTester $I, Page\Project $projectPage)
    {
        $projectPage->createTask($this->taskName, ['description' => 'Lorem Ipsum']);
        $I->see($this->taskName, Locator::lastElement('ul.task-list li'));
    }

    public function createHighPriorityTask(AcceptanceTester $I, Page\Project $projectPage)
    {
        $taskName = 'HighTask'.microtime();
        $projectPage->createTask($this->taskName, [
            'description' => 'Lorem Ipsum',
            'priority' => 'high'
        ]);
        $I->see($taskName, Locator::lastElement('ul.task-list li'));
        $I->seeElement(Locator::lastElement('ul.task-list li .priority-high'));
    }

    /**
     * @depends createTask
     */
    public function deleteTask(AcceptanceTester $I, \Page\Project $projectPage)
    {
        $projectPage->createTask($this->taskName, ['description' => 'Lorem Ipsum']);
        $I->moveMouseOver(Locator::lastElement('ul.task-list li'));
        $I->click('.ion-close-round', Locator::lastElement('ul.task-list li'));
        $I->waitForElementVisible('#pop-up-prompt #confirm-btn');
        $I->click('#pop-up-prompt #confirm-btn');
        $I->wait(3);
        $I->dontSee($this->taskName, Locator::lastElement('ul.task-list li'));
    }

}
