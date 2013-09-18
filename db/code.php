<?php
namespace \OCA\YourApp\Db;

use \OCA\AppFramework\Db\Entity

class Code extends Entity {
    
    // Note: a field id is set automatically by the parent class
    public $code;
    public $uses;
    public $max_uses;
    public $expiration_date;
    public $timestamp;

    public function __construct(){
        // cast timestamp to an int when fromRow is being called
        // the second parameter is the argument that is passed to
        // the php function settype()
        $this->addType('timestamp', 'int')
    }
}
