<?php
class Model_PerekamanR {
    private $table = 'table_ruang';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPerekaman()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPerekamanByKodeR($kodeR)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kodeR=:kodeR');
        $this->db->bind('kodeR', $kodeR);
        return $this->db->single();
    }
    public function tambahDataR($data)
    {
        $query = "INSERT INTO `table_ruang`(`kodeR`, `namaR`) VALUES (:kodeR, :namaR)";

        $this->db->query($query);
        $this->db->bind('kodeR', $data['kodeR']);
        $this->db->bind('namaR', $data['namaR']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataR($kodeR)
    {
        $query = "DELETE FROM table_ruang WHERE kodeR=:kodeR";
        $this->db->query($query);
        $this->db->bind('kodeR', $kodeR);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataR($data)
    {
        $query = "UPDATE table_ruang SET kodeR = :kodeR, namaR = :namaR WHERE kodeR = :kodeR";

        $this->db->query($query);
        $this->db->bind('kodeR', $data['kodeR']);
        $this->db->bind('namaR', $data['namaR']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataR()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM table_ruang WHERE namaR LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
