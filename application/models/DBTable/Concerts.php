<?php

class Application_Model_DbTable_Concerts extends Zend_Db_Table_Abstract
{
    protected $_name = 'concert';
    protected $_id = 'idConcert';
    protected $_dependentTables=array('Application_Model_DbTable_Images');


}

