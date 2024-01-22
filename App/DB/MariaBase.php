<?php

namespace App\DB;
use App\DB\DataBase;
use PDO;

class MariaBase implements DataBase
{
    private $pdo, $table;

    public function __construct($table)
    {
        $host = 'localhost';
        $db   = 'bank';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //pasireguliuojam ikad grazintu obj, o ne asoc masyva
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO($dsn, $user, $pass, $options);
        $this->table = $table;
    }

   


    public function create(object $data) : int
    {
        $sql = "
            INSERT INTO {$this->table} (name, lastname, AC, PC, balance)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data->name, $data->lastname, $data->AC, $data->PC, $data->balance]);
        return $this->pdo->lastInsertId(); //grazina svieziausia ID
    }

    public function update(int $id, object $data) : bool
    {
        $sql = "
            UPDATE {$this->table}
            SET name = ?, lastname = ?, AC = ?, PC = ?, balance = ?
            WHERE id = ?
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$data->name, $data->lastname, $data->AC, $data->PC, $data->balance, $id]);
    }

    public function delete(int $id) : bool //gaunam ID kuri reikia istrinti, 
    {
        $sql = "
            DELETE FROM {$this->table}
            WHERE id = ?
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$id]);
    }

    public function show(int $id) : object
    {
        $sql = "
            SELECT *
            FROM {$this->table}
            WHERE id = ?
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch();
    }
    
    public function showAll() : array
    {
        $sql = "
            SELECT *
            FROM {$this->table}
        ";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }
}