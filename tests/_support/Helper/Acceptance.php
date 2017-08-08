<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Facebook\WebDriver\Interactions\WebDriverActions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\RemoteWebElement;
use Facebook\WebDriver\WebDriverKeys;

class Acceptance extends \Codeception\Module
{
    public function myDragAndDrop($css, $value)
    {
        /** @var $webdriver \RemoteWebDriver  **/
        $webdriver = $this->getModule('WebDriver')->webDriver;

        $actions = new WebDriverActions($webdriver);
        $actions->keyDown(WebDriverKeys::CONTROL)
            ->click($element)
            ->click($anoherElement)
            ->keyUp(WebDriverKeys::CONTROL)
            ->perform();
    }
}
