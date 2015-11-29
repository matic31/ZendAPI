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
            
            /*$admin_links=array(
               $this->view->outputLink($this->view->url(array('controller'=>'Administracija','action'=>'galerije','operacija'=>'izmena','id'=>$row->getId()),'default',true),'Izmeni'), 
                $this->view->outputLink($this->view->url(array('controller'=>'Administracija','action'=>'galerije','operacija'=>'brisanje','id'=>$row->getId()),'default',true),'Obrisi')
            );*/
            //$konvertovan_red=(array)$row;
            
            $cons[]=$row;
            
            
        }
        return $cons;
        
    }
    
}
