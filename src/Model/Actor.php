<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApiCommon\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * The Actor of a {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * @JMS\Discriminator(field="objectType", map={"Agent": "Xabbuh\XApiCommon\Model\Agent", "Group": "Xabbuh\XApiCommon\Model\Group"})
 */
class Actor implements ActorInterface
{
    /**
     * Name of the {@link Agent} or {@link Group}
     * @var string
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * A mailto IRI
     * @var string
     * @JMS\Type("string")
     */
    protected $mbox;

    /**
     * The SHA1 hash of a mailto IRI
     * @var string
     * @JMS\Type("string")
     */
    protected $mboxSha1Sum;

    /**
     * An openID uniquely identifying an Agent
     * @var string
     * @JMS\SerializedName("openid")
     * @JMS\Type("string")
     */
    protected $openId;

    /**
     * A user account on an existing system
     * @var AccountInterface
     * @JMS\Type("Xabbuh\XApiCommon\Model\Account")
     */
    protected $account;

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setMbox($mbox)
    {
        $this->mbox = $mbox;
    }

    /**
     * {@inheritDoc}
     */
    public function getMbox()
    {
        return $this->mbox;
    }

    /**
     * {@inheritDoc}
     */
    public function setMboxSha1Sum($mboxSha1Sum)
    {
        $this->mboxSha1Sum = $mboxSha1Sum;
    }

    /**
     * {@inheritDoc}
     */
    public function getMboxSha1Sum()
    {
        return $this->mboxSha1Sum;
    }

    /**
     * {@inheritDoc}
     */
    public function setOpenId($openId)
    {
        $this->openId = $openId;
    }

    /**
     * {@inheritDoc}
     */
    public function getOpenId()
    {
        return $this->openId;
    }

    /**
     * {@inheritDoc}
     */
    public function setAccount(AccountInterface $account)
    {
        $this->account = $account;
    }

    /**
     * {@inheritDoc}
     */
    public function getAccount()
    {
        return $this->account;
    }
}
