<?php

require __DIR__ . '/autoload.php';

$board = new \classes\models\Board();

$board->delete($_POST['num']);
$board->save();

header('Location: /');