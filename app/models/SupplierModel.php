<?php

class SupplierModel extends Database
{
    public function getAllData($table){
        $query = self::query("SELECT * FROM $table");
        return $query;
    }

    public function getDataById($table, $column, $where){
        $query = self::query("SELECT * FROM $table WHERE $column = $where");
        return $query;
    }
}
