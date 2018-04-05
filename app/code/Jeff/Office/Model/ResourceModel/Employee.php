<?php
namespace Jeff\Office\Model\ResourceModel;

/*
simple model extends from 
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
*/
use Magento\Eav\Model\Entity\AbstractEntity;

class Employee extends AbstractEntity {
    protected function _construct() {
        $this->_read = 'jeff_employee_read';
        $this->_write = 'jeff_employee_write';
    }

    public function getEntityType() {
        if(empty($this->_type)) {
            $this->setType(\Jeff\Office\Model\Employee::ENTITY);
        }

        return parent::getEntityType();
    }
}
/*
Our resource clas extends from \Magento\Eav\Model\Entity\AbstractEntity, 
and sets the $this->_read, $this->_write class propertos through _construct.

These are freely assigned to whatever value we want, preferably following the
naming pattern of our module. The read and write connections need to be named
or else Magento produces an error when using our entities.

The getEntityType method internally sets the _type value to \Jeff\Office\Model\Employee:ENTITY,
which is the string jeff_employee. 
This same value is what's stored in the entity_type_code column within the eav_entity_type table.

At this point, there is no such entry in the eav_entity_type table. This is because the install schema
script will be creating one, as we will be demonstrating soon.

*/
