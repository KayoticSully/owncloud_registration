<?php
namespace \OCA\YourApp\Db;

use \OCA\AppFramework\Db\Mapper;

class CodeMapper extends Mapper {
    
    public function __construct(API $api) {
        parent::__construct($api, 'registration_codes'); // tablename
    }
    
    public function find($id){
        $sql = 'SELECT * FROM `' . $this->getTableName() . '` ' .
               'WHERE `id` = ? ';
        
        // use findOneQuery to throw exceptions when no entry or more than one
        // entries were found
        $row = $this->findOneQuery($sql, array($id));
        $code = new Code();
        $code->fromRow($row);
        
        return $code;
    }
    
    public function findByName($code){
        $sql = 'SELECT * FROM `' . $this->getTableName() . '` ' .
               'WHERE `code` = ? ';
        
        $row = $this->execute($sql, array($code));
        $code = new Item();
        $code->fromRow($row);
        
        return $code;
    }
}