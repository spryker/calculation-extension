<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerFeature\Zed\PayoneOmsConnector\Communication\Plugin\Condition;

use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Condition\AbstractCondition;
use SprykerFeature\Zed\Payone\Business\PayoneDependencyContainer;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItem;

/**
 * @method PayoneDependencyContainer getDependencyContainer()
 */
class PaymentIsPaid extends AbstractCondition
{

    public function check(SpySalesOrderItem $orderItem)
    {
        return $this->getDependencyContainer()
            ->createPayoneFacade()
            ->isPaymentPaid($orderItem->getFkSalesOrder(), $orderItem->getIdSalesOrderItem());
    }

}
