<?php
/**
 * Project cms-roles-components
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/01/2023
 * Time: 11:32
 */

namespace nguyenanhung\WebBuilderModules\Platforms\Roles\Database\Interfaces;

interface AuthenticationInterface
{
    const TABLE_AUTHENTICATION = 'authentication';
    const TABLE_AUTHENTICATION_META_BY_GROUP = 'authentication_meta';
    const TABLE_AUTHENTICATION_META_BY_USER = 'authentication_meta_by_user';

    const TABLE_AUTHENTICATION_SERVICES = 'authentication_services';
    const TABLE_AUTHENTICATION_SERVICES_META_BY_GROUP = 'authentication_services_by_user_group';
    const TABLE_AUTHENTICATION_SERVICES_META_BY_USER = 'authentication_services_by_user_id';

    const TABLE_AUTHENTICATION_SIDEBAR = 'authentication_sidebar';
    const TABLE_AUTHENTICATION_SIDEBAR_META_BY_GROUP = 'authentication_sidebar_by_user_group';
    const TABLE_AUTHENTICATION_SIDEBAR_META_BY_USER = 'authentication_sidebar_by_user_id';
}
