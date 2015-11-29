<?php

class Application_Model_RoleMapper
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
            $this->setDbTable('Application_Model_DbTable_Roles');
        }
        
        return $this->_dbTable;
    }
    
    public function save(Application_Model_Role $role){
        $data=array(
                  'idRole'=>$role->getId(),
                  'nameRole' => $role->getName()
        );
        
        if(null===($id=$role->getId())){
            unset($data['id']);
            $this->getDbTable()->insert($data);
        }else{
            $this->getDbTable()->update($data,array('idRole=?'=>$id));
        }
    }
    
    public function find($id, Application_Model_Role $role){
        $result=$this->getDbTable()->find($id);
        if(count($result)==0){
            return;
        }
        $row=$result->current();
        $role->setId($row->idRole);
        $role->setName($row->nameRole);
    }
    
    public function fetchAll(){
        $resultSet=$this->getDbTable()->fetchAll();
        $roles=array();
        /*$concerts[]=array('asd'=>'asd', 'qwe'=>'qwe');
        $concerts[]=array('asd'=>'asd2', 'qwe'=>'qwe2');*/
        foreach ($resultSet as $row){
            $role=new Application_Model_Role();
            $role->setId($row->idConcert);
            $role->setName($row->nameRole);
            $roles[]=$role;
          

        }
        
        return $concerts;
    }
    
    public function delete($id){
        $where['idRole=?']=$id;
        $this->getDbTable()->delete($where);
    }

}

