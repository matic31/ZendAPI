<?php

class Application_Model_TestModel
{
protected $db;
    public $idGalerija;
    public $naziv;
    
    function __construct() {
        try {
            $this->db = Zend_Db_Table::getDefaultAdapter();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function fetchAll() {
        //$result = $this->db->query("SELECT * FROM galerija");
        $selectResult = $this->db->select()->from('concert');
        $result = $this->db->query($selectResult);
        return $result->fetchAll();
    }

}

