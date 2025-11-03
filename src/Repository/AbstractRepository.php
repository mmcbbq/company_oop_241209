<?php


abstract class AbstractRepository
{

    public function dbcon():PDO
    {
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUser = $_ENV['DB_USER'];
        $dbPw = $_ENV['DB_USER_PW'];

        return new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPw);
    }

    abstract public function findAll():array;
    abstract public function findById(int $id):EntityInterface;
    abstract public function create(EntityInterface $entity):EntityInterface;
    abstract public function update(EntityInterface $entity):EntityInterface;
    abstract public function delete(int $id);




}