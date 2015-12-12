<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RAManager
 *
 * @author Nikola
 */
class RiseAgainst_RAManager {

    public function getConcerts(){
        $concertMapper= new Application_Model_ConcertMapper() ;
         $cons=array();
        foreach($concertMapper->fetchAll() as $row){
          
            $cons[]=$row;
        }
        return $cons;
        
    }
    
    public function getConcert($id){
        $concertMapper = new Application_Model_ConcertMapper();
        $concert = new Application_Model_Concert();
        $concertMapper->find($id, $concert);
        return $concert;
        
    }
    
    public function getImages(){
        $imageMapper = new Application_Model_ImageMapper();
        $images = array();
        foreach ($imageMapper->fetchAll() as $row) {
            $images[] = $row;
        }
        
        return $images;
        
    }
    
}
