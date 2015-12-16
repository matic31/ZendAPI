<?php

class Application_Model_Image
{
    public $idImage;
    public $concert;
    public $url;
    public $alt;
    
    public function _set($name,$value){
    
    $method='set'.$name;
    if(('mapper'==$name) || !method_exists($this,$method)){
       throw  new Exception('Image property is not defined');
    }
    $this->$method($value);
        
    }
    
    public function _get($name,$value){
        $method='get'.$name;
        if(('mapper'==$name) || !method_exists($this,$method)){
            throw  new Exception('Image property is not defined');
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
    
    public function getIdImage() {
        return $this->idImage;
    }

    public function getConcert() {
        return $this->concert;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getAlt() {
        return $this->alt;
    }

    public function setIdImage($idImage) {
        $this->idImage = $idImage;
        return $this;
    }

    public function setConcert($concert) {
        $this->concert = $concert;
        return $this;
    }

    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    public function setAlt($alt) {
        $this->alt = $alt;
        return $this;
    }


}

