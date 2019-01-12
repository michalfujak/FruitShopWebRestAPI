<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.0.000
*  @copyright     Michal Fujak - Programator
*  @framework     n/a
*  @license       http://www.dev-droid.sk
*  @this website  http://www.android.dev-droid.sk [ Web urceni pre FruitShop Android application ]
*  @Copyring      02.12.2018 20:00
*  @File          db_connect.php
*  @Update        edit:    [n/a][n/a]  version[n/a] [n/a]
*/

require_once('config.php');


class connectDB
{
    // Trieda urcena k pripojeniu k databaze, pre mobilnu aplikaiu FruitShop.
    private $objConnect;
    public function __construct()
    {
        // construct
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function connectMethod()
    {
        $this->objConnect = new mysqli(DB_LOCALHOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT, DB_SOCKET);
        return $this->objConnect;
    }


}