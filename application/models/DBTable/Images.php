<?php

class Application_Model_DbTable_Images extends Zend_Db_Table_Abstract
{

    protected $_name = 'image';
    protected $_id='idImage';
    protected $_referenceMap=array(
        'Concert'=>array(
            'columns'=>array('idConcert'),
            'refTableClass'=>'Application_Model_DbTable_Concerts',
            'refColumns'=>'idConcert'
        )
    );


}

