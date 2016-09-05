<?php

require_once 'autoload.php';
require_once 'readline.php';


//Secure Notepad

$secure = new SecureNotepad(10, 'misho', 'sd42tAG');

$secure->addText('Lorem ipsum  sit am12et, consectetur adipisicing elit.', 1);
$secure->addText('Lorem ipsum dolor sit , consectetur adipisicing elit.', 2);
// $secure->addText('Lorem ipsum  sit , consectetur adipisicing elit.', 3);
// $secure->addText('Lorem ipsum  sit am12et, consectetur adipisicing elit.', 4);
// $secure->addText('Lorem ipsum dolor sit , consectetur adipisicing elit.', 5);
// $secure->addText('Lorem ipsum dolor sit , consectetur adipisicing elit.', 6);
// $secure->addText('Lorem ipsum  sit am12et, consectetur adipisicing elit.', 7);
// $secure->addText('Lorem ipsum dolor sit , consectetur adipisicing elit.', 8);

$secure->printAllPagesWithDigits();
$secure->searchWord('dolor'). PHP_EOL;


//Electronic Secure Notepad

$electronic = new ElectronicSecuredNotepad(12, 'sss', 'sd42tAG');
$electronic->start();
$electronic->addText('fsafasf', 1);
$electronic->getContent();

$electronic->addText('Lorem ipsum  sit am12et, consectetur adipisicing elit.', 1);
$electronic->addText('Lorem ipsum dolor sit , consectetur adipisicing elit.', 2);
// $electronic->addText('Lorem ipsum  sit , consectetur adipisicing elit.', 3);
// $electronic->addText('Lorem ipsum  sit am12et, consectetur adipisicing elit.', 4);
// $electronic->addText('Lorem ipsum dolor sit , consectetur adipisicing elit.', 5);
// $electronic->addText('Lorem ipsum dolor sit , consectetur adipisicing elit.', 6);
// $electronic->addText('Lorem ipsum  sit am12et, consectetur adipisicing elit.', 7);
// $electronic->addText('Lorem ipsum dolor sit , consectetur adipisicing elit.', 8);
// $electronic->deleteText(1);
$electronic->printAllPagesWithDigits();
$electronic->searchWord('dolor');

$electronic->stop();

$electronic->addText('hhgdgh', 1);
$electronic->getContent();
