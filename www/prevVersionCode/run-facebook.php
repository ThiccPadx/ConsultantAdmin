<?php
// before start run next command:
// java -jar selenium-server-standalone-2.51.0.jar
namespace Facebook\WebDriver;

require('bootstrap-facebook.php');

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverBrowserType;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;


$webDriver = RemoteWebDriver::create(
    'http://www.polandvisa-ukraine.com/',
    array(
        WebDriverCapabilityType::BROWSER_NAME
        => WebDriverBrowserType::FIREFOX,
        //=> WebDriverBrowserType::HTMLUNIT,
    )
);

//$webDriver->navigate()->refresh();
?>
