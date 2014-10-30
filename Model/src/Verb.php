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
class Verb
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
     * Sets the verb definition reference.
     *
     * @param string $id The reference
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the verb definition reference.
     *
     * @return string The reference
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the human readable representation of the Verb in one or more languages.
     *
     * @param array $display The mapping of languages to human readable strings
     */
    public function setDisplay(array $display)
    {
        $this->display = $display;
    }

    /**
     * Returns the human readable representation of the Verb in one or more languages.
     *
     * @return array The language map
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * Tests if the Verb can be used to void a Statement.
     *
     * @return boolean True, if the Verb is a void Verb, false otherwise
     */
    public function isVoidVerb()
    {
        return 'http://adlnet.gov/expapi/verbs/voided' === $this->id;
    }

    /**
     * Creates a Verb that can be used to void a {@link Statement}.
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
