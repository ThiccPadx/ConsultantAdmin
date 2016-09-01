<?php
// before start run next command:
// java -jar selenium-server-standalone-2.51.0.jar
require_once "inc/not_login.php";
require('bootstrap.php');

if ($_GET['id']) {
    $id = $_GET['id'];

    $query = "SELECT * FROM pol_clients "
           . "WHERE id = $id "
            ."AND state_id = 1";

    $result = $db->query($query);

    if (!$result->num_rows) {
        $_SESSION['notification']['status'] = 'danger';
        $_SESSION['notification']['title'] = 'Ошибка: ';
        $_SESSION['notification']['message'] = 'Невозможно начать запись клиента с ID ' . $id;
        header('Location: http://' . get_base_url());
    }

    //var_dump($row);

    //die(print_r($result));

} elseif($_GET['ppva']) {

} else {
    $_SESSION['notification']['status'] = 'danger';
    $_SESSION['notification']['title'] = 'Ошибка: ';
    $_SESSION['notification']['message'] = 'Невозможно начать запись так как не выбрано ни одного клиента или ППВА';
    header('Location: http://' . get_base_url());
}

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

while($row = $result->fetch_assoc()) {

    $selectElement = new SelectElement($webDriver->waitForElementUntilIsPresent(By::id("ctl00_plhMain_cboVAC")));
    $selectElement->selectByValue($row['ppva']);

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

    $webDriver->switchTo()->frame(1);
    $webElement = $webDriver->waitForElementUntilIsPresent(By::id("recaptcha-anchor"));
    $webElement->click();

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
}

$meta_title = "Результаты записи";
$page_title = "Результаты записи в консульство";
require_once "header.php";

require_once "footer.php";
?>
