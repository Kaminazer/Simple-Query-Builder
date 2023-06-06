<?php

namespace Builder;

class Db implements DbInterface
{
    protected $pdo;

    /**
     * @inheritDoc
     */
    public function getConnection()
    {
        $config = parse_ini_file(__DIR__ . '/../config/db.ini');
        //$connection = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);
        try {
            $this->pdo = new \PDO($config['dsn'], $config['username'], $config['password']);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Помилка підключення до бази даних: ' . $e->getMessage();
        }
        return $this->pdo;
    }
     public function query(string $sql)
    {
        $this->getConnection();
        // Виконання запиту
        try {
            $statement = $this->pdo->query($sql);
        } catch (\PDOException $e) {
            echo 'Помилка виконання запиту: ' . $e->getMessage() . PHP_EOL;
        }
// Закриття з'єднання
        $pdo = null;
        return $statement;
    }
    public function fetchOne (string $sql):array
    {
        $statement = $this->query($sql);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
    public function fetchAll (string $sql):array
    {
        $statement = $this->query($sql);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

}