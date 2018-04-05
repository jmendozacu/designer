<?php

namespace Eleanorsoft\DesignersPage\Api\Data;


/**
 * Interface DesignerInterface
 * todo: What is its purpose? What does it do?
 *
 * @package Eleanorsoft_
 * @author Pisarenko Denis <denis.pisarenko@eleanorsoft.com>
 * @copyright Copyright (c) 2018 Eleanorsoft (https://www.eleanorsoft.com/)
 */

interface DesignerInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ENTITY            = 'es_designers_page';
    const DESIGNER_ID       = 'designer_id';
    const FULL_NAME         = 'full_name';
    const PHOTO             = 'photo';
    const ALTERNATIVE_PHOTO = 'alternative_photo';
    const BANNER            = 'banner';
    const DESCRIPTION       = 'description';
    const SORT              = 'sort';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param $value
     * @return DesignerInterface
     * @internal param int $id
     */
    public function setId($value);

    /**
     * Get Full Name
     *
     * @return string|null
     */
    public function getFullName();

    /**
     * Set Full Name
     *
     * @param $value
     * @return null|string
     * @internal param $fullName
     */
    public function setFullName($value);

    /**
     * Get photo
     *
     * @return string|null
     */
    public function getPhoto();

    /**
     * Set photo
     *
     * @param $value
     * @return null|string
     */
    public function setPhoto($value);

    /**
     * Get alternative photo
     *
     * @return string|null
     */
    public function getAlternativePhoto();

    /**
     * Set alternative photo
     *
     * @param $value
     * @return null|string
     */
    public function setAlternativePhoto($value);

    /**
     * Get banner
     *
     * @return string|null
     */
    public function getBanner();

    /**
     * Set banner
     *
     * @param $value
     * @return null|string
     */
    public function setBanner($value);

    /**
     * Get description
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     *
     * @param $value
     * @return null|string
     */
    public function setDescription($value);

    /**
     * Get sort
     *
     * @return string|null
     */
    public function getSort();

    /**
     * Set sort
     *
     * @param $value
     * @return null|string
     */
    public function setSort($value);

}