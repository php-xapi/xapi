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
 * A user account on an existing system.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface AccountInterface
{
    /**
     * Sets the home page for the system the account is on.
     *
     * @param string $homePage The home page
     */
    public function setHomePage($homePage);

    /**
     * Returns the home page for the system the account is on.
     *
     * @return string The home page
     */
    public function getHomePage();

    /**
     * Sets the unique id or name used to log in to this account.
     *
     * @param string $name The user name
     */
    public function setName($name);

    /**
     * Returns the unique id or name used to log in to this account.
     *
     * @return string The user name
     */
    public function getName();
}
