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
use Xabbuh\XApi\Model\ActivityProfile;
use Xabbuh\XApi\Model\ActivityProfileDocument;
use Xabbuh\XApi\Model\DocumentData;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActivityProfileDocumentTest extends AbstractDocumentTest
{
    protected function createDocument(DocumentData $data)
    {
        $activityProfile = new ActivityProfile('profile-id', new Activity('activity-id'));

        return new ActivityProfileDocument($activityProfile, $data);
    }
}
