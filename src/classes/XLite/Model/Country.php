<?php
// vim: set ts=4 sw=4 sts=4 et:

/**
 * LiteCommerce
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to licensing@litecommerce.com so we can send you a copy immediately.
 *
 * PHP version 5.3.0
 *
 * @category  LiteCommerce
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.litecommerce.com/
 * @see       ____file_see____
 * @since     1.0.0
 */

namespace XLite\Model;

/**
 * Country
 *
 * @see   ____class_see____
 * @since 1.0.0
 *
 * @Entity (repositoryClass="\XLite\Model\Repo\Country")
 * @Table  (name="countries",
 *      indexes={
 *          @Index (name="country", columns={"country"}),
 *          @Index (name="enabled", columns={"enabled"})
 *      }
 * )
 */
class Country extends \XLite\Model\AEntity
{
    /**
     * Country name
     *
     * @var   string
     * @see   ____var_see____
     * @since 1.0.0
     *
     * @Column (type="string", length="50")
     */
    protected $country;

    /**
     * Country code (ISO 3166-1 alpha-2)
     *
     * @var   string
     * @see   ____var_see____
     * @since 1.0.0
     *
     * @Id
     * @Column (type="fixedstring", length="2", unique=true)
     */
    protected $code;

    /**
     * Country code (ISO 3166-1 alpha-3)
     *
     * @var   string
     * @see   ____var_see____
     * @since 1.0.0
     *
     * @Column (type="fixedstring", length="3")
     */
    protected $code3 = '';

    /**
     * Enabled falg
     *
     * @var   boolean
     * @see   ____var_see____
     * @since 1.0.0
     *
     * @Column (type="boolean")
     */
    protected $enabled = true;

    /**
     * States (relation)
     *
     * @var   \Doctrine\Common\Collections\ArrayCollection
     * @see   ____var_see____
     * @since 1.0.0
     *
     * @OneToMany (targetEntity="XLite\Model\State", mappedBy="country", cascade={"all"})
     * @OrderBy   ({"state" = "ASC"})
     */
    protected $states;


    /**
     * Constructor
     *
     * @param array $data Entity properties OPTIONAL
     *
     * @return void
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function __construct(array $data = array())
    {
        $this->states = new \Doctrine\Common\Collections\ArrayCollection();

        parent::__construct($data);
    }

    /**
     * Check if country has states
     *
     * @return boolean
     * @see    ____func_see____
     * @since  1.0.0
     */
    public function hasStates()
    {
        return 0 < count($this->states);
    }
}
