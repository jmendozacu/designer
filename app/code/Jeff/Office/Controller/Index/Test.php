<?php
namespace Jeff\Office\Controller\Index;
class Test extends \Magento\Framework\App\Action\Action
{

    protected $resultPageFactory;
    protected $employeeFactory;
    protected $departmentFactory;


/*
Note the EmployeeFactory and DepartmentFactory are not classes created by us.
Magento will autogenerate them under the DepartmentFactory.php and EmployeeFactory.phpfiles within 
the var/generation/Jeff/Office/Model filder. These are factory classes for our Employee and
Department model classes, gnerated when requested.

*/
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Jeff\Office\Model\EmployeeFactory $employeeFactory,
        \Jeff\Office\Model\DepartmentFactory $departmentFactory
        
    )
    {
        $this->resultPageFactory = $resultPageFactory; 
        $this->employeeFactory = $employeeFactory;
        $this->departmentFactory = $departmentFactory;
        return parent::__construct($context); //should have return keyword or not.
    }
    
    public function execute()
    {
        //return $this->resultPageFactory->create();  
        //echo __METHOD__;
        $department1 = $this->departmentFactory->create();
        $department1->setName('Finance');
        $department1->save();

        $department2 = $this->departmentFactory->create();
        $department2->setData('name', 'Research');
        $department2->save();

        $department3 = $this->departmentFactory->create();
        $department3->setData(['name' => 'Support']);
        $department3->save();

        //EAV model 
        $employee1 = $this->employeeFactory->create();
        $employee1->setDepartment_id(2);
        $employee1->setEmail('haha@dummy.com');
        $employee1->setFirstName('Ha');
        $employee1->setLastName('Hhaha');
        $employee1->setServiceYears(4);
        $employee1->setDob('1984-03-23');
        $employee1->setSalary(4500.00);
        $employee1->setVatNumber('GB1234566BG');
        $employee1->setNote('Note #1');
        $employee1->save();

        $employee1 = $this->employeeFactory->create();
        $employee1->setData('department_id',2);
        $employee1->setData('email', 'google@dummy.com');
        $employee1->setData('first_name', 'Google');
        $employee1->setData('last_name','Google');
        $employee1->setData('service_years', 4);
        $employee1->setData('dob', '1984-03-23');
        $employee1->setData('salary', 4500.00);
        $employee1->setData('vat_number', 'SB1234566BS');
        $employee1->setData('Note', 'Note #1');
        $employee1->save();

        echo "done<br>";
    }
}
