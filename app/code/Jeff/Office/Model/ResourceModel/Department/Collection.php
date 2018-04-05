<?php
namespace Jeff\Office\Model\ResourceModel\Department;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection {
    /*@var model class name, @var ResourceModel calss name*/
    protected function _construct() {
        $this->_init('Jeff\Office\Model\Department', 'Jeff\Office\Model\ResourceModel\Department');
    }
}
