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

use JMS\Serializer\Annotation as JMS;

/**
 * The object of a {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * @JMS\Discriminator(field="objectType", map={"Activity": "Xabbuh\XApiCommon\Model\Activity", "Agent": "Xabbuh\XApiCommon\Model\Agent", "Group": "Xabbuh\XApiCommon\Model\Group"})
 */
interface Object
{
}
