<?php

class Application_Model_DbTable_Gallery extends Zend_Db_Table_Abstract
{

    protected $_name = 'gallery';
    protected $_id = 'idGallery';
    protected $_referenceMap=array(
        'Concert'=>array(
            'columns'=>array('idConcert'),
            'refTableClass'=>'Application_Model_DbTable_Concerts',
            'refColumns'=>'idConcert'
        )
    );


}

