<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Serializer\Tests\Handler;

use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMS\Serializer\SerializationContext;
use Xabbuh\XApi\Model\Document;
use Xabbuh\XApi\Serializer\Handler\DocumentDataUnwrapper;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class DocumentDataUnwrapperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DocumentDataUnwrapper
     */
    private $handler;

    protected function setUp()
    {
        $this->handler = new DocumentDataUnwrapper();
    }

    public function testUnwrapData()
    {
        $document = new Document();
        $document['x'] = 'foo';
        $document['y'] = 'bar';
        $visitor = new JsonSerializationVisitor(new CamelCaseNamingStrategy());
        $type = array('name' => 'Xabbuh\XApi\Model\Document', 'params' => array());
        $context = new SerializationContext();
        $this->handler->unwrapData($visitor, $document, $type, $context);

        $this->assertEquals(array('x' => 'foo', 'y' => 'bar'), $visitor->getRoot());
    }
}
