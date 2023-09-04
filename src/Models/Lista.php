<?php

use FTP\Connection;

class Lista {

    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getLista()
    {
        $array = array();

        $sql = $this->db->query("SELECT * FROM address");
        if($sql->rowCount() > 0)
        {
            $array = $sql->fetchAll();
        } 

        return $array;
    }
}