<?php

namespace classes\models;

use classes\Db;

class Board
{
    public $data = [];
    protected const TABLE = 'php_board';

    /**
     * Board constructor.
     */
    public function __construct()
    {
        $db = new Db();

        $sqlStart = "
            CREATE TABLE IF NOT EXISTS `" . self::TABLE . "` (
                `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `term` varchar(2000) NOT NULL,
                `decision` varchar(2000) NOT NULL,
                `result` varchar(2000) NOT NULL             
            );
        ";

        $db->myExecute($sqlStart);


        $sql = 'SELECT * FROM ' . self::TABLE . ' ORDER BY id DESC';

        $this->data = $db->myQuery(
            $sql,
            Task::class,
            []
        );
    }

    /**
     * @return array
     */
    public function getTasks()
    {
        return $this->data;
    }

    /**
     * @param Task $task
     */
    public function append(Task $task)
    {
        $this->data[] = $task;
    }

    /**
     * @param $num
     */
    public function delete($num)
    {
        unset($this->data[$num]->term);
    }

    public function save()
    {
        foreach ($this->data as $task) {
            if (!isset($task->id)) {
                $db = new Db();
                $sql = "INSERT INTO " .
                    self::TABLE .
                    //" (`term`, `decision`, `result`) VALUES ('$task->term', '$task->decision', '$task->result')";
                    " (`term`, `decision`, `result`) VALUES (:term, :decision, :result)";
                $db->myExecute(
                    $sql,
                    [
                        ':term' => $task->term,
                        ':decision' => $task->decision,
                        ':result' => $task->result
                    ]
                );
            }

            if (!isset($task->term)) {
                $db = new Db();
                $sql = "DELETE FROM " . self::TABLE . " WHERE id=:id";
                $db->myExecute(
                    $sql,
                    [
                        ':id' => $task->id
                    ]
                );
            }

        }

    }

}