<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Bundle\LrsBundle\Tests\Listener;

use Xabbuh\XApi\Bundle\LrsBundle\Listener\StatementResultSerializerListener;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementResultSerializerListenerTest extends AbstractSerializerListenerTest
{
    public function __construct()
    {
        parent::__construct('StatementResult', 'serializeStatementResult');
    }

    protected function createListener()
    {
        return new StatementResultSerializerListener($this->serializer);
    }

    protected function getDefaultDomainObjectConstructorArguments()
    {
        return array(array());
    }
}
