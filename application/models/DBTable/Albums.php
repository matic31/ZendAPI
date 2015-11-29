<?php

class Application_Model_DbTable_Albums extends Zend_Db_Table_Abstract
{

    protected $_id='idAlbum';
    protected $_name = 'album';
    protected $_image = 'url';
    protected $_description = 'generic description';
    protected $_releaseTime = 1111111111;
    protected $_signatureImage = 'signature_url';
    protected $_dependentTables=array('Application_Model_DbTable_Songs');


}

