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
    
}
