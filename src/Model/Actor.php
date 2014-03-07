<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Model;

/**
 * The Actor of a {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Actor implements ActorInterface
{
    /**
     * Name of the {@link Agent} or {@link Group}
     * @var string
     */
    protected $name;

    /**
     * A mailto IRI
     * @var string
     */
    protected $mbox;

    /**
     * The SHA1 hash of a mailto IRI
     * @var string
     */
    protected $mboxSha1Sum;

    /**
     * An openID uniquely identifying an Agent
     * @var string
     */
    protected $openId;

    /**
     * A user account on an existing system
     * @var AccountInterface
     */
    protected $account;

    /**
     * {@inheritDoc}
     */
    public function getInverseFunctionalIdentifier()
    {
        if (null !== $this->mbox) {
            return $this->mbox;
        }

        if (null !== $this->mboxSha1Sum) {
            return $this->mboxSha1Sum;
        }

        if (null !== $this->openId) {
            return $this->openId;
        }

        if (null !== $this->account) {
            return $this->account;
        }

        return null;
    }

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
