<?php

class Application_Model_Gallery
{
    public $idGallery;
    public $concert;
    public $url;
    public $alt;
    
    function getIdGallery() {
        return $this->idGallery;
    }

    function getConcert() {
        return $this->concert;
    }

    function getUrl() {
        return $this->url;
    }

    function getAlt() {
        return $this->alt;
    }

    function setIdGallery($idGallery) {
        $this->idGallery = $idGallery;
        return $this;
    }

    function setConcert($concert) {
        $this->concert = $concert;
        return $this;
    }

    function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    function setAlt($alt) {
        $this->alt = $alt;
        return $this;
    }



}

