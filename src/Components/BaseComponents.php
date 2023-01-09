<?php
/**
 * Project cms-roles-components
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 23/08/2022
 * Time: 09:15
 */

namespace nguyenanhung\WebBuilderModules\Platforms\Roles\Components;

use nguyenanhung\WebBuilderModules\Platforms\Roles\Base\BaseCore;
use nguyenanhung\WebBuilderModules\Platforms\Roles\Database\Database;

/**
 * Class BaseComponents
 *
 * @package   nguyenanhung\WebBuilderModules\Platforms\Roles\Components
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class BaseComponents extends BaseCore
{
    /**
     * BaseComponents constructor.
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
        $this->db = new Database($options);
    }
}
