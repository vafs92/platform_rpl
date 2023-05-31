<?php
class Model_StatusPinjam
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPinjamB()
    {
        $this->db->query('SELECT * FROM `table_pinjambarang`');
        return $this->db->resultSet();
    }

    public function getAllPinjamR()
    {
        $this->db->query('SELECT * FROM table_pinjamruang');
        return $this->db->resultSet();
    }

    public function tambahDataPinjamB($namaP, $nimP, $noWA, $kodeB, $tanggalP, $jamP)
    {
        $query = "INSERT INTO table_pinjambarang (namaP, nimP, noWA, kodeB, tanggalP_barang, jamP_barang, statusP_barang) VALUES (:namaP, :nimP, :noWA, :kodeB, :tanggalP, :jamP, 'DIKIRIM')";
        $this->db->query($query);
        $this->db->bind('namaP', $namaP);
        $this->db->bind('nimP', $nimP);
        $this->db->bind('noWA', $noWA);
        $this->db->bind('kodeB', $kodeB);
        $this->db->bind('tanggalP', $tanggalP);
        $this->db->bind('jamP', $jamP);
        // $this->db->bind('namaB', $namaB);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahDataPinjamR($namaP, $nimP, $noWA, $kodeR, $tanggalP, $jamP)
    {
        $query = "INSERT INTO table_pinjamruang (namaP, nimP, noWA, kodeR, tanggalP_ruang, jamP_ruang, statusP_ruang) VALUES (:namaP, :nimP, :noWA, :kodeR, :tanggalP, :jamP, 'DIKIRIM')";
        $this->db->query($query);
        $this->db->bind('namaP', $namaP);
        $this->db->bind('nimP', $nimP);
        $this->db->bind('noWA', $noWA);
        $this->db->bind('kodeR', $kodeR);
        $this->db->bind('tanggalP', $tanggalP);
        $this->db->bind('jamP', $jamP);
        // $this->db->bind('namaR', $namaR);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllPinjamBkirim()
    {
        $this->db->query('SELECT * FROM `table_pinjambarang` WHERE statusP_barang="DIKIRIM"');
        return $this->db->resultSet();
    }

    public function getAllPinjamRkirim()
    {
        $this->db->query('SELECT * FROM table_pinjamruang WHERE statusP_ruang="DIKIRIM"');
        return $this->db->resultSet();
    }

    public function getAllPinjamBterus()
    {
        $this->db->query('SELECT * FROM `table_pinjambarang` WHERE statusP_barang="DITERUSKAN"');
        return $this->db->resultSet();
    }

    public function getAllPinjamRterus()
    {
        $this->db->query('SELECT * FROM table_pinjamruang WHERE statusP_ruang="DITERUSKAN"');
        return $this->db->resultSet();
    }

    public function getDataMahasiswa()
    {
        $query = "SELECT id_mahasiswa FROM table_mahasiswa";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}
