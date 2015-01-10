<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\MongoDB\Tests\Functional;

use Doctrine\Common\Persistence\Mapping\Driver\SymfonyFileLocator;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\XmlDriver;
use Xabbuh\XApi\Storage\Doctrine\Tests\Functional\StatementManagerTest as BaseStatementManagerTest;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementManagerTest extends BaseStatementManagerTest
{
    /**
     * @return ObjectManager
     */
    protected function createObjectManager()
    {
        $config = new Configuration();
        $config->setProxyDir(__DIR__.'/../proxies');
        $config->setProxyNamespace('Proxy');
        $config->setHydratorDir(__DIR__.'/../hydrators');
        $config->setHydratorNamespace('Hydrator');
        $fileLocator = new SymfonyFileLocator(
            array(__DIR__.'/../../metadata' => 'Xabbuh\XApi\Storage\MongoDB\Document'),
            '.mongodb.xml'
        );
        $driver = new XmlDriver($fileLocator);
        $config->setMetadataDriverImpl($driver);

        return DocumentManager::create(new Connection(), $config);
    }

    protected function getStatementClassName()
    {
        return 'Xabbuh\XApi\Storage\MongoDB\Document\Statement';
    }
    protected function cleanDatabase()
    {
        foreach ($this->repository->findAll() as $statement) {
            $this->objectManager->remove($statement);
        }

        $this->objectManager->flush();
    }
}
