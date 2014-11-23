<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Api\Exception;

/**
 * Exception to indicate that a {@link Xabbuh\XApi\Model\Statement} could not
 * be found in the underlying persistence layer.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class NotFoundException extends \Exception
{
}
