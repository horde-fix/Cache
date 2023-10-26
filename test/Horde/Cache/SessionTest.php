<?php
/**
 * Copyright 2016-2017 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @author   Jan Schneider <jan@horde.org>
 * @category Horde
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @package  Cache
 */
namespace Horde\Cache;
use Horde_Cache_TestBase as TestBase;
use \Horde_Cache;
use \Horde_Cache_Storage_Session;

/**
 * This class tests the session backend.
 *
 * @author   Jan Schneider <jan@horde.org>
 * @category Horde
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @package  Cache
 */
class SessionTest extends TestBase
{
    protected function _getCache($params = array())
    {
        return new Horde_Cache(
            new Horde_Cache_Storage_Session()
        );
    }
}
