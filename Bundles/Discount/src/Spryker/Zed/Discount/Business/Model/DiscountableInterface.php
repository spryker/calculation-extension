<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Discount\Business\Model;

interface DiscountableInterface
{

    /**
     * @return float
     */
    public function getGrossPrice();

    /**
     * @return \ArrayObject
     */
    public function getDiscounts();

    /**
     * @param \ArrayObject $discountCollection
     *
     * @return $this
     */
    public function setDiscounts(\ArrayObject $discountCollection);

    /**
     * @return int
     */
    public function getQuantity();

}
