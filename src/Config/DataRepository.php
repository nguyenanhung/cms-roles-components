<?php

namespace nguyenanhung\WebBuilderModules\Platforms\Roles\Config;

/**
 * Class DataRepository
 *
 * @package   nguyenanhung\WebBuilderModules\Platforms\Roles\Config
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class DataRepository
{
    /**
     * Hàm lấy nội dung config được quy định trong thư mục config
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 9/28/18 14:47
     *
     * @param string $configName Tên file config
     *
     * @return array|mixed
     */
    public static function getData($configName)
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . trim($configName) . '.php';
        if (is_file($path) && file_exists($path)) {
            return require $path;
        }

        return array();
    }
}
