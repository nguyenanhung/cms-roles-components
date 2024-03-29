<?php

namespace nguyenanhung\WebBuilderModules\Platforms\Roles\Database;

trait AuthenticationTable
{
    public function getInfoAuthentication($modules = '', $action = '', $active = 'Yes')
    {
        $active = ucfirst($active);
        $wheres = array();
        $wheres['active'] = ['field' => 'active', 'operator' => '=', 'value' => $active];
        if (!empty($modules)) {
            $wheres['module'] = ['field' => 'module', 'operator' => '=', 'value' => $modules];
        }
        if (!empty($action)) {
            $wheres['action'] = ['field' => 'action', 'operator' => '=', 'value' => $action];
        }
        $DB = $this->initDBTable(self::TABLE_AUTHENTICATION);
        $result = $DB->getInfo($wheres);
        $DB->disconnect();

        return $result;
    }

    public function countAuthenticationMetaByUserGroup($id_group = null, $id_authentication = null)
    {
        $wheres = array();
        if (!empty($id_group)) {
            $wheres['id_group'] = ['field' => 'id_group', 'operator' => '=', 'value' => $id_group];
        }
        if (!empty($id_authentication)) {
            $wheres['id_authentication'] = ['field' => 'id_authentication', 'operator' => '=', 'value' => $id_authentication];
        }
        $DB = $this->initDBTable(self::TABLE_AUTHENTICATION_META_BY_GROUP);
        $result = $DB->countResult($wheres);
        $DB->disconnect();

        return $result;
    }

    public function countAuthenticationMetaByUserID($user_id = null, $authentication_id = null)
    {
        $wheres = array();
        if (!empty($user_id)) {
            $wheres['user_id'] = ['field' => 'user_id', 'operator' => '=', 'value' => $user_id];
        }
        if (!empty($authentication_id)) {
            $wheres['authentication_id'] = ['field' => 'authentication_id', 'operator' => '=', 'value' => $authentication_id];
        }
        $DB = $this->initDBTable(self::TABLE_AUTHENTICATION_META_BY_USER);
        $result = $DB->countResult($wheres);
        $DB->disconnect();

        return $result;
    }

    // ~~~~~~~~~~~~~~~~ Role Services
    public function getInfoAuthenticationServices($modules = '', $action = '', $active = 'Yes')
    {
        $active = ucfirst($active);
        $wheres = array();
        $wheres['active'] = ['field' => 'active', 'operator' => '=', 'value' => $active];
        if (!empty($modules)) {
            $wheres['module'] = ['field' => 'module', 'operator' => '=', 'value' => $modules];
        }
        if (!empty($action)) {
            $wheres['action'] = ['field' => 'action', 'operator' => '=', 'value' => $action];
        }
        $DB = $this->initDBTable('authentication');
        $result = $DB->getInfo($wheres);
        $DB->disconnect();

        return $result;
    }

    public function countAuthenticationServicesMetaByUserGroup($id_group = null, $id_authentication = null)
    {
        $wheres = array();
        if (!empty($id_group)) {
            $wheres['id_group'] = ['field' => 'id_group', 'operator' => '=', 'value' => $id_group];
        }
        if (!empty($id_authentication)) {
            $wheres['id_authentication'] = ['field' => 'id_authentication', 'operator' => '=', 'value' => $id_authentication];
        }
        $DB = $this->initDBTable('authentication_meta');
        $result = $DB->countResult($wheres);
        $DB->disconnect();

        return $result;
    }

    public function countAuthenticationServicesMetaByUserID($user_id = null, $authentication_id = null)
    {
        $wheres = array();
        if (!empty($user_id)) {
            $wheres['user_id'] = ['field' => 'user_id', 'operator' => '=', 'value' => $user_id];
        }
        if (!empty($authentication_id)) {
            $wheres['authentication_id'] = ['field' => 'authentication_id', 'operator' => '=', 'value' => $authentication_id];
        }
        $DB = $this->initDBTable('authentication_meta_by_user');
        $result = $DB->countResult($wheres);
        $DB->disconnect();

        return $result;
    }

    // ~~~~~~~~~~~~~~~~ Role Sidebar
    public function getInfoAuthenticationSidebar($sidebar_filename = '', $config_sidebar_sub = '', $active = 'Yes')
    {
        $active = ucfirst($active);
        $wheres = array();
        $wheres['active'] = ['field' => 'active', 'operator' => '=', 'value' => $active];
        if (!empty($sidebar_filename)) {
            $wheres['sidebar_filename'] = ['field' => 'sidebar_filename', 'operator' => '=', 'value' => $sidebar_filename];
        }
        if (!empty($config_sidebar_sub)) {
            $wheres['config_sidebar_sub'] = ['field' => 'config_sidebar_sub', 'operator' => '=', 'value' => $config_sidebar_sub];
        }
        $DB = $this->initDBTable(self::TABLE_AUTHENTICATION_SIDEBAR);
        $result = $DB->getInfo($wheres);
        $DB->disconnect();

        return $result;
    }

    public function countAuthenticationSidebarMetaByUserGroup($id_group = null, $id_authentication = null)
    {
        $wheres = array();
        if (!empty($id_group)) {
            $wheres['id_group'] = ['field' => 'id_group', 'operator' => '=', 'value' => $id_group];
        }
        if (!empty($id_authentication)) {
            $wheres['authentication_sidebar_id'] = ['field' => 'authentication_sidebar_id', 'operator' => '=', 'value' => $id_authentication];
        }
        $DB = $this->initDBTable(self::TABLE_AUTHENTICATION_SIDEBAR_META_BY_GROUP);
        $result = $DB->countResult($wheres);
        $DB->disconnect();

        return $result;
    }

    public function countAuthenticationSidebarMetaByUserID($user_id = null, $authentication_id = null)
    {
        $wheres = array();
        if (!empty($user_id)) {
            $wheres['user_id'] = ['field' => 'user_id', 'operator' => '=', 'value' => $user_id];
        }
        if (!empty($authentication_id)) {
            $wheres['authentication_sidebar_id'] = ['field' => 'authentication_sidebar_id', 'operator' => '=', 'value' => $authentication_id];
        }
        $DB = $this->initDBTable(self::TABLE_AUTHENTICATION_SIDEBAR_META_BY_USER);
        $result = $DB->countResult($wheres);
        $DB->disconnect();

        return $result;
    }
}
