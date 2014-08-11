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

use Xabbuh\XApi\Model\Document;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class DocumentTest extends AbstractDocumentTest
{
    protected function createDocument()
    {
        return new Document();
    }
}
