<?php

namespace nguyenanhung\WebBuilderModules\Platforms\Roles\Database;

use nguyenanhung\Platforms\WebBuilderSDK\Initialize\BaseComponents\Database\Database as InitializeComponentsDatabase;

/**
 * Class Database
 *
 * @package   nguyenanhung\WebBuilderModules\Platforms\Roles\Database
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Database extends InitializeComponentsDatabase implements AuthenticationInterface
{
    use AuthenticationTable;

    /**
     * Database constructor.
     *
     * @param array $options
     *
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     */
    public function __construct(array $options = array())
    {
        parent::__construct($options);
        $this->logger->setLoggerSubPath(__CLASS__);
    }
}
