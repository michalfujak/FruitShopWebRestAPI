<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.0.000
*  @copyright     Michal Fujak - Programator
*  @framework     n/a
*  @license       http://www.dev-droid.sk
*  @this website  http://www.android.dev-droid.sk [ Web urceni pre FruitShop Android application ]
*  @Copyring      11.12.2018 20:00
*  @File          register.php
*  @Update        edit:    [n/a][n/a]  version[n/a] [n/a]
*/

// Require files
require_once('config.php');
require_once($doubleBack . 'modul/tables/tables_sql.' . $phpEx);
require_once($php_name_page_root_pack_api . 'db_connect.' . $phpEx);
require_once($php_name_page_root_pack_api . 'db_functions.' . $phpEx);


// Method : POST
// Param  : phone
// Result : JSON

$objRegister = new db_functions();

// Array
$response = array();
if($_POST['phone'] && $_POST['name'] && $_POST['birthdate'] && $_POST['address'])
{
    // variable post
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];

    if($objRegister->checkUserExists($phone))
    {
        $response['error_msg'] = "User already exted with. SK(Uzivatel uz existuje. ) " . $phone;
        print json_encode($response);
    }
    else
    {
        // Register new user
        $user = $objRegister->registerNewUser($phone, $name, $birthdate, $address);
        if($user)
        {
            $response['user'] = $user['Phone'];
            $response['name'] = $user['Name_'];
            $response['birthdate'] = $user['Birthdate'];
            $response['address'] = $user['Address'];
            $response['done'] = "  done!";
            print json_encode($response);
        }
        else
        {
            $response['error_msg'] = "Unknow error occurred in registration! SK( Neocakavana chyba pri registracii! ) ";
            print json_encode($response);
        }
    }
}
else
{
    $response['error_msg'] = "Required parameter (phone, name, birthdate, address) is missing! SK( Odkazujuce parametre su prazdne! ) ";
    print json_encode($response);
}

// API done! 





?>