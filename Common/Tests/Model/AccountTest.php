<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Model;

use Xabbuh\XApi\Common\Model\Account;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class AccountTest extends ModelTest
{
    private $fixture;

    protected function setUp()
    {
        parent::setUp();

        $this->fixture = $this->loadFixture('account');
    }
    public function testSerialize()
    {
        $account = new Account();
        $account->setHomePage('http://www.example.com');
        $account->setName('1625378');

        $this->serializeAndValidateData($this->fixture, $account);
    }

    public function testDeserialize()
    {
        /** @var \Xabbuh\XApi\Common\Model\Account $account */
        $account = $this->deserialize($this->fixture);

        $this->assertEquals('http://www.example.com', $account->getHomePage());
        $this->assertEquals('1625378', $account->getName());
    }
}
