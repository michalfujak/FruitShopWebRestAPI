<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.0.000
*  @copyright     Michal Fujak - Programator
*  @framework     n/a
*  @license       http://www.dev-droid.sk
*  @this website  http://www.android.dev-droid.sk [ Web urceni pre FruitShop Android application ] Test IP connect JSON and Retrofit
*  @Copyring      09.12.2018 20:00
*  @File          ip.php
*  @Update        edit:    [n/a][n/a]  version[n/a] [n/a]
*/

$ip = array();
$ip['ip'] = $_SERVER["REMOTE_ADDR"];
print json_encode($ip);