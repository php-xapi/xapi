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

use Xabbuh\XApi\Bundle\LrsBundle\Listener\StatementSerializerListener;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementSerializerListenerTest extends AbstractSerializerListenerTest
{
    public function __construct()
    {
        parent::__construct('Statement', 'serializeStatement');
    }

    protected function createListener()
    {
        return new StatementSerializerListener($this->serializer);
    }
}
