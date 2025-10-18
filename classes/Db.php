<?php
// WE make name space to use autoload composer this psr(php standard recomendation)
namespace TechStore\Classes;


// we say ABSTRACT >> because we need this class just for inherit
abstract class Db
{
    protected $conn;
    protected $table;

    // this functoin to connect with dataBase
    public function connect()
    {
        $this->conn = mysqli_connect(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }


    // this function to select all data in a table
    public function selectAll(string $fields = "*"): array
    {
        $mysql = "SELECT $fields FROM $this->table ";
        $result = mysqli_query($this->conn, $mysql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // this function to select item with id in a table
    // i do not specific type hinting array , so perhaps no item with this id so it will return null not array
    public function selectId($id, string $fields = "*")
    {
        $mysql = "SELECT $fields FROM $this->table WHERE id=$id ";
        $result = mysqli_query($this->conn, $mysql);
        return mysqli_fetch_assoc($result);
    }

    // select with specific where condition
    public function selectWhere($condition, string $fields = "*")
    {
        $mysql = "SELECT $fields FROM $this->table WHERE $condition ";
        $result = mysqli_query($this->conn, $mysql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // this function to count all row 
    public function getCount(): int
    {
        $mysql = "SELECT COUNT(*) AS count FROM $this->table ";
        $result = mysqli_query($this->conn, $mysql);
        return mysqli_fetch_assoc($result)['count'];
    }

    ///////////////////////////////////////////

    // this function to insert some data in a table
    public function insert(string $fields, string $values): bool
    {
        $mysql = "INSERT INTO $this->table($fields) VALUES ($values) ";
        return mysqli_query($this->conn, $mysql);
    }

    // this function to insert some data in a table and return the id 
    public function insertAndGetId(string $fields, string $values)
    {
        $mysql = "INSERT INTO $this->table($fields) VALUES ($values) ";
        mysqli_query($this->conn, $mysql);
        return mysqli_insert_id($this->conn);
    }

    // this function to update some data in a table
    public function update(string $set, $id): bool
    {
        $mysql = "UPDATE $this->table SET $set WHERE id=$id ";
        return mysqli_query($this->conn, $mysql);
    }

    // this function to delete  data in a table
    public function delete($id): bool
    {
        $mysql = "DELETE FROM $this->table WHERE id=$id ";
        return mysqli_query($this->conn, $mysql);
    }
}
