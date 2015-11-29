<?php

class Application_Model_Role
{
    protected $_id;
    protected $_name;
    
    public function  __construct(array $options=null){
    
        if(is_array($options)){
            $this->setOptions($options);
        }
    }
    
    public function _set($name,$value){
    
    $method='set'.$name;
    if(('mapper'==$name) || !method_exists($this,$method)){
       throw  new Exception('Svojstvo za Role nije definisano');
    }
    $this->$method($value);
        
    }
    
    public function _get($name,$value){
        $method='get'.$name;
        if(('mapper'==$name) || !method_exists($this,$method)){
            throw  new Exception('Svojstvo za Role nije definisano');
       }
    }
    
    public function setOptions(array $options){
       $methods=get_class_methods($this);
       
       foreach($options as $key=>$value){
           $method='set'.ucfirst($key);
           if(in_array($method,$methods)){
               $this->$method($value);
           }
       }
       return $this;
    }
    
    function getId() {
        return $this->_id;
    }

    function getName() {
        return $this->_name;
    }

    function setId($_id) {
        $this->_id = $_id;
    }

    function setName($_name) {
        $this->_name = $_name;
    }



}

