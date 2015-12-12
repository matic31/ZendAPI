<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $concertMapper= new Application_Model_ConcertMapper() ;
//         $cons=array();
//        foreach($concertMapper->fetchAll() as $row){
//         
//            //$konvertovan_red=(array)$row;
//            $cons[]=$row;
//            
//            
//        }
//        
//        /*$cons=new Application_Model_TestModel();
//        $c=$cons->fetchAll();*/
//        //echo $cons[1]['_time']."hahahahahahah";
//        echo $cons[0]->getCity();
       // print_r($concertMapper->fetchAll());
        //print_r($cons);
        $imageMapper = new Application_Model_ImageMapper();
        print_r($imageMapper->fetchAll());
    }

    public function manageAction()
    {
        // action body
        //$this->_helper->layout()->disableLayout();
        $this->getHelper('viewRenderer')->setNoRender(TRUE);
        
        $soapOptions = array('uri' => 'http://servis/Index/manage');
        $server = new Zend_Soap_Server(NULL, $soapOptions); //bez wsdl-a
        
        $server->setClass('RiseAgainst_RAManager');
        $server->registerFaultException(array('RiseAgainst_Exception'));
        $server->handle();
        //echo 'pera';
        
        
    }


}



