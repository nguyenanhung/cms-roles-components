<?php

namespace nguyenanhung\WebBuilderModules\Your_Module\Repository;

use nguyenanhung\WebBuilderModules\Your_Module\Base\BaseCore;

/**
 * Class BaseRepository
 *
 * @package   nguyenanhung\WebBuilderModules\Your_Module\Repository
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class BaseRepository extends BaseCore
{
    /**
     * BaseRepository constructor.
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
