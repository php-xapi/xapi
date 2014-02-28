<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApiCommon\Tests\Model;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class IFITest extends ModelTest
{
    public function testDeserializeMbox()
    {
        /** @var \Xabbuh\XApiCommon\Model\IFI $ifi */
        $ifi = $this->deserialize($this->loadFixture('ifi_mbox'));

        $this->assertEquals('mailto:christian@example.com', $ifi->getMbox());
    }

    public function testDeserializeAccount()
    {
        /** @var \Xabbuh\XApiCommon\Model\IFI $ifi */
        $ifi = $this->deserialize($this->loadFixture('ifi_account'));

        $this->assertEquals(
            'http://www.example.com',
            $ifi->getAccount()->getHomePage()
        );
        $this->assertEquals('1625378', $ifi->getAccount()->getName());
    }
}
