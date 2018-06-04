<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Dataset;

use Orm\Zed\Dataset\Persistence\SpyDatasetQuery;
use Spryker\Zed\Dataset\Dependency\Facade\DatasetToLocaleFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class DatasetDependencyProvider extends AbstractBundleDependencyProvider
{
    const FACADE_LOCALE = 'FACADE_LOCALE';
    const PROPEL_DATASET_QUERY = 'PROPEL_DATASET_QUERY';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container = $this->addLocaleFacade($container);
        $container = $this->addPropelDatasetQuery($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addLocaleFacade(Container $container)
    {
        $container[static::FACADE_LOCALE] = function (Container $container) {
            return new DatasetToLocaleFacadeBridge($container->getLocator()->locale()->facade());
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addPropelDatasetQuery(Container $container): Container
    {
        $container[static::PROPEL_DATASET_QUERY] = function () {
            return SpyDatasetQuery::create();
        };

        return $container;
    }
}
