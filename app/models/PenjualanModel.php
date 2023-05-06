<?php

class PenjualanModel extends Database
{
    public function getAllData($table){
        $query = self::query("SELECT * FROM $table");
        return $query;
    }

    public function getDataById($table, $column, $where){
        $query = self::query("SELECT * FROM $table WHERE $column = $where");
        return $query;
    }

    public function paketPenjualan(){
        $query = self::query("SELECT 
    p1.idBarang AS idBarang1, 
    b1.namaBarang AS namaBarang1, 
    p1.hargaJual AS hargaJual1, 
    p2.idBarang AS idBarang2, 
    b2.namaBarang AS namaBarang2, 
    p2.hargaJual AS hargaJual2, 
    (p1.hargaJual + p2.hargaJual) AS totalHargaJual,
    CASE
        WHEN (p1.hargaJual + p2.hargaJual) <= 20000000 THEN CONCAT('Super Hemat ', (@rank := @rank + 1))
        WHEN (p1.hargaJual + p2.hargaJual) > 10000000 AND (p1.hargaJual + p2.hargaJual) <= 20000000 THEN CONCAT('Hemat ', (@rank := @rank + 1))
        ELSE CONCAT('Pelajar ', (@rank := @rank + 1))
    END AS namaPaket
FROM 
    penjualan p1
JOIN 
    penjualan p2 ON p1.idPenjualan != p2.idPenjualan
JOIN
    barang b1 ON p1.idBarang = b1.idBarang
JOIN
    barang b2 ON p2.idBarang = b2.idBarang,
    (SELECT @rank := 0) r
WHERE 
    p1.idPengguna = p2.idPengguna
ORDER BY 
    totalHargaJual DESC;
");
        return $query;
    }
}
