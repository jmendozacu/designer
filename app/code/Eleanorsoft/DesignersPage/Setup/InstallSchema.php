<?php

namespace Eleanorsoft\DesignersPage\Setup;
use Eleanorsoft\DesignersPage\Api\Data\DesignerInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;


/**
 * Class InstallSchema
 * todo: What is its purpose? What does it do?
 *
 * @package Eleanorsoft_
 * @author Pisarenko Denis <denis.pisarenko@eleanorsoft.com>
 * @copyright Copyright (c) 2018 Eleanorsoft (https://www.eleanorsoft.com/)
 */

class InstallSchema implements InstallSchemaInterface
{

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $prefix = DesignerInterface::ENTITY;

        /* Start creation es_designers_page_entity  */

        $designerEntity = $prefix . '_entity';

        if ($setup->getConnection()->isTableExists($designerEntity) != true) {

            $table = $setup->getConnection()->newTable($designerEntity)

                ->addColumn('entity_id', Table::TYPE_INTEGER, null,
                    array(
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ),
                    'Entity ID'
                )
                ->addColumn('sort', Table::TYPE_INTEGER, null,
                    array(
                        'nullable' => true,
                        'unsigned' => true
                    ),
                    'Sorting'
                );

            $setup->getConnection()->createTable($table);
        }

        /* Start creation es_designers_page_entity_varchar  */

        $designerEntityVarchar = $prefix . '_entity_varchar';

        if ($setup->getConnection()->isTableExists($designerEntityVarchar) != true) {

            $table = $setup->getConnection()->newTable($designerEntityVarchar)

                ->addColumn('value_id', Table::TYPE_INTEGER, null,
                    array(
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ),
                    'Entity ID'
                )
                ->addColumn('full_name_id', Table::TYPE_SMALLINT, null,
                    array(
                        'unsigned' => true,
                        'nullable' => false,
                    ),
                    'Full Name'
                )
                ->addColumn('photo_id', Table::TYPE_SMALLINT, null,
                    array(
                        'unsigned' => true,
                        'nullable' => true,
                    ),
                    'Photo of a designer\'s'
                )
                ->addColumn('alternative_photo_id', Table::TYPE_SMALLINT, null,
                    array(
                        'unsigned' => true,
                        'nullable' => true,
                    ),
                    'Alternative photo of a designer'
                )
                ->addColumn('banner_id', Table::TYPE_SMALLINT, null,
                    array(
                        'unsigned' => true,
                        'nullable' => true,
                    ),
                    'Banner for an individual designer page'
                )


            $setup->getConnection()->createTable($table);
        }

        /* Start creation es_designers_page_entity_text  */

        $designerEntityText = $prefix . '_entity_text';

        if ($setup->getConnection()->isTableExists($designerEntityText) != true) {

            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }

    public function install2(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        /**
         *
         * Create eleanorsoft_designers Table
         */
        $tableName = $setup->getTable('eleanorsoft_designers');

        if ($setup->getConnection()->isTableExists($tableName) != true){
            $table = $setup->getConnection()->newTable($tableName)

                ->addColumn('designer_id', Table::TYPE_INTEGER, null,
                    array(
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ),
                    'Designer Id'
                )
                ->addColumn('full_name', Table::TYPE_TEXT, 255,
                    array(
                        'nullable' => false
                    ),
                    'Full Name'
                )
                ->addColumn('photo', Table::TYPE_TEXT, 255,
                    array(
                        'nullable' => true
                    ),
                    'Photo of a designer\'s'
                )
                ->addColumn('alternative_photo', Table::TYPE_TEXT, 255,
                    array(
                        'nullable' => true
                    ),
                    'Alternative photo of a designer'
                )
                ->addColumn('banner', Table::TYPE_TEXT, 255,
                    array(
                        'nullable' => true
                    ),
                    'Banner for an individual designer page'
                )
                ->addColumn('description', Table::TYPE_TEXT, Table::MAX_TEXT_SIZE,
                    array(
                        'nullable' => true
                    ),
                    'Description'
                )
                ->addColumn('sort', Table::TYPE_INTEGER, null,
                    array(
                        'nullable' => true,
                        'unsigned' => true
                    ),
                    'Sorting'
                );
            $setup->getConnection()->createTable($table);
        }
        $setup->endSetup();
    }

    public function install1(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();

        $table = $setup->getConnection()
            ->newTable($setup->getTable('jeff_department'))
            ->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity'=>true, 'unsigned'=>true, 'nullable'=>false, 'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'Name'
            )
            ->setComment('Jeff Department Table');

        $setup->getConnection()->createTable($table);

        $employeeEntity = \Jeff\DataTutorial\Model\Employee::ENTITY;

        $table = $setup->getConnection()
            ->newTable($setup->getTable($employeeEntity . '_entity'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned'=>true, 'nullable'=>false, 'primary' => true],
                'Entity Id'
            )
            ->addColumn(
                'department_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned'=>true, 'nullable'=>false],
                'Department Id'
            )
            ->addColumn(
                'email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'EMail'
            )
            ->addColumn(
                'first_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'First Name'
            )
            ->addColumn(
                'last_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                64,
                [],
                'Last Name'
            )
            ->setComment('Jeff_DataTutorial Employee Table');
        $setup->getConnection()->createTable($table);

        $table = $setup->getConnection()
            ->newTable($setup->getTable($employeeEntity . '_entity_decimal'))
            ->addColumn(
                'value_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity'=>true, 'nullable'=>false, 'primary'=>true],
                'Value ID'
            )
            ->addColumn(
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned'=>true, 'nullable'=>false, 'default'=>'0'],
                'Attribute Id'
            )
            ->addColumn(
                'store_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned'=>true, 'nullable'=>false, 'default'=>'0'],
                'Store ID'
            )
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['unsigned' => true, 'nullable'=>false, 'default'=>'0'],
                'Entity Id'
            )
            ->addColumn(
                'value',
                \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                '12,4',
                [],
                'value'
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_decimal',
                    ['entity_id', 'attribute_id', 'store_id'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE),
                ['entity_id', 'attribute_id', 'store_id'],
                ['type'=>\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_decimal',
                    ['store_id']),
                ['store_id']
            )
            ->addIndex(
                $setup->getIdxName($employeeEntity . '_entity_decimal',
                    ['attribute_id']),
                ['attribute_id']
            )
            ->addForeignKey(
                $setup->getFkName(
                    $employeeEntity . '_entity_decimal',
                    'attribute_id',
                    'eav_attribute',
                    'attribute_id'
                ),
                'attribute_id',
                $setup->getTable('eav_attribute'),
                'attribute_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName(
                    $employeeEntity . '_entity_decimal',
                    'entity_id',
                    $employeeEntity . '_entity',
                    'entity_id'
                ),
                'entity_id',
                $setup->getTable($employeeEntity . '_entity'),
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->addForeignKey(
                $setup->getFkName(
                    $employeeEntity . '_entity_decimal', 'store_id', 'store', 'store_id'
                ),
                'store_id',
                $setup->getTable('store'),
                'store_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('Employee Decimal Attribute Backend Table');
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}