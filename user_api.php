<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.0.000
*  @copyright     Michal Fujak - Programator
*  @framework     n/a
*  @license       http://www.dev-droid.sk
*  @this website  http://www.android.dev-droid.sk [ Web urceni pre FruitShop Android application ]
*  @Copyring      08.12.2018 20:00
*  @File          config.php
*  @Update        edit:    [n/a][n/a]  version[n/a] [n/a]
*/


class user_api
{
    private $objSqlManager;
    private $objDbFunctions;
    // Column
    private $id_phone_column;
    private $name_column;
    private $birthdate_column;
    private $address_column;
    private $exists_user_require;

    public function __construct()
    {
        // Construct
        // Var
        $this->id_phone_column = "Phone";
        $this->name_column = "Name_";
        $this->birthdate_column = "Birthdate";
        $this->address_column = "Address";
        $this->exists_user_require = $_REQUEST['user_exists'];
        // Object
        $this->objSqlManager = new sql_variable_manager(TABLE_USER,
                                                        $this->id_phone_column, false, $this->name_column,
                                                  false, false, false, false,
                                                   false, false, false, false,
                                               false, false);
        $this->objDbFunctions = new db_functions();
        // Set, Get
        $this->objSqlManager->setRowLastValue($this->name_column);
        $this->objSqlManager->setRowCountId($this->id_phone_column);
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function view_user_name()
    {
        // Metoda vycita aktualneho uzivatela z database.
        print '<table style="border: 1px">' . "\n";
        print '    <tr>' . "\n";
        print '        <td>' . "Posledny uzivatel: " . '</td>' . "\n";
        print '        <td>' . "Pocet uzivatelov: " . '</td>' . "\n";
        print '    </tr>' . "\n";
        print '    <tr>' . "\n";
        print '        <td>' . "[ " . $this->objSqlManager->getRowLastValue() . " ]" . '</td>' . "\n";
        print '        <td>' . "[ " . $this->objSqlManager->getRowCountId() . " ]" . '</td>' . "\n";
        print '    </tr>' . "\n";
        print '</table>' . "\n";
    }

    public function view_check_user($param_req)
    {
        // Zobrazenie uzivatela CHECK USERS
        // continue...
        if($this->exists_user_require == 0)
        {
            print "FALSE!";
            return false;
        }
        else
        {
            if($this->objDbFunctions->checkUserExists($this->exists_user_require) == true)
            {
                print "TRUE";
                return true;
            }
        }
    }
}

?>