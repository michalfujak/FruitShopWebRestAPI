<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.4.000
*  @copyright     Michal Fujak - Programator
*  @framework     Fruit Shop WebSite BETA 3
*  @license       http://www.dev-droid.sk
*  @Copyring      22.09.2018 23:00
*  @File          modul/db/Connect_mysqli.php.php
*/



// OOP

class Config_db
{

    private $db;
    private $connect;
    private $sql;
    private $result;
    function __construct()
    {
        //Construct
        $this->connect = new Connect_mysqli();
        $this->db = $this->connect->connect_database();

    }
    function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->db->close();
        $this->db;
        $this->result;
        $this->sql;
    }

    public function load_config_name($defined)
    {
        // Nacitanie dat z database pre configuracne data...
        $this->sql = "SELECT name_define, values_, comment_values FROM " . TABLE_CONFIG . " WHERE name_define='$defined' ";
        $this->result = $this->db->query($this->sql) or die(mysqli_error($this->db));
        while($row = mysqli_fetch_array($this->result))
        {
            return (string)$row['values_'];
        }
    }

    public function load_config_id($defined)
    {
        // Nacitanie dat z config tabulky, vrati int hodnotu k spracovaniu.
        $this->sql = "SELECT id, name_define, values_ FROM " . TABLE_CONFIG . " WHERE name_define='$defined' ";
        $this->result = $this->db->query($this->sql) or die(mysqli_error($this->db));
        while($row = mysqli_fetch_array($this->result))
        {
            return (int)$row['id'];
        }
    }


}

?>