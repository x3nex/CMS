<?php

class QueryBuilder {
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;

    }

    public function getAll($table) {
        $statement = $this->conn->prepare("SELECT * FROM {$table};");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
public function getAllWithFields($table, $fields = ['*']) {
        $statement = $this->conn->prepare("SELECT ".implode(',', $fields)." FROM {$table};");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

//AuthGuard function

    public function authenticate($username, $password)
    {
       
        $statement = $this->conn->prepare("SELECT * FROM users WHERE username='{$username}' AND password='{$password}';");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS)[0];
    }

    public function find($table, $id) {
        $statement = $this->conn->prepare("SELECT * FROM {$table} WHERE id='{$id}';");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS)[0];
    }
    public function findBy($table, $key, $value) {
      $statement = $this->conn->prepare("SELECT * FROM `{$table}` WHERE `{$key}`='{$value}' limit 1;");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS);
        if(count($results)>0){
            return $results[0];
        }
        return false;
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
          "INSERT INTO %s (%s) VALUES(%s)",
            $table,
            implode(', ', array_keys($parameters)),
            ":" . implode(', :', array_keys($parameters))
        );
        $statement = $this->conn->prepare($sql);

        $statement->execute($parameters);
    }

    public function update($table, $parameters, $id)
    {
        $fields = "";
       foreach ($parameters as $key => $parameter)
       {
           $fields .= "{$key} = \"{$parameter}\", ";
       }
       $fields = substr($fields, 0, -2);

        $sql = sprintf(
            "UPDATE %s SET %s WHERE id='%s'",
            $table,
            $fields,
            $id
        );

        $statement = $this->conn->prepare($sql);

        $statement->execute($parameters);
    }

    public function delete($table, $id)
    {
        $statement = $this->conn->prepare("DELETE FROM {$table} WHERE id='{$id}';");
        $statement->execute();

    }
}

