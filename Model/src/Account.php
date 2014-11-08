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
     * The unique id or name used to log in to this account
     * @var string
     */
    protected $name;

    /**
     * Canonical home page for the system the account is on
     * @var string
     */
    protected $homePage;

    /**
     * @param string $name
     * @param string $homePage
     */
    public function __construct($name = '', $homePage = '')
    {
        $this->name = $name;
        $this->homePage = $homePage;
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

    /**
     * Returns the home page for the system the account is on.
     *
     * @return string The home page
     */
    public function getHomePage()
    {
        return $this->homePage;
    }
}
