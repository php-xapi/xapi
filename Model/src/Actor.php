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
    private $name;

    /**
     * A mailto IRI
     * @var string
     */
    private $mbox;

    /**
     * The SHA1 hash of a mailto IRI
     * @var string
     */
    private $mboxSha1Sum;

    /**
     * An openID uniquely identifying an Agent
     * @var string
     */
    private $openId;

    /**
     * A user account on an existing system
     * @var Account
     */
    private $account;

    /**
     * @param string  $mbox
     * @param string  $mboxSha1Sum
     * @param string  $openId
     * @param Account $account
     * @param string  $name
     */
    public function __construct($mbox = null, $mboxSha1Sum = null, $openId = null, Account $account = null, $name = null)
    {
        $this->name = $name;
        $this->mbox = $mbox;
        $this->mboxSha1Sum = $mboxSha1Sum;
        $this->openId = $openId;
        $this->account = $account;
    }

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
     * Returns the name of the {@link Agent} or {@link Group}.
     *
     * @return string The name
     */
    public function getName()
    {
        return $this->name;
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
     * Returns the SHA1 hash of a mailto IRI.
     *
     * @return string The SHA1 hash of a mailto IRI
     */
    public function getMboxSha1Sum()
    {
        return $this->mboxSha1Sum;
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
     * Returns the user account of an existing system.
     *
     * @return string The user account of an existing system
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Checks if another actor is equal.
     *
     * Two actors are equal if and only if all of their properties are equal.
     *
     * @param Actor $actor The actor to compare with
     *
     * @return bool True if the actors are equal, false otherwise
     */
    public function equals(Actor $actor)
    {
        if ($this->name !== $actor->name) {
            return false;
        }

        if ($this->mbox !== $actor->mbox) {
            return false;
        }

        if ($this->mboxSha1Sum !== $actor->mboxSha1Sum) {
            return false;
        }

        if ($this->openId !== $actor->openId) {
            return false;
        }

        if (null === $this->account && null !== $actor->account) {
            return false;
        }

        if (null !== $this->account && null === $actor->account) {
            return false;
        }

        if (null !== $this->account && !$this->account->equals($actor->account)) {
            return false;
        }

        return true;
    }
}
