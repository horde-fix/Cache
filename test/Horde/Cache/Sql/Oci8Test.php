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
 * This class tests an Oracle backend.
 *
 * @author   Jan Schneider <jan@horde.org>
 * @category Horde
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @package  Cache
 */
class Oci8Test extends Base
{
    protected function _getCache($params = array())
    {
        if (!extension_loaded('oci8')) {
            $this->reason = 'No oci8 extension';
            return;
        }
        $config = self::getConfig('CACHE_SQL_OCI8_TEST_CONFIG',
                                  __DIR__ . '/..');
        if ($config && !empty($config['cache']['sql']['oci8'])) {
            $this->db = new Horde_Db_Adapter_Oci8($config['cache']['sql']['oci8']);
            return parent::_getCache($params);
        } else {
            $this->reason = 'No oci8 configuration';
        }
    }
}
