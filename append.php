<?php

require __DIR__ . '/autoload.php';

$board = new \classes\models\Board();
$task = new \classes\models\Task($_POST['term'], $_POST['decision'], $_POST['result']);

$board->append($task);
$board->save();

header('Location: /');