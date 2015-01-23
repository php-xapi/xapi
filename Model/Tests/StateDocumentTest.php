<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Model\Tests;

use Xabbuh\XApi\DataFixtures\DocumentFixtures;
use Xabbuh\XApi\Model\DocumentData;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StateDocumentTest extends AbstractDocumentTest
{
    protected function createDocument(DocumentData $data)
    {
        return DocumentFixtures::getStateDocument($data);
    }
}
