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
class Account implements AccountInterface
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
     * {@inheritDoc}
     */
    public function setHomePage($homePage)
    {
        $this->homePage = $homePage;
    }

    /**
     * {@inheritDoc}
     */
    public function getHomePage()
    {
        return $this->homePage;
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
}
