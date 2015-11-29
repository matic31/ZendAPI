<?php

class Application_Model_Album
{
    protected $_id;
    protected $_name;
    protected $_image;
    protected $_description;
    protected $_releaseTime;
    protected $_signatureImage;
    protected $_songs;
    
    public function setSongs($songs){
        
    }

        public function _set($name, $value) {

        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Property for Album is not defined');
        }
        $this->$method($value);
    }

    public function _get($name) {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Property for Album is not defined');
        }
    }

    public function setOptions(array $options) {
        $methods = get_class_methods($this);

        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
    
    
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getImage() {
        return $this->image;
    }

    function getDescription() {
        return $this->description;
    }

    function getReleaseTime() {
        return $this->releaseTime;
    }

    function getSignatureImage() {
        return $this->signatureImage;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setReleaseTime($releaseTime) {
        $this->releaseTime = $releaseTime;
    }

    function setSignatureImage($signatureImage) {
        $this->signatureImage = $signatureImage;
    }



}

