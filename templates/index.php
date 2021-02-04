<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Задачки по PHP</title>
    <link rel="stylesheet" href="/templates/css/style.css">
</head>
<body>
<h1>Задачки по PHP</h1>
<div class="wrapper">
    <div class="left">
        <?php foreach ($this->data['board']->getTasks() as $key => $task) { ?>
            <article>
                <div class="task">
                    <strong>Условие</strong>
                    <p>
                        <?php echo $task->getTerm(); ?>
                    </p>
                </div>
                <div class="task">
                    <strong>Решение</strong>
                    <p>
                        <?php echo $task->getDecision(); ?>
                    </p>
                </div>
                <div class="task">
                    <strong>Результат</strong>
                    <p>
                        <?php echo $task->getResult(); ?>
                    </p>
                </div>
                <form action="/delete.php" method="post">
                    <button class="del" type="submit" name="num" value="<?php echo $key; ?>">Удалить</button>
                </form>
            </article>
        <?php } ?>
    </div>
    <div class="right">
        <form action="/append.php" method="post" class="form-add">
            <textarea name="term" id="" required placeholder="Условие"></textarea>
            <textarea name="decision" id="" required placeholder="Решение"></textarea>
            <textarea name="result" id="" required placeholder="Результат (вручную вводить)"></textarea>
            <button type="submit" class="add">Добавить</button>
        </form>
    </div>
</div>
</body>
</html>