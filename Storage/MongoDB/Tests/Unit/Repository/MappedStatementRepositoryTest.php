<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\MongoDB\Tests\Unit\Repository;

use Xabbuh\XApi\Storage\Doctrine\Tests\Unit\Repository\MappedStatementRepositoryTest as BaseStatementRepositoryTest;
use Xabbuh\XApi\Storage\MongoDB\Repository\MappedStatementRepository;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class MappedStatementRepositoryTest extends BaseStatementRepositoryTest
{
    protected function getObjectManagerClass()
    {
        return 'Doctrine\ODM\MongoDB\DocumentManager';
    }

    protected function getUnitOfWorkClass()
    {
        return 'Doctrine\ODM\MongoDB\UnitOfWork';
    }

    protected function getClassMetadataClass()
    {
        return 'Doctrine\ODM\MongoDB\Mapping\ClassMetadata';
    }

    protected function createMappedStatementRepository($objectManager, $unitOfWork, $classMetadata)
    {
        return new MappedStatementRepository($objectManager, $unitOfWork, $classMetadata);
    }
}
