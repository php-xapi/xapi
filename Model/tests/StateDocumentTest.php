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

use Xabbuh\XApi\Model\Activity;
use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\DocumentData;
use Xabbuh\XApi\Model\State;
use Xabbuh\XApi\Model\StateDocument;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StateDocumentTest extends AbstractDocumentTest
{
    protected function createDocument(DocumentData $data)
    {
        $agent = new Agent('mailto:alice@example.com');
        $activity = new Activity('activity-id');

        return new StateDocument(new State($activity, $agent, 'state-id'), $data);
    }
}
