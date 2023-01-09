<?php
/**
 * Project cms-roles-components
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 23/08/2022
 * Time: 09:22
 */

namespace nguyenanhung\WebBuilderModules\Platforms\Roles\Database\Traits;

/**
 * Trait AuthenticationTable
 *
 * @package   nguyenanhung\WebBuilderModules\Platforms\Roles\Database\Traits
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
trait AuthenticationTable
{
    public function getInfoAuthentication($modules = '', $action = '', $active = 'Yes')
    {
        $active           = ucfirst($active);
        $wheres           = array();
        $wheres['active'] = ['field' => 'active', 'operator' => '=', 'value' => $active];
        if (!empty($modules)) {
            $wheres['module'] = ['field' => 'module', 'operator' => '=', 'value' => $modules];
        }
        if (!empty($action)) {
            $wheres['action'] = ['field' => 'action', 'operator' => '=', 'value' => $action];
        }
        $DB     = $this->initDBTable('authentication');
        $result = $DB->getInfo($wheres);
        $DB->disconnect();

        return $result;
    }

    public function countAuthenticationMetaByUserGroup($id_group = null, $id_authentication = null): int
    {
        $wheres = array();
        if (!empty($id_group)) {
            $wheres['id_group'] = ['field' => 'id_group', 'operator' => '=', 'value' => $id_group];
        }
        if (!empty($id_authentication)) {
            $wheres['id_authentication'] = ['field' => 'id_authentication', 'operator' => '=', 'value' => $id_authentication];
        }
        $DB     = $this->initDBTable('authentication_meta');
        $result = $DB->countResult($wheres);
        $DB->disconnect();

        return $result;
    }

    public function countAuthenticationMetaByUserID($user_id = null, $authentication_id = null): int
    {
        $wheres = array();
        if (!empty($user_id)) {
            $wheres['user_id'] = ['field' => 'user_id', 'operator' => '=', 'value' => $user_id];
        }
        if (!empty($authentication_id)) {
            $wheres['authentication_id'] = ['field' => 'authentication_id', 'operator' => '=', 'value' => $authentication_id];
        }
        $DB     = $this->initDBTable('authentication_meta_by_user');
        $result = $DB->countResult($wheres);
        $DB->disconnect();

        return $result;
    }

    public function getInfoAuthenticationSidebar($sidebar_filename = '', $config_sidebar_sub = '', $active = 'Yes')
    {
        $active           = ucfirst($active);
        $wheres           = array();
        $wheres['active'] = ['field' => 'active', 'operator' => '=', 'value' => $active];
        if (!empty($sidebar_filename)) {
            $wheres['sidebar_filename'] = ['field' => 'sidebar_filename', 'operator' => '=', 'value' => $sidebar_filename];
        }
        if (!empty($config_sidebar_sub)) {
            $wheres['config_sidebar_sub'] = ['field' => 'config_sidebar_sub', 'operator' => '=', 'value' => $config_sidebar_sub];
        }
        $DB     = $this->initDBTable('authentication_sidebar');
        $result = $DB->getInfo($wheres);
        $DB->disconnect();

        return $result;
    }

    public function countAuthenticationSidebarMetaByUserGroup($id_group = null, $id_authentication = null): int
    {
        $wheres = array();
        if (!empty($id_group)) {
            $wheres['id_group'] = ['field' => 'id_group', 'operator' => '=', 'value' => $id_group];
        }
        if (!empty($id_authentication)) {
            $wheres['authentication_sidebar_id'] = ['field' => 'authentication_sidebar_id', 'operator' => '=', 'value' => $id_authentication];
        }
        $DB     = $this->initDBTable('authentication_sidebar_by_user_group');
        $result = $DB->countResult($wheres);
        $DB->disconnect();

        return $result;
    }

    public function countAuthenticationSidebarMetaByUserID($user_id = null, $authentication_id = null): int
    {
        $wheres = array();
        if (!empty($user_id)) {
            $wheres['user_id'] = ['field' => 'user_id', 'operator' => '=', 'value' => $user_id];
        }
        if (!empty($authentication_id)) {
            $wheres['authentication_sidebar_id'] = ['field' => 'authentication_sidebar_id', 'operator' => '=', 'value' => $authentication_id];
        }
        $DB     = $this->initDBTable('authentication_sidebar_by_user_id');
        $result = $DB->countResult($wheres);
        $DB->disconnect();

        return $result;
    }
}
