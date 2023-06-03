<?php
class Model_User {
    private $table = 'table_user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserByUsername($username)
    {
        $this->db->query('SELECT * FROM table_user WHERE username = :username');
        $this->db->bind(':username', $username);
        return $this->db->single();
    }
    public function getUserByUsernameAndPassword($username, $password) {
    // Query database untuk mendapatkan data pengguna berdasarkan username dan password
        $query = "SELECT * FROM table_user WHERE username = :username AND password = :password";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        return $this->db->single();
    }

}
