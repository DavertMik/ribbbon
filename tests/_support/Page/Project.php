<?php
namespace Page;

class Project
{
    /**
     * @var \AcceptanceTester
     */
    protected $i;

    public function __construct(\AcceptanceTester $I)
    {
        $this->i = $I;
    }
    
    public function createTask($name, $params = [])
    {
        $this->i->click('New Task');
        $this->i->seeElement('.new-task');
        $this->i->fillField('.new-task .first', $name);
        if (isset($params['description'])) {
            $this->i->fillField(
                '.new-task textarea',
                $params['description']);
        }
        if (isset($params['priority'])) {
            $this->i->selectizeOption(
                '.new-task form > div:nth-child(3) > select',
                $params['priority']);
        }
        $this->i->click('Save','.new-task');
//        $this->i->waitForVueJS();
        $this->i->wait(2);
    }

}
