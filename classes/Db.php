<?php

namespace classes;

class Db
{
    protected $dbh;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $config = (include __DIR__ . '/../config.php')['db'];

        $this->dbh = new \PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['user'],
            $config['password']
        );
    }

    /**
     * @param $sql
     * @param $class
     * @param array $data
     * @return array
     */
    public function myQuery($sql, $class, $data=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
    }

    /**
     * @param $sql
     * @param array $data
     * @return bool
     */
    public function myExecute($sql, $data=[])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($data);
    }

    /**
     * @return string
     */
    public function getLastID()
    {
        return $this->dbh->lastInsertId();
    }
}