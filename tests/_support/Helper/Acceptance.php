<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\RemoteWebElement;

class Acceptance extends \Codeception\Module
{
    public function selectizeOption($css, $value)
    {
        $this->getModule('WebDriver')->executeJS("$('$css')[0].selectize.setValue('$value')");
//        $els = $this->getModule('WebDriver')->_findElements($css);
//        if (empty($els)) {
//            $this->fail("Selectable element $element not found");
//        }
//        /**
//         * @var $el RemoteWebElement
//         */
//        $el = reset($els);
//        /** @var $browser RemoteWebDriver  **/
//        $browser = $this->getModule('WebDriver')->webDriver;
//        $browser->executeScript("$(arguments[0]).selectize.setValue('$value')", [$el]);
    }
}
