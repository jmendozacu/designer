<?php
namespace Jeff\Office\Model\ResourceModel\Employee;

use Magento\Eav\Model\Entity\Collection\AbstractCollection;

class Collection extends AbstractCollection {
    protected function _construct() {
        /*Full model classname, Full resourcemodel classname*/
        $this->_init('Jeff\Office\Model\Employee', 'Jeff\Office\Model\ResourceModel\Employee');
    }
}
