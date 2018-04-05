<?php
namespace Jeff\Office\Model;

use Magento\Framework\Model\AbstractModel;

/*
The only difference here is that we have an ENTITY constant defined, but this is merely syntactical sugar for later on.
*/
class Employee extends AbstractModel {

    const ENTITY = 'jeff_employee';

    protected function _construct() {
        /*@var full resource class name */
        $this->_init('Jeff\Office\Model\ResourceModel\Employee');
    }
}
