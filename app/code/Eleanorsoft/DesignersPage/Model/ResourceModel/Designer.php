<?php

namespace Eleanorsoft\DesignersPage\Model\ResourceModel;

use Eleanorsoft\DesignersPage\Api\Data\DesignerInterface;
use Eleanorsoft\DesignersPage\Model\Designer as DesignerModel;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Store\Model\StoreManagerInterface;


/**
 * Class Designer
 *
 * @package Eleanorsoft\DesignersPage\Model\ResourceModel
 * @author Pisarenko Denis <denis.pisarenko@eleanorsoft.com>
 * @copyright Copyright (c) 2018 Eleanorsoft (https://www.eleanorsoft.com/)
 */

class Designer extends AbstractDb
{
    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * Designer constructor.
     * @param Context $context
     * @param StoreManagerInterface $storeManager
     * @param null $connectionName
     */
    public function __construct
    (
        Context $context,
        StoreManagerInterface $storeManager,
        $connectionName = null
    )
    {
        parent::__construct($context, $connectionName);
        $this->storeManager = $storeManager;
    }

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('eleanorsoft_designers', 'designer_id');
    }


    /**

     *
     * @param DesignerModel $designer
     * @return $this
     */
    protected function _afterLoad(AbstractModel $designer)
    {
        $store_id = $this->storeManager->getStore()->getId();
        $designer_id = $designer->getId();
        $conn = $this->getConnection();
        if ($designer_id) {

            $sql = $this->queryLoad($designer_id, $store_id);
            $data = $conn->fetchRow($sql);

            $translation = array(
                DesignerInterface::FULL_NAME => $data['full_name'],
                DesignerInterface::PHOTO => $data['photo'],
                DesignerInterface::ALTERNATIVE_PHOTO => $data['alternative_photo'],
                DesignerInterface::BANNER => $data['banner'],
                DesignerInterface::DESCRIPTION => $data['description'],
            );
            $designer->setTranslation($translation);
        }

        return parent::_afterLoad($designer);
    }

    /**
     * @override made in order to switch store view to a designer
     *
     * @param DesignerModel $designer
     * @return $this
     */
    protected function _afterSave(AbstractModel $designer)
    {
        $store_id = $this->storeManager->getStore()->getId();
        $designer_id = $designer->getId();
        $entity = DesignerInterface::ENTITY;

        $tables = $this->dataTables($entity, $designer);

        $this->insertQuery($designer_id, $store_id, $tables);

        return parent::_afterSave($designer);
    }

    private function dataTables($entity, $designer)
    {
        $table_full_name = $this->getTable($entity . '_full_name');
        $table_photo = $this->getTable($entity . '_photo');
        $table_alternative_photo = $this->getTable($entity . '_alternative_photo');
        $table_banner = $this->getTable($entity . '_banner');
        $table_description = $this->getTable($entity . '_description');

        $full_name = $designer->getFullName();
        $photo = $designer->getPhoto();
        $alternative_photo = $designer->getAlternativePhoto();
        $banner = $designer->getBanner();
        $description = $designer->getDescription();

        $tables = [
            $table_full_name => $full_name,
            $table_photo => $photo,
            $table_alternative_photo => $alternative_photo,
            $table_banner => $banner,
            $table_description => $description,
        ];

        return $tables;
    }

    private function insertQuery($designer_id, $store_id, $tables = [])
    {
        $conn = $this->getConnection();
        $data = '';
        foreach ($tables as $table => $value) {
            $sql = "REPLACE INTO $table SET store_id=$store_id, designer_id=$designer_id, value='$value';";
            $data = $conn->query($sql);
        }
        return $data;
    }

    private function queryLoad($designer_id, $store_id)
    {
        $designer_id = intval($designer_id);
        $store_id = intval($store_id);
        $entity = DesignerInterface::ENTITY;

        $table = $this->getTable($entity);
        $table_full_name = $this->getTable($entity . '_full_name');
        $table_photo = $this->getTable($entity . '_photo');
        $table_alternative_photo = $this->getTable($entity . '_alternative_photo');
        $table_banner = $this->getTable($entity . '_banner');
        $table_description = $this->getTable($entity . '_description');

        $sql = "SELECT 
        IF(full_name.value IS NOT NULL, full_name.value, full_name_default.value) full_name, 
        IF(photo.value IS NOT NULL, photo.value, photo_default.value) photo, 
        IF(alternative_photo.value IS NOT NULL, alternative_photo.value, alternative_photo_default.value) alternative_photo, 
        IF(banner.value IS NOT NULL, banner.value, banner_default.value) banner, 
        IF(description.value IS NOT NULL, description.value, description_default.value) description
        FROM $table Designer 
        
        LEFT JOIN $table_full_name full_name
         ON Designer.designer_id = full_name.designer_id AND full_name.store_id=$store_id
        LEFT JOIN $table_full_name full_name_default
         ON Designer.designer_id = full_name_default.designer_id AND full_name_default.store_id=0
         
        LEFT JOIN $table_photo photo
         ON Designer.designer_id = photo.designer_id AND photo.store_id=$store_id
        LEFT JOIN $table_photo photo_default
         ON Designer.designer_id = photo_default.designer_id AND photo_default.store_id=0
         
        LEFT JOIN $table_alternative_photo alternative_photo
         ON Designer.designer_id = alternative_photo.designer_id AND alternative_photo.store_id=$store_id
        LEFT JOIN $table_alternative_photo alternative_photo_default
         ON Designer.designer_id = alternative_photo_default.designer_id AND alternative_photo_default.store_id=0
         
        LEFT JOIN $table_banner banner
         ON Designer.designer_id = banner.designer_id AND banner.store_id=$store_id
        LEFT JOIN $table_banner banner_default
         ON Designer.designer_id = banner_default.designer_id AND banner_default.store_id=0

        LEFT JOIN $table_description description
         ON Designer.designer_id = descriptiondesigner_id AND description.store_id=$store_id
        LEFT JOIN $table_description description_default
         ON Designer.designer_id = $designer_id AND description_default.store_id=0
         
        WHERE Designer.designer_id = $designer_id
         ";

        return $sql;
    }

    public function getDataDesigner($designer_id)
    {
        $store_id = $this->storeManager->getStore()->getId();
        $conn = $this->getConnection();

        $sql = $this->queryLoad($designer_id, $store_id);
        $data = $conn->fetchRow($sql);
            var_dump($data);
        return $data;
    }
}

