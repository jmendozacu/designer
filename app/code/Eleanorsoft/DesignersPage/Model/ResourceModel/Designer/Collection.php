<?php

namespace Eleanorsoft\DesignersPage\Model\ResourceModel\Designer;

use Eleanorsoft\DesignersPage\Model\Designer;
use Eleanorsoft\DesignersPage\Model\ResourceModel\Designer as ResourceModelDesigner;
use Magento\Eav\Model\Entity\Collection\AbstractCollection;

/**
 * Class Collection
 * Designer Collection
 *
 * @package Eleanorsoft_
 * @author Pisarenko Denis <denis.pisarenko@eleanorsoft.com>
 * @copyright Copyright (c) 2018 Eleanorsoft (https://www.eleanorsoft.com/)
 */

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Designer::class, ResourceModelDesigner::class);
    }
}