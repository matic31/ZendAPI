<?php

class Application_Model_ConcertMapper
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
            $this->setDbTable('Application_Model_DbTable_Concerts');
        }
        
        return $this->_dbTable;
    }
    
    public function save(Application_Model_Concert $concert){
        $data=array(
                  'city'=>$concert->getCity(),
                  'place' => $concert->getPlace(),
                  'time' => time()
        );
        
        if(null===($id=$concert->getId())){
            unset($data['id']);
            $this->getDbTable()->insert($data);
        }else{
            $this->getDbTable()->update($data,array('idConcert=?'=>$id));
        }
    }
    
    public function find($id, Application_Model_Concert $concert){
        $result=$this->getDbTable()->find($id);
        if(count($result)==0){
            return;
        }
        $row=$result->current();
        $concert->setId($row->idConcert);
        $concert->setCity($row->city);
        $concert->setPlace($row->place);
        $concert->setTime($row->time);
    }
    
    public function fetchAll(){
        $resultSet=$this->getDbTable()->fetchAll();
        $concerts=array();
        /*$concerts[]=array('asd'=>'asd', 'qwe'=>'qwe');
        $concerts[]=array('asd'=>'asd2', 'qwe'=>'qwe2');*/
        foreach ($resultSet as $row){
//            $concert=new Application_Model_Concert();
//            $concert->setId($row->idConcert);
//            $concert->setCity($row->city);
//            $concert->setPlace($row->place);
//            $concert->setTime($row->time);
            $concert=array();
            $concert['idConcert']=$row->idConcert;
            $concert['city']=$row->city;
            $concert['place']=$row->place;
            $concert['time']=$row->time;
            $concerts[]=$concert;
          

        }
        
        return $concerts;
    }
    
    public function delete($id){
        $where['idConcert=?']=$id;
        $this->getDbTable()->delete($where);
    }
}

