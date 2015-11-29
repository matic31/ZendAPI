<?php

class Application_Model_AlbumMapper
{
protected $_dbTable;
    
    public function setDbTable($dbTable){
        if(is_string($dbTable)){
            $dbTable=new $dbTable();
        }
        if(!$dbTable instanceof Zend_Db_Table_Abstract){
            throw new Exception("Nepostojeci table gateway");
        }
        $this->_dbTable=$dbTable;
        return $this;
    }
    
    public function getDbTable(){
        if(null==$this->_dbTable){
            $this->setDbTable('Application_Model_DbTable_Gallery');
        }
        
        return $this->_dbTable;
    }
    
    public function save(Application_Model_Galerija $galerija){
        $data=array(
                  'naziv'=>$galerija->getNaziv()
        );
        
        if(null===($id=$galerija->getId())){
            unset($data['id']);
            $this->getDbTable()->insert($data);
        }else{
            $this->getDbTable()->update($data,array('idGalerija=?'=>$id));
        }
    }
    
    public function find($id,  Application_Model_Galerija $galerija){
        $result=$this->getDbTable()->find($id);
        if(count($result)==0){
            return;
        }
        $row=$result->current();
        $galerija->setId($row->idGalerija)->setNaziv($row->naziv)->setSlike((array)($row->findDependentRowset('Application_Model_DbTable_Slike')));
    }
    
    public function fetchAll(){
        $resultSet=$this->getDbTable()->fetchAll();
        $galerije=array();
        
        foreach ($resultSet as $row){
            $galerija=new Application_Model_Galerija();
            $galerija->setId($row->idGalerija)->setNaziv($row->naziv)->setSlike((array)($row->findDependentRowset('Application_Model_DbTable_Slike')));
            
            $galerije[]=$galerija;
          

        }
        
        return $galerije;
    }
    
    public function delete($id){
        $where['idGalerija=?']=$id;
        $this->getDbTable()->delete($where);
    }

}

