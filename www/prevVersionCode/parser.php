<?php
include('parser/simple_html_dom.php');

$html = file_get_html('http://www.polandvisa-ukraine.com/');

foreach($html->find('a') as $e)
    echo $e->href . '<br>';