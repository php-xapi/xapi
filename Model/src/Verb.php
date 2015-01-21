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
final class Verb
{
    /**
     * Reference to the verb definition
     * @var string
     */
    private $id;

    /**
     * Human readable representation of the verb in one or more languages
     * @var array
     */
    private $display;

    /**
     * @param string $id
     * @param array  $display
     */
    public function __construct($id, array $display = array())
    {
        $this->id = $id;
        $this->display = $display;
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
     * Returns the human readable representation of the Verb in one or more languages.
     *
     * @return array The language map
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * Checks if another verb is equal.
     *
     * Two verbs are equal if and only if all of their properties are equal.
     *
     * @param Verb $verb The verb to compare with
     *
     * @return bool True if the verbs are equal, false otherwise
     */
    public function equals(Verb $verb)
    {
        if ($this->id !== $verb->getId()) {
            return false;
        }

        if (count($this->display) !== count($verb->getDisplay())) {
            return false;
        }

        foreach ($this->display as $language => $value) {
            if (!isset($verb->display[$language])) {
                return false;
            }

            if ($value !== $verb->display[$language]) {
                return false;
            }
        }

        return true;
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
        $verb = new Verb('http://adlnet.gov/expapi/verbs/voided');

        return $verb;
    }
}
