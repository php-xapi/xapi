<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Serializer;

use Xabbuh\XApi\Common\Model\ActivityProfileDocument;
use Xabbuh\XApi\Common\Model\AgentProfileDocument;
use Xabbuh\XApi\Common\Model\Document;
use Xabbuh\XApi\Common\Model\StateDocument;
use Xabbuh\XApi\Common\Serializer\DocumentSerializer;

class DocumentSerializerTest extends AbstractSerializerTest
{
    /**
     * @var DocumentSerializer
     */
    private $documentSerializer;

    protected function setUp()
    {
        parent::setUp();
        $this->documentSerializer = new DocumentSerializer($this->serializer);
    }

    public function testDeserializeActivityProfileDocument()
    {
        /** @var \Xabbuh\XApi\Common\Model\Document $document */
        $document = $this->documentSerializer->deserializeActivityProfileDocument($this->loadFixture('document'));

        $this->assertInstanceOf(
            '\Xabbuh\XApi\Common\Model\ActivityProfileDocumentInterface',
            $document
        );
        $this->assertEquals('foo', $document['x']);
        $this->assertEquals('bar', $document['y']);
    }

    public function testDeserializeAgentProfileDocument()
    {
        /** @var \Xabbuh\XApi\Common\Model\Document $document */
        $document = $this->documentSerializer->deserializeAgentProfileDocument($this->loadFixture('document'));

        $this->assertInstanceOf(
            '\Xabbuh\XApi\Common\Model\AgentProfileDocumentInterface',
            $document
        );
        $this->assertEquals('foo', $document['x']);
        $this->assertEquals('bar', $document['y']);
    }

    public function testDeserializeStateDocument()
    {
        /** @var \Xabbuh\XApi\Common\Model\Document $document */
        $document = $this->documentSerializer->deserializeStateDocument($this->loadFixture('document'));

        $this->assertInstanceOf(
            '\Xabbuh\XApi\Common\Model\StateDocumentInterface',
            $document
        );
        $this->assertEquals('foo', $document['x']);
        $this->assertEquals('bar', $document['y']);
    }

    public function testSerializeDocument()
    {
        $document = new Document();
        $document['x'] = 'foo';
        $document['y'] = 'bar';

        $this->assertJsonEquals(
            $this->loadFixture('document'),
            $this->documentSerializer->serializeDocument($document)
        );
    }

    public function testSerializeActivityProfileDocument()
    {
        $document = new ActivityProfileDocument();
        $document['x'] = 'foo';
        $document['y'] = 'bar';

        $this->assertJsonEquals(
            $this->loadFixture('document'),
            $this->documentSerializer->serializeDocument($document)
        );
    }

    public function testSerializeAgentProfileDocument()
    {
        $document = new AgentProfileDocument();
        $document['x'] = 'foo';
        $document['y'] = 'bar';

        $this->assertJsonEquals(
            $this->loadFixture('document'),
            $this->documentSerializer->serializeDocument($document)
        );
    }

    public function testSerializeStateDocument()
    {
        $document = new StateDocument();
        $document['x'] = 'foo';
        $document['y'] = 'bar';

        $this->assertJsonEquals(
            $this->loadFixture('document'),
            $this->documentSerializer->serializeDocument($document)
        );
    }
}
