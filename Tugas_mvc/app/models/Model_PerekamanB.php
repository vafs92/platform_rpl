<?php
class Model_PerekamanB {
    private $table = 'table_barang';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllPerekaman() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPerekamanByKodeB($kodeB) {
       $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kodeB=:kodeB');
        $this->db->bind('kodeB', $kodeB);
        return $this->db->single();
    }
    public function tambahDataB($data){
        $query = "INSERT INTO `table_barang`(`kodeB`, `namaB`) VALUES (:kodeB, :namaB)";
    
        $this->db->query($query);
        $this->db->bind('kodeB', $data['kodeB']);
        $this->db->bind('namaB', $data['namaB']);
    
        $this->db->execute();
        return $this->db->rowCount(); 
    }

    public function hapusDataB($kodeB){
        $query = "DELETE FROM table_barang WHERE kodeB=:kodeB";
        $this->db->query($query);
        $this->db->bind('kodeB', $kodeB);

        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahDataB($data)
    {
        $query = "UPDATE table_barang SET kodeB = :kodeB, namaB = :namaB WHERE kodeB = :kodeB";

        $this->db->query($query);
        $this->db->bind('kodeB', $data['kodeB']);
        $this->db->bind('namaB', $data['namaB']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function cariDataB()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM table_barang WHERE namaB LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
?>
