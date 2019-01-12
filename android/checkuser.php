<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.0.000
*  @copyright     Michal Fujak - Programator
*  @framework     n/a
*  @license       http://www.dev-droid.sk
*  @this website  http://www.android.dev-droid.sk [ Web urceni pre FruitShop Android application ]
*  @Copyring      09.12.2018 20:00
*  @File          checkuser.php
*  @Update        edit:    [n/a][n/a]  version[n/a] [n/a]
*/


// Require file
require_once('config.php');
require_once($doubleBack . 'modul/tables/tables_sql.' . $phpEx);
require_once($php_name_page_root_pack_api . 'db_connect.' . $phpEx);
require_once($php_name_page_root_pack_api . 'db_functions.' . $phpEx);


// Method : POST
// Param  : phone
// Result : JSON

$objFunc = new db_functions();

$response = array();
if(isset($_POST['phone']))
{
    $phone = $_POST['phone'];
    if($objFunc->checkUserExists($phone))
    {
        $response['exists'] = TRUE;
        print json_encode($response);
    }
    else
    {
        $response['exists'] = FALSE;
        print json_encode($response);
    }
}
else
{
    $response['error_msg'] = "Required parameter (phone) is missing! SK [ Odkazujuci parameter (phone) je prazdny! ] ";
    print json_encode($response);
}
?>