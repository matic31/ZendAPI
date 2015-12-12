<?php

class Application_Model_Concert
{
     public $_id;
     public $_city;
     public $_place;
     public $_time;
     public $_gallery;
    
     public function  __construct(array $options=null){
    
        if(is_array($options)){
            $this->setOptions($options);
        }
    }
    
    public function _set($name,$value){
    
    $method='set'.$name;
    if(('mapper'==$name) || !method_exists($this,$method)){
       throw  new Exception('Svojstvo za Galeriju nije definisano');
    }
    $this->$method($value);
        
    }
    
    public function _get($name,$value){
        $method='get'.$name;
        if(('mapper'==$name) || !method_exists($this,$method)){
            throw  new Exception('Svojstvo za Geleriju nije definisano');
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

    function getCity() {
        return $this->_city;
    }

    function getPlace() {
        return $this->_place;
    }

    function getTime() {
        return $this->_time;
    }

    function setId($_id) {
        $this->_id = $_id;
        return $this;
    }

    function setCity($_city) {
        $this->_city = $_city;
        return $this;
    }

    function setPlace($_place) {
        $this->_place = $_place;
        return $this;
    }

    function setTime($_time) {
        $this->_time = $_time;
        return $this;
    }
    
    public function getGallery(){
        return $this->_gallery;
    }
    
    public function setGallery($gallery){
        $this->_gallery=$gallery;
        return $this;
    }




}

