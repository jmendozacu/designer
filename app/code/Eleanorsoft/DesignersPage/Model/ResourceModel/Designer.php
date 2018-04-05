<?php

namespace Eleanorsoft\DesignersPage\Model\ResourceModel;

use Eleanorsoft\DesignersPage\Api\Data\DesignerInterface;
use Magento\Eav\Model\Entity\AbstractEntity;

/**
 * Class Designer
 *
 * ResourceModel for Designer
 *
 * @package Eleanorsoft_
 * @author Pisarenko Denis <denis.pisarenko@eleanorsoft.com>
 * @copyright Copyright (c) 2018 Eleanorsoft (https://www.eleanorsoft.com/)
 */

class Designer extends AbstractEntity
{
    public function getEntityType()
    {
        if (empty($this->_type)) {
            $this->setType(DesignerInterface::ENTITY);
        }
        return parent::getEntityType();
    }
}