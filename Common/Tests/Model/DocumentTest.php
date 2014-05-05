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

use Xabbuh\XApi\Common\Model\Document;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class DocumentTest extends ModelTest
{
    public function testArrayAccessMethods()
    {
        $document = new Document();

        $this->assertFalse(isset($document['x']));

        $document['x'] = 'foo';

        $this->assertTrue(isset($document['x']));
        $this->assertEquals('foo', $document['x']);

        $document['x'] = 'bar';

        $this->assertEquals('bar', $document['x']);

        unset($document['x']);

        $this->assertFalse(isset($document['x']));
    }

    public function testGetData()
    {
        $document = new Document();
        $document['x'] = 'foo';
        $document['y'] = 'bar';

        $this->assertEquals(array('x' => 'foo', 'y' => 'bar'), $document->getData());
    }

    public function testDeserializeDocument()
    {
        /** @var \Xabbuh\XApi\Common\Model\Document $document */
        $document = $this->deserialize($this->loadFixture('document'));

        $this->assertEquals('foo', $document['x']);
        $this->assertEquals('bar', $document['y']);
    }

    public function testSerializeDocument()
    {
        $document = new Document();
        $document['x'] = 'foo';
        $document['y'] = 'bar';

        $this->serializeAndValidateData($this->loadFixture('document'), $document);
    }
}
