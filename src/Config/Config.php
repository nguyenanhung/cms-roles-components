<?php

namespace nguyenanhung\WebBuilderModules\Roles\Config;

/**
 * Class Config
 *
 * @package   nguyenanhung\WebBuilderModules\Roles\Config
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Config
{
    public static function configGlobal()
    {
        return DataRepository::getData('config_global');
    }

    public static function configItem($item)
    {
        $config = self::configGlobal();

        return $config[$item] ?? null;
    }
}
