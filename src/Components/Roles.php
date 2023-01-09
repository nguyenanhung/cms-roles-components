<?php
/**
 * Project cms-roles-components
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 23/08/2022
 * Time: 09:55
 */

namespace nguyenanhung\WebBuilderModules\Platforms\Roles\Components;

/**
 * Class Roles
 *
 * @package   nguyenanhung\WebBuilderModules\Platforms\Roles\Components
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class Roles extends BaseComponents
{
    public const FULLY_PERMISSION = 'fully';
    public const ALL_PERMISSION = 'all';

    /** @var int ID của người dùng trong session */
    protected $userId;

    /** @var int ID của group người dùng trong session */
    protected $userGroup;

    /**
     * Roles constructor.
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

    public function setUserId($userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function setUserGroup($userGroup): self
    {
        $this->userGroup = $userGroup;

        return $this;
    }

    public function checkPermission($modules = null, $action = null, $mode = 'user_group'): bool
    {
        $mode = strtolower($mode);
        if ($modules === null || $action === null) {
            return false;
        }
        if ($mode === 'user_id') {
            $checkId = $this->userId;
            $countFunction = 'countAuthenticationMetaByUserId';
            $cachePrefix = 'check-Permission-by-User-Id-' . $this->userId;
        } else {
            $checkId = $this->userGroup;
            $countFunction = 'countAuthenticationMetaByUserGroup';
            $cachePrefix = 'check-Permission-by-User-Group-' . $this->userGroup;
        }

        $cacheKey = md5($cachePrefix . $modules . $action);

        // Fully Permission
        $auth_fully_permission = $this->cache->save($cacheKey . '-fully-permission', $this->db->getInfoAuthentication(self::FULLY_PERMISSION, self::ALL_PERMISSION));

        $fully_permission_id = $auth_fully_permission === null ? null : $auth_fully_permission->id;
        $fully_permission = $fully_permission_id === null ? null : $this->db->$countFunction($checkId, $fully_permission_id);

        // All Modules Permission
        $auth_all_modules_permission = $this->cache->save($cacheKey . '-all-modules-permission', $this->db->getInfoAuthentication($modules, self::ALL_PERMISSION));
        $all_modules_permission_id = $auth_all_modules_permission === null ? null : $auth_all_modules_permission->id;
        $modules_all_permission = $all_modules_permission_id === null ? null : $this->db->$countFunction($checkId, $all_modules_permission_id);

        // Action Modules Permission
        $auth_action_modules_permission = $this->cache->save($cacheKey . '-action-modules-permission', $this->db->getInfoAuthentication($modules, $action));
        $action_modules_permission_id = $auth_action_modules_permission === null ? null : $auth_action_modules_permission->id;
        $modules_action_permission = $action_modules_permission_id === null ? null : $this->db->$countFunction($checkId, $action_modules_permission_id);

        // Return Result
        return $fully_permission || $modules_all_permission || $modules_action_permission;
    }

    public function checkPermissionSidebar($sidebar_filename = null, $config_sidebar_sub = null, $mode = 'user_group'): bool
    {
        if ($sidebar_filename === null || $config_sidebar_sub === null) {
            return false;
        }

        if ($mode === 'user_id') {
            $checkId = $this->userId;
            $countFunction = 'countAuthenticationSidebarMetaByUserId';
            $cachePrefix = 'check-Permission-Sidebar-by-User-Id-' . $this->userId;
        } else {
            $checkId = $this->userGroup;
            $countFunction = 'countAuthenticationSidebarMetaByUserGroup';
            $cachePrefix = 'check-Permission-Sidebar-by-User-Group-' . $this->userGroup;
        }
        $cacheKey = md5($cachePrefix . $sidebar_filename . $config_sidebar_sub);

        // Fully Permission
        $auth_fully_permission = $this->cache->save($cacheKey . '-fully-permission', $this->db->getInfoAuthenticationSidebar(self::FULLY_PERMISSION, self::ALL_PERMISSION));
        $fully_permission_id = $auth_fully_permission === null ? null : $auth_fully_permission->id;
        $fully_permission = $fully_permission_id === null ? null : $this->db->$countFunction($checkId, $fully_permission_id);

        // All Modules Permission
        $auth_all_modules_permission = $this->cache->save($cacheKey . '-all-modules-permission', $this->db->getInfoAuthenticationSidebar($sidebar_filename, self::ALL_PERMISSION));
        $all_modules_permission_id = $auth_all_modules_permission === null ? null : $auth_all_modules_permission->id;
        $modules_all_permission = $all_modules_permission_id === null ? null : $this->db->$countFunction($checkId, $all_modules_permission_id);

        // Action Modules Permission
        $auth_action_modules_permission = $this->cache->save($cacheKey . '-action-modules-permission', $this->db->getInfoAuthenticationSidebar($sidebar_filename, $config_sidebar_sub));
        $action_modules_permission_id = $auth_action_modules_permission === null ? null : $auth_action_modules_permission->id;
        $modules_action_permission = $action_modules_permission_id === null ? null : $this->db->$countFunction($checkId, $action_modules_permission_id);

        // Return Result
        return $fully_permission || $modules_all_permission || $modules_action_permission;
    }
}
