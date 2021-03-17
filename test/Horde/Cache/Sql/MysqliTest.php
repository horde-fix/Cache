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
namespace Horde\Cache\Sql;
use Horde_Cache_Sql_Base as Base;

/**
 * This class tests a MySQLi backend.
 *
 * @author   Jan Schneider <jan@horde.org>
 * @category Horde
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @package  Cache
 */
class MysqliTest extends Base
{
    protected function _getCache($params = array())
    {
        if (!extension_loaded('mysqli')) {
            $this->reason = 'No mysqli extension';
            return;
        }
        $config = self::getConfig('CACHE_SQL_MYSQLI_TEST_CONFIG',
                                  __DIR__ . '/..');
        if ($config && !empty($config['cache']['sql']['mysqli'])) {
            $this->db = new Horde_Db_Adapter_Mysqli($config['cache']['sql']['mysqli']);
            return parent::_getCache($params);
        } else {
            $this->reason = 'No mysqli configuration';
        }
    }
}
