<?php

class BarangModel extends Database
{
    public function getAllData($table){
        $query = self::query("SELECT * FROM $table");
        return $query;
    }

    public function getDataById($table, $column, $where){
        $query = self::query("SELECT * FROM $table WHERE $column = $where");
        return $query;
    }

    public function rugiLaba(){
        $query = self::query("SELECT b.idBarang, b.namaBarang,
       SUM(p.jumlahPembelian) - SUM(pe.jumlahPenjualan) AS stok,
       SUM(p.jumlahPembelian * p.hargaBeli) AS totalHargaBeli,
       SUM(pe.jumlahPenjualan * pe.hargaJual) AS totalHargaJual,
       SUM(pe.jumlahPenjualan * pe.hargaJual) - 
       SUM(p.jumlahPembelian * p.hargaBeli) AS keuntungan
        FROM barang b
        JOIN pembelian p ON b.idBarang = p.idBarang
        JOIN penjualan pe ON b.idBarang = pe.idBarang
        GROUP BY b.idBarang");
        return $query;
    }
}
