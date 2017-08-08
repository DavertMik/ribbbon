<?php
namespace Page;

class Project
{
    public $newTaskTitle = '.new-task .lc-name';
    public $newTaskDescription = '.new-task .lc-description';
    public $newTaskPriority = '.new-task .lc-priority';
    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    public function createNewTask($name, $description = '', $priority = null)
    {
        $I = $this->acceptanceTester;
        $I->amOnPage('/projects/2');
        $I->click('New Task');
        $I->fillField($this->newTaskTitle, $name);
        $I->fillField($this->newTaskDescription, $description);
        if ($priority) $I->selectizeOption($this->newTaskPriority, $priority);
        $I->click('Save', '.new-task');
        $I->waitForElementNotVisible('.new-task');
        $I->waitForElement('.task-list>li');
    }
}
