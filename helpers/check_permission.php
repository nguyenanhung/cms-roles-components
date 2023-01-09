<?php
/**
 * Project cms-roles-components
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/01/2023
 * Time: 15:32
 */
if (!function_exists('roles_check_permission_by_user_id')) {
    function roles_check_permission_by_user_id($sdkConfig, $module, $action, $user_id): bool
    {
        $roles = new \nguyenanhung\WebBuilderModules\Platforms\Roles\Components\Roles($sdkConfig['OPTIONS']);
        $roles->setSdkConfig($sdkConfig)->setUserId($user_id);

        return $roles->checkPermission($module, $action, 'user_id');
    }
}

if (!function_exists('roles_check_permission_by_user_group')) {
    function roles_check_permission_by_user_group($sdkConfig, $module, $action, $user_group): bool
    {
        $roles = new \nguyenanhung\WebBuilderModules\Platforms\Roles\Components\Roles($sdkConfig['OPTIONS']);
        $roles->setSdkConfig($sdkConfig)->setUserGroup($user_group);

        return $roles->checkPermission($module, $action);
    }
}

if (!function_exists('roles_check_permission')) {
    function roles_check_permission($sdkConfig, $module, $action, $user_id, $user_group): bool
    {
        $roleById = roles_check_permission_by_user_id($sdkConfig, $module, $action, $user_id);
        $roleByGroup = roles_check_permission_by_user_id($sdkConfig, $module, $action, $user_group);

        return $roleById === true || $roleByGroup === true;
    }
}
