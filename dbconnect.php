<<?php

    class DB {
       private $db;
    
    public function __construct() {
        $dsn= 'mysql:host=localhost;dbname=final_library';
        $this->db = new PDO($dsn, 'root','');
    }
    
    public function query($sql, $args = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);     
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insert($sql, $args = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($args);     
        return;
    }
}

