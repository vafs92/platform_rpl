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
}