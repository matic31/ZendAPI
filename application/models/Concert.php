<?php

class Application_Model_Concert
{
     public $_id;
     public $_city;
     public $_place;
     public $_time;
     public $_gallery;
    
    
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
    public function toArray() {
        //return array('idConcert' => $this->_id, '');
    }




}

