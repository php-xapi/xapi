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
 * The verb in a {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Verb implements VerbInterface
{
    /**
     * Reference to the verb definition
     * @var string
     */
    protected $id;

    /**
     * Human readable representation of the verb in one or more languages
     * @var array
     */
    protected $display;

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setDisplay(array $display)
    {
        $this->display = $display;
    }

    /**
     * {@inheritDoc}
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * {@inheritDoc}
     */
    public function isVoidVerb()
    {
        return 'http://adlnet.gov/expapi/verbs/voided' === $this->id;
    }

    /**
     * Creates a Verb that can be used to void a {@link StatementInterface Statement}.
     *
     * @return Verb
     */
    public static function createVoidVerb()
    {
        $verb = new Verb();
        $verb->setId('http://adlnet.gov/expapi/verbs/voided');

        return $verb;
    }
}
