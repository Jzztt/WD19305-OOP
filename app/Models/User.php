<?php

namespace App\Models;

use App\Model;

class User extends Model
{
    protected $tableName = 'users';

    public function getAll()
    {

        // cách 1: createQueryBuilder
        // $queryBuilder = $this->connection->createQueryBuilder();
        // $queryBuilder->select('users.*', 'role.name as role_name')->from('users')->innerJoin('users', 'role', 'role', 'users.role_id = role.id');
        // return  $queryBuilder->fetchAllAssociative();

        // cách 2 code thuần sql
        $sql = "SELECT users.*, role.name as role_name FROM users JOIN role ON users.role_id = role.id";
        return $this->connection->executeQuery($sql)->fetchAllAssociative();
    }
}