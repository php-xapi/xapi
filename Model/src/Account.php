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
 * A user account on an existing system.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Account
{
    /**
     * Canonical home page for the system the account is on
     * @var string
     */
    protected $homePage;

    /**
     * The unique id or name used to log in to this account
     * @var string
     */
    protected $name;

    /**
     * Sets the home page for the system the account is on.
     *
     * @param string $homePage The home page
     */
    public function setHomePage($homePage)
    {
        $this->homePage = $homePage;
    }

    /**
     * Returns the home page for the system the account is on.
     *
     * @return string The home page
     */
    public function getHomePage()
    {
        return $this->homePage;
    }

    /**
     * Sets the unique id or name used to log in to this account.
     *
     * @param string $name The user name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the unique id or name used to log in to this account.
     *
     * @return string The user name
     */
    public function getName()
    {
        return $this->name;
    }
}
