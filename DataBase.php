<?php

class DataBase
{
    private $pdo;

    public function __construct()
    {
        $dbOptions = (require __DIR__ . '/settings.php')['db'];

        try {
            $this->pdo = new \PDO(
                'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']
            );
            $this->pdo->exec('SET NAMES UTF8');
        } catch (\PDOException $e) {
            throw new Exception('Ошибка при подключении к базе данных: ' . $e->getMessage());
        }
    }

    public function query(string $sql, array $params = []): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);
        
        if (false === $result) {
            return null;
        }

        return $sth->fetchAll();
    }
}
