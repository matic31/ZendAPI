<?php

class Application_Model_ImageMapper
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
            $this->setDbTable('Application_Model_DbTable_Images');
        }
        
        return $this->_dbTable;
    }
    
    public function save(Application_Model_Image $image){
        $data=array(
                  'url'=>$image->getUrl(),
                  'alt'=>$image->getAlt()
        );
        
        if(null===($id=$image->getIdImage())){
            unset($data['id']);
            $this->getDbTable()->insert($data);
        }else{
            $this->getDbTable()->update($data,array('idImage=?'=>$id));
        }
    }
    
    public function find($id, Application_Model_Image $image){
        $result=$this->getDbTable()->find($id);
        if(count($result)==0){
            return;
        }
        $row=$result->current();
        $image->setIdImage($row->idImage)->setAlt($row->alt)->setUrl($row->url)->setConcert($row->findParentRow('Application_Model_DbTable_Concerts'));
        
    }
    
    public function fetchAll(){
        $resultSet=$this->getDbTable()->fetchAll();
        $images=array();
        
        foreach ($resultSet as $row){
            $image=new Application_Model_Image();
            $image->setIdImage($row->idImage)->setAlt($row->alt)->setUrl($row->url)->setConcert($row->findParentRow('Application_Model_DbTable_Concerts'));
            
            $images[]=$image;
        }
        
        return $images;
    }

}

