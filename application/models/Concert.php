<?php

class Application_Model_Concert
{
    protected $_id;
    protected $_city;
    protected $_place;
    protected $_time;
    protected $_gallery;
    
    
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
    }

    function setCity($_city) {
        $this->_city = $_city;
    }

    function setPlace($_place) {
        $this->_place = $_place;
    }

    function setTime($_time) {
        $this->_time = $_time;
    }
    
    public function getGallery(){
        return $this->_gallery;
    }
    
    public function setGallery($gallery){
        $this->_gallery=$gallery;
        return $this;
    }



}

