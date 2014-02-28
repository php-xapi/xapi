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

/**
 * An {@link https://github.com/adlnet/xAPI-Spec/blob/master/xAPI.md#inversefunctional Inverse Functional Identifier}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface IFIInterface
{
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
     * @param \Xabbuh\XApiCommon\Model\AccountInterface $account The account
     */
    public function setAccount(AccountInterface $account);

    /**
     * Returns the user account of an existing system.
     *
     * @return string The user account of an existing system
     */
    public function getAccount();
}
