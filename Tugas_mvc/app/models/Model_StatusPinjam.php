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
        $this->db->query('SELECT * FROM `table_pinjambarang` GROUP BY kodeP_barang');
        return $this->db->resultSet();
    }

    public function getAllPinjamR()
    {
        $this->db->query('SELECT * FROM table_pinjamruang GROUP BY kodeP_ruang');
        return $this->db->resultSet();
    }

    public function getAllPinjamBbyId($kodeP)
    {
        $this->db->query('SELECT pb.kodeP_barang, pb.tanggalP_barang, pb.kodeB, b.namaB, pb.jamP_barang, pb.statusP_barang  FROM table_pinjambarang AS pb NATURAL JOIN table_barang as b WHERE kodeP_barang = :kodeP');
        $this->db->bind(':kodeP', $kodeP);
        return $this->db->resultSet();
    }

    public function getAllPinjamRbyId($kodeP)
    {
        $this->db->query('SELECT pb.kodeP_ruang, pb.tanggalP_ruang, pb.kodeR, b.namaR, pb.jamP_ruang, pb.statusP_ruang  FROM table_pinjamruang AS pb NATURAL JOIN table_ruang as b WHERE kodeP_ruang = :kodeP');
        $this->db->bind(':kodeP', $kodeP);
        return $this->db->resultSet();
    }

    public function tambahDataPinjamB($data)
    {
        $query = "INSERT INTO table_pinjambarang (kodeP_barang, namaP, nimP, noWA, kodeB, tanggalP_barang, jamP_barang, statusP_barang) VALUES (:kodeP, :namaP, :nimP, :noWA, :kodeB, :tanggalP, :jamP, 'DIKIRIM')";
        $this->db->query($query);
        $this->db->bind(':kodeP', $data['kodeP']);
        $this->db->bind(':namaP', $data['namaP']);
        $this->db->bind(':nimP', $data['nimP']);
        $this->db->bind(':noWA', $data['noWA']);
        $this->db->bind(':kode', $data['kode']);
        $this->db->bind(':tanggalP', $data['tanggalP']);
        $this->db->bind(':jamP', $data['jamP']);
        // $this->db->bind('namaB', $namaB);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahDataPinjamR($data)
    {
        $query = "INSERT INTO table_pinjamruang (kodeP_ruang, namaP, nimP, noWA, kodeR, tanggalP_ruang, jamP_ruang, statusP_ruang) VALUES (:kodeP, :namaP, :nimP, :noWA, :kode, :tanggalP, :jamP, 'DIKIRIM')";
        $this->db->query($query);
        $this->db->bind(':kodeP', $data['kodeP']);
        $this->db->bind(':namaP', $data['namaP']);
        $this->db->bind(':nimP', $data['nimP']);
        $this->db->bind(':noWA', $data['noWA']);
        $this->db->bind(':kode', $data['kode']);
        $this->db->bind(':tanggalP', $data['tanggalP']);
        $this->db->bind(':jamP', $data['jamP']);
        // $this->db->bind('namaR', $namaR);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDataBerhasilB($kodeP)
    {
        $query = "SELECT * FROM table_pinjambarang WHERE kodeP_barang = :kodeP";
        $this->db->query($query);
        $this->db->bind(':kodeP', $kodeP);
        return $this->db->resultSet();
    }

    public function getDataBerhasilR($kodeP)
    {
        $query = "SELECT * FROM table_pinjamruang WHERE kodeP_ruang = :kodeP";
        $this->db->query($query);
        $this->db->bind(':kodeP', $kodeP);
        return $this->db->resultSet();
    }

    public function hapusDataB($kodeP, $kodeB, $jamP)
    {
        $query = "DELETE FROM table_pinjambarang WHERE kodeB=:kodeB AND kodeP_barang=:kodeP AND jamP_barang=:jamP";
        $this->db->query($query);
        $this->db->bind('kodeB', $kodeB);
        $this->db->bind('kodeP', $kodeP);
        $this->db->bind('jamP', $jamP);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function hapusDataR($kodeP, $kodeR, $jamP)
    {
        $query = "DELETE FROM table_pinjamruang WHERE kodeR=:kodeR AND kodeP_ruang=:kodeP AND jamP_ruang=:jamP";
        $this->db->query($query);
        $this->db->bind('kodeR', $kodeR);
        $this->db->bind('kodeP', $kodeP);
        $this->db->bind('jamP', $jamP);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllPinjamBkirim()
    {
        $this->db->query('SELECT kodeP_barang, namaP, tanggalP_barang, statusP_barang FROM `table_pinjambarang` WHERE statusP_barang="DIKIRIM" GROUP BY kodeP_barang ORDER BY tanggalP_barang ASC ');
        return $this->db->resultSet();
    }

    public function getAllPinjamRkirim()
    {
        $this->db->query('SELECT kodeP_ruang, namaP, tanggalP_ruang, statusP_ruang FROM table_pinjamruang WHERE statusP_ruang="DIKIRIM" GROUP BY kodeP_ruang ORDER BY tanggalP_ruang ASC ');
        return $this->db->resultSet();
    }

    public function getAllVerifB($kodeP)
    {
        $this->db->query('SELECT pb.kodeP_barang, pb.tanggalP_barang, pb.kodeB, b.namaB, pb.jamP_barang, pb.statusP_barang  FROM table_pinjambarang AS pb NATURAL JOIN table_barang as b WHERE kodeP_barang = :kodeP AND statusP_barang="DIKIRIM"');
        $this->db->bind(':kodeP', $kodeP);
        return $this->db->resultSet();
    }

    public function getAllVerifR($kodeP)
    {
        $this->db->query('SELECT pb.kodeP_ruang, pb.tanggalP_ruang, pb.kodeR, b.namaR, pb.jamP_ruang, pb.statusP_ruang  FROM table_pinjamruang AS pb NATURAL JOIN table_ruang as b WHERE kodeP_ruang = :kodeP AND statusP_ruang="DIKIRIM"');
        $this->db->bind(':kodeP', $kodeP);
        return $this->db->resultSet();
    }

    public function getAllPinjamBterus()
    {
        $this->db->query('SELECT kodeP_barang, namaP, tanggalP_barang, statusP_barang FROM `table_pinjambarang` WHERE statusP_barang="DITERUSKAN" GROUP BY kodeP_barang ORDER BY tanggalP_barang ASC ');
        return $this->db->resultSet();
    }

    public function getAllPinjamRterus()
    {
         $this->db->query('SELECT kodeP_ruang, namaP, tanggalP_ruang, statusP_ruang FROM table_pinjamruang WHERE statusP_ruang="DITERUSKAN" GROUP BY kodeP_ruang ORDER BY tanggalP_ruang ASC ');
        return $this->db->resultSet();
    }

    public function getDataMahasiswa()
    {
        $query = "SELECT id_mahasiswa FROM table_mahasiswa";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getAllKonfirmB($kodeP)
    {
        $this->db->query('SELECT pb.kodeP_barang, pb.tanggalP_barang, pb.kodeB, b.namaB, pb.jamP_barang, pb.statusP_barang  FROM table_pinjambarang AS pb NATURAL JOIN table_barang as b WHERE kodeP_barang = :kodeP AND statusP_barang="DITERUSKAN"');
        $this->db->bind(':kodeP', $kodeP);
        return $this->db->resultSet();
    }

    public function getAllkonfirmR($kodeP)
    {
        $this->db->query('SELECT pb.kodeP_ruang, pb.tanggalP_ruang, pb.kodeR, b.namaR, pb.jamP_ruang, pb.statusP_ruang  FROM table_pinjamruang AS pb NATURAL JOIN table_ruang as b WHERE kodeP_ruang = :kodeP AND statusP_ruang="DITERUSKAN"');
        $this->db->bind(':kodeP', $kodeP);
        return $this->db->resultSet();
    }

    

    public function ubahStatusR($data)
    {
        $query = "UPDATE table_pinjamruang SET statusP_ruang = :statusP WHERE kodeP_ruang = :id AND kodeR = :kode";

        $this->db->query($query);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':kode', $data['kode']);
        $this->db->bind(':statusP', $data['status']);

        if ($this->db->execute()) {
            return $this->db->rowCount();
        }
    }
    public function ubahStatusB($data)
    {
        $query = "UPDATE table_pinjambarang SET statusP_barang = :statusP WHERE kodeP_barang = :id AND kodeB = :kode";

        $this->db->query($query);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':kode', $data['kode']);
        $this->db->bind(':statusP', $data['status']);

        if ($this->db->execute()) {
            return $this->db->rowCount();
        }
    }
}
