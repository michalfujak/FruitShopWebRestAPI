<?php

/*
*  @Autor:        Michal Fujak
*  @version       1.0.000
*  @copyright     Michal Fujak - Programator
*  @framework     n/a
*  @license       http://www.dev-droid.sk
*  @this website  http://www.android.dev-droid.sk [ Web urceni pre FruitShop Android application ]
*  @Copyring      08.12.2018 20:00
*  @File          index.php
*  @Update        edit:    [n/a][n/a]  version[n/a] [n/a]
*/

require_once('config.php');
require_once($php_name_page_root_pack_api . 'modul/driver/Connect_mysqli.' . $phpEx);
require_once($php_name_page_root_pack_api . 'modul/tables/tables_sql.' . $phpEx);
require_once($php_name_page_root_pack_api . 'modul/sql/sql_variable_manager.' . $phpEx);
require_once($php_name_page_root_pack_api . 'user_api.' . $phpEx);
// REQUIRE API CONTROLLER
//require_once($php_name_page_root_pack_api . 'android/db_connect.' . $phpEx);
//require_once($php_name_page_root_pack_api . 'android/db_functions.' . $phpEx);
// LANG
require_once($php_name_page_root_pack_api . 'language/sk/exception.' . $phpEx);
require_once($php_name_page_root_pack_api . 'language/sk/message_all.' . $phpEx);

// START HTML
require_once($php_name_page_root_pack_api . 'view/styles/fruit_shop_api/template/layout_header_tpl.' . $phpEx);
require_once($php_name_page_root_pack_api . 'view/styles/fruit_shop_api/template/layout_title_tpl.' . $phpEx);
require_once($php_name_page_root_pack_api . 'view/styles/fruit_shop_api/template/layout_body_start_tpl.' . $phpEx);
require_once($php_name_page_root_pack_api . 'view/styles/fruit_shop_api/template/layout_menu_tpl.' . $phpEx);
require_once($php_name_page_root_pack_api . 'view/styles/fruit_shop_api/template/layout_slider_view_tpl.' . $phpEx);
require_once($php_name_page_root_pack_api . 'view/styles/fruit_shop_api/template/login_internal_tpl.' . $phpEx);
require_once($php_name_page_root_pack_api . 'view/styles/fruit_shop_api/template/layout_body_tpl.' . $phpEx);
// HTML BODY

class index
{
    private $objUser;
    public function __construct()
    {
        // Construct
        // $this->objUser = new user_api();
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function view_user()
    {
        // $this->objUser->view_user_name();
        // $this->objUser->view_check_user($_REQUEST['user_exists']);
    }
}


require_once($php_name_page_root_pack_api . 'view/styles/fruit_shop_api/template/layout_body_bottom_tpl.' . $phpEx);
// END HTML
?>
