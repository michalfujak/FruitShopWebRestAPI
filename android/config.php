<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.0.000
*  @copyright     Michal Fujak - Programator
*  @framework     n/a
*  @license       http://www.dev-droid.sk
*  @this website  http://www.android.dev-droid.sk [ Web urceni pre FruitShop Android application ]
*  @Copyring      02.12.2018 20:00
*  @File          config.php
*  @Update        edit:    [n/a][n/a]  version[n/a] [n/a]
*/

global $phpEx; $directory; $back; $doubleBack; $db_table_prefix; $php_name_page_root_pack_api;
// object globals
global $obj, $stmt_obj;
$phpEx = 'php';
$directory = '/';
$back = './';
$doubleBack = '../';
$db_table_prefix = ""; // Prefix hack
$php_name_page_root_pack_api = (defined('PHP_ANDROID_FRUIT_SHOP_API')) ? PHP_ANDROID_FRUIT_SHOP_API : './'; // Set alternative string... [ done! ]


define("DB_LOCALHOST",    "sql17.dnsserver.eu");
define("DB_USER",         "db127335x305");
define("DB_PASSWORD",     "vxdrt4iin258dfgAS7");
define("DB_DATABASE",     "db127335x305");
define("DB_PORT",         3306);
define("DB_SOCKET",       false);

// Znakove sady
define('UTF_SK', 'utf8'); // Slovak
// debugging
define("DEBUG_IN",        false);

?>

