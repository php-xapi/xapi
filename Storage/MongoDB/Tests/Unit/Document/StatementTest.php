<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\MongoDB\Tests\Unit\Document;

use Doctrine\Common\Persistence\Mapping\Driver\SymfonyFileLocator;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\XmlDriver;
use Xabbuh\XApi\Storage\Doctrine\Locator\FileLocator;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DocumentManager
     */
    private $documentManager;

    protected function setUp()
    {
        $this->documentManager = $this->createDocumentManager();
    }

    public function testCustomRepositoryClassIsRegistered()
    {
        $this->assertInstanceOf(
            'Xabbuh\XApi\Storage\MongoDB\Repository\StatementRepository',
            $this->documentManager->getRepository(
                'Xabbuh\XApi\Storage\MongoDB\Document\Statement'
            )
        );
    }

    private function createDocumentManager()
    {
        $config = new Configuration();
        $config->setHydratorDir(__DIR__.'/../../hydrators');
        $config->setHydratorNamespace('Hydrator');
        $config->setProxyDir(__DIR__.'/../../proxies');
        $config->setProxyNamespace('Proxy');
        $fileLocator = new SymfonyFileLocator(
            array(__DIR__.'/../../../metadata' => 'Xabbuh\XApi\Storage\MongoDB\Document'),
            '.mongodb.xml'
        );
        $driver = new XmlDriver($fileLocator);
        $config->setMetadataDriverImpl($driver);

        return DocumentManager::create(new Connection(), $config);
    }
}
