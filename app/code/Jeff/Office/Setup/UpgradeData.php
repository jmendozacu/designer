<?php
namespace Jeff\Office\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/*
UpgradeData conforms to UpgradeDataInterface, which requires the implementation of the upgrade
method taht accepts two parameters of type ModuleDataSetupInterface and ModuelContextInterface. 
We are further adding our own __construct method to which we are passing DepartmentFactory and 
EmployeeeFactory, as we will be using them within the upgrade method as shown next.
*/
class UpgradeData implements UpgradeDataInterface {
    protected $departmentFactory;
    protected $employeeFactory;

    public function __construct(
        \Jeff\Office\Model\DepartmentFactory $departmentFactory,
        \Jeff\Office\Model\EmployeeFactory $employeeFactory
    ) {
        $this->departmentFactory = $departmentFactory;
        $this->employeeFactory = $employeeFactory; 
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();
       
        $salesDepartment = $this->departmentFactory->create();
        $salesDepartment->setName('Sales');
        $salesDepartment->save();

        $employee = $this->employeeFactory->create();
        $employee->setDepartmentId($salesDepartment->getId());
        $employee->setEmail('jyu@gwiusa.com');
        $employee->setFirstName('Jeff');
        $employee->setLastName('Yu');
        $employee->setServiceYears(3);
        $employee->setDob('1999-01-01');
        $employee->setSalary('5400.00');
        $employee->setVatNumber('GB12345678');
        $employee->setNote('Just some notes about John');
        $employee->save();

        $setup->endSetup();
    }
}
