<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.0.000
*  @copyright     Michal Fujak - Programator
*  @framework     n/a
*  @license       http://www.dev-droid.sk
*  @this website  http://www.android.dev-droid.sk [ Web urceni pre FruitShop Android application ]
*  @Copyring      02.12.2018 20:00
*  @File          db_functions.php
*  @Update        edit:    [n/a][n/a]  version[n/a] [n/a]
*/

// import
require_once('config.php');
require_once($php_name_page_root_pack_api . 'android/db_connect.' . $phpEx);
require_once('modul/tables/tables_sql.' . $phpEx);

class db_functions
{
    // Var
    private $db_stmt;
    private $objConnect;
    private $result_stmt;
    private $result_stmt_reg;
    private $user_obj;
    public function __construct()
    {
        // construct
        $this->objConnect = new connectDB();
        $this->db_stmt = $this->objConnect->connectMethod();
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function checkUserExists($phone)
    {
        // Methoda zisti ci dani uzivatel existuje.
        $this->result_stmt = $this->db_stmt->prepare("SELECT * FROM " . TABLE_USER . " WHERE Phone=?");
        $this->result_stmt->bind_param("s", $phone);
        $this->result_stmt->execute();
        $this->result_stmt->store_result();
        if($this->result_stmt->num_rows > 0)
        {
            $this->result_stmt->close();
            return true;
        }
        else
        {
            $this->result_stmt->close();
            return false;
        }
    }

    public function registerNewUser($phone, $name, $birthdate, $address)
    {
        // Registracia noveho uzivatela
        // Pri chybe v JSON alebo vynimke Exception vrati false.
        // done!
        $this->result_stmt_reg = $this->db_stmt->prepare("INSERT INTO " . TABLE_USER . "(Phone, Name_, Birthdate, Address) VALUES(?, ?, ?, ?)");
        $this->result_stmt_reg->bind_param("ssss", $phone, $name, $birthdate, $address);
        $this->result_stmt_reg->execute();
        $this->result_stmt_reg->close();

        if($this->result_stmt_reg)
        {
            $this->result_stmt = $this->db_stmt->prepare("SELECT * FROM " . TABLE_USER . " WHERE Phone=? ");
            $this->result_stmt->bind_param("s", $phone);
            $this->result_stmt->execute();
            $this->user_obj = $this->result_stmt->get_result()->fetch_assoc();
            $this->result_stmt->close();
            return $this->user_obj;
        }
        else
        {
            return false;
        }
    }

}





?>