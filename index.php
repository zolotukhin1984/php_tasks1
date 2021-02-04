<?php

require __DIR__ . '/autoload.php';

$board = new \classes\models\Board();

$view = new \classes\View();
$view->assign('board', $board);
$view->display(__DIR__ . '/templates/index.php');
