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
interface ActorInterface extends ObjectInterface
{
    /**
     * Returns the Actor's inverse functional identifier.
     *
     * @return string The inverse functional identifier
     */
    public function getInverseFunctionalIdentifier();

    /**
     * Sets the name of the {@link Agent} or {@link Group}.
     *
     * @param string $name The name
     */
    public function setName($name);

    /**
     * Returns the name of the {@link Agent} or {@link Group}.
     *
     * @return string The name
     */
    public function getName();

    /**
     * Sets the mailto IRI.
     *
     * @param string $mbox The mailto IRI
     */
    public function setMbox($mbox);

    /**
     * Returns the mailto IRI.
     *
     * @return string The mailto IRI
     */
    public function getMbox();

    /**
     * Sets the SHA1 hash of a mailto IRI.
     *
     * @param string $mboxSha1Sum The SHA1 of a mailto IRI
     */
    public function setMboxSha1Sum($mboxSha1Sum);

    /**
     * Returns the SHA1 hash of a mailto IRI.
     *
     * @return string The SHA1 hash of a mailto IRI
     */
    public function getMboxSha1Sum();

    /**
     * Sets the openID.
     *
     * @param string $openId The openID
     */
    public function setOpenId($openId);

    /**
     * Returns the openID.
     *
     * @return string The openID
     */
    public function getOpenId();

    /**
     * Sets the user account of an existing system.
     *
     * @param \Xabbuh\XApi\Common\Model\AccountInterface $account The account
     */
    public function setAccount(AccountInterface $account);

    /**
     * Returns the user account of an existing system.
     *
     * @return string The user account of an existing system
     */
    public function getAccount();
}
