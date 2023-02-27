<?php

namespace nguyenanhung\WebBuilderModules\Platforms\Roles\Config;

/**
 * Class Config
 *
 * @package   nguyenanhung\WebBuilderModules\Platforms\Roles\Config
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Config
{
    public static function init()
    {
        return DataRepository::getData('config_global');
    }

    public static function item($item)
    {
        $config = self::init();
        if (isset($config[$item])) {
            return $config[$item];
        }

        return null;
    }
}
