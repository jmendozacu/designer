<?php
namespace Jeff\Office\Model;
use Magento\Framework\Model\AbstractModel;

class Department extends abstractModel {
    protected function _construct() {
        /*@var Jeff\Office\Model\ResourceModel\Department     full resource classname */
        $this->_init('Jeff\Office\Model\ResourceModel\Department');
    }
}
