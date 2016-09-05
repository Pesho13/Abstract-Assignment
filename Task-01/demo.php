<?php

require_once 'autoload.php';
require_once 'readline.php';

$simple = new SimpleNotepad(10);

$simple->addTitle('cars', 3);
$simple->addText('opel', 3);
// $simple->addText('bmv', 3);
// $simple->replaceText('trabant', 3);
// $simple->deleteText(3);
$simple->getContent();


$secure = new SecureNotepad(5, 'Secret', 1111);

$secure->addTitle('cars', 3);
$secure->addText('opel', 3);
// $secure->addText('bmv', 3);
// $secure->replaceText('trabant', 3);
// $secure->deleteText(3);
$secure->getContent();