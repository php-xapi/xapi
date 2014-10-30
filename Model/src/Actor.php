<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Model;

/**
 * The Actor of a {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class Actor
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
     * @var Account
     */
    protected $account;

    /**
     * Returns the Actor's inverse functional identifier.
     *
     * @return string The inverse functional identifier
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
     * Sets the name of the {@link Agent} or {@link Group}.
     *
     * @param string $name The name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the name of the {@link Agent} or {@link Group}.
     *
     * @return string The name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the mailto IRI.
     *
     * @param string $mbox The mailto IRI
     */
    public function setMbox($mbox)
    {
        $this->mbox = $mbox;
    }

    /**
     * Returns the mailto IRI.
     *
     * @return string The mailto IRI
     */
    public function getMbox()
    {
        return $this->mbox;
    }

    /**
     * Sets the SHA1 hash of a mailto IRI.
     *
     * @param string $mboxSha1Sum The SHA1 of a mailto IRI
     */
    public function setMboxSha1Sum($mboxSha1Sum)
    {
        $this->mboxSha1Sum = $mboxSha1Sum;
    }

    /**
     * Returns the SHA1 hash of a mailto IRI.
     *
     * @return string The SHA1 hash of a mailto IRI
     */
    public function getMboxSha1Sum()
    {
        return $this->mboxSha1Sum;
    }

    /**
     * Sets the openID.
     *
     * @param string $openId The openID
     */
    public function setOpenId($openId)
    {
        $this->openId = $openId;
    }

    /**
     * Returns the openID.
     *
     * @return string The openID
     */
    public function getOpenId()
    {
        return $this->openId;
    }

    /**
     * Sets the user account of an existing system.
     *
     * @param Account $account The account
     */
    public function setAccount(Account $account)
    {
        $this->account = $account;
    }

    /**
     * Returns the user account of an existing system.
     *
     * @return string The user account of an existing system
     */
    public function getAccount()
    {
        return $this->account;
    }
}
