<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Model;

use Xabbuh\XApi\Common\Model\AgentProfileDocument;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class AgentProfileDocumentTest extends DocumentTest
{
    protected function createDocument()
    {
        return new AgentProfileDocument();
    }
}
