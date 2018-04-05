<?php
namespace Jeff\Office\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;;

class Department extends AbstractDb {
    protected function _construct() {
        /*@var tablename, @var primary key*/
        $this->_init('jeff_department', 'entity_id');
    }
}
