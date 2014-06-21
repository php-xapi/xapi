<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\MongoDB\Tests;

use Xabbuh\XApi\Storage\Doctrine\Tests\Manager\StatementManagerTest as BaseStatementManagerTest;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementManagerTest extends BaseStatementManagerTest
{
    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Xabbuh\XApi\Storage\MongoDB\Repository\StatementRepository
     */
    protected function createRepositoryMock()
    {
        return $this
            ->getMockBuilder('\Xabbuh\XApi\Storage\MongoDB\Repository\StatementRepository')
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }
}
