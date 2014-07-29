<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\DataFixtures;

use Xabbuh\XApi\Common\Model\ActivityProfileDocument;
use Xabbuh\XApi\Common\Model\AgentProfileDocument;
use Xabbuh\XApi\Common\Model\Document;
use Xabbuh\XApi\Common\Model\StateDocument;

/**
 * Document fixtures.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class DocumentFixtures
{
    /**
     * Loads a document.
     *
     * @return \Xabbuh\XApi\Common\Model\DocumentInterface
     */
    public static function getDocument()
    {
        $document = new Document();
        $document['x'] = 'foo';
        $document['y'] = 'bar';

        return $document;
    }

    /**
     * Loads an activity profile document.
     *
     * @return \Xabbuh\XApi\Common\Model\ActivityProfileDocumentInterface
     */
    public static function getActivityProfileDocument()
    {
        $document = new ActivityProfileDocument();
        $document['x'] = 'foo';
        $document['y'] = 'bar';

        return $document;
    }

    /**
     * Loads an agent profile document.
     *
     * @return \Xabbuh\XApi\Common\Model\AgentProfileDocumentInterface
     */
    public static function getAgentProfileDocument()
    {
        $document = new AgentProfileDocument();
        $document['x'] = 'foo';
        $document['y'] = 'bar';

        return $document;
    }

    /**
     * Loads a state document.
     *
     * @return \Xabbuh\XApi\Common\Model\StateDocumentInterface
     */
    public static function getStateDocument()
    {
        $document = new StateDocument();
        $document['x'] = 'foo';
        $document['y'] = 'bar';

        return $document;
    }
}
