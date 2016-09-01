<?php
// before start run next command:
// java -jar selenium-server-standalone-2.51.0.jar
require('bootstrap.php');

use Nearsoft\SeleniumClient\By;
use Nearsoft\SeleniumClient\SelectElement;
use Nearsoft\SeleniumClient\WebDriver;
use Nearsoft\SeleniumClient\WebElement;
use Nearsoft\SeleniumClient\DesiredCapabilities;


$webDriver = new WebDriver();

$webDriver->manage()->window()->maximize();

$webDriver->get("http://www.polandvisa-ukraine.com/");

// Главная страница
$webElement = $webDriver->waitForElementUntilIsPresent(By::cssSelector("a[href='scheduleappointment.html']")); // Находим Ссылку Призначити дату та час подачі документів
$webDriver->executeScript("$(\"a[href='scheduleappointment.html']\").removeAttr( \"target\" )"); // Удаляем параметр target
$webElement->click(); // Кликаем по ссылке

// Страница ПРИЗНАЧЕННЯ ДАТИ ПОДАЧІ ДОКУМЕНТІВ
$webElement = $webDriver->waitForElementUntilIsPresent(By::cssSelector("a[href='scheduleappointment_2.html']")); // Находим ссылку Натисніть тут
$webDriver->executeScript("$(\"a[href='scheduleappointment_2.html']\").removeAttr( \"target\" )");  // Удаляем параметр target
$webElement->click(); // Кликаем по ссылке

// Страница ПРИЗНАЧЕННЯ ДАТИ ПОДАЧІ ДОКУМЕНТІВ 2
$webDriver->switchTo()->frame(0); // Заходим внутрь Iframe
$webElement = $webDriver->waitForElementUntilIsPresent(By::id("ctl00_plhMain_lnkSchApp")); // Находим ссылку Призначити дату подачі документів
$webElement->click(); // Кликаем по ссылке

$selectElement = new SelectElement($webDriver->waitForElementUntilIsPresent(By::id("ctl00_plhMain_cboVAC")));
$selectElement->selectByValue("12");

$selectElement = new SelectElement($webDriver->waitForElementUntilIsPresent(By::id("ctl00_plhMain_cboPurpose")));
$selectElement->selectByValue("1");

$webElement = $webDriver->waitForElementUntilIsPresent(By::id("ctl00_plhMain_btnSubmit"));
$webElement->click();

try {
    $selectElement = new SelectElement($webDriver->waitForElementUntilIsPresent(By::id("ctl00_plhMain_cboVisaCategory")));
    $selectElement->selectByValue("235");
} catch (Exception $e) {
    die('Failed 01');
}

try {
    $msgElement = $webDriver->waitForElementUntilIsPresent(By::id("ctl00_plhMain_lblMsg"));
    $msgText = $msgElement->getText();

    if(false === strpos('No date(s) available', $msgText) ) {
        die($msgText);
    } else {
        die('No date(s) available');
    }
} catch (Exception $e) {
    die('Failed 02');
}

//$webDriver->navigate()->refresh();
?>
