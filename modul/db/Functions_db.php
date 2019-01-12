<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.4.000
*  @copyright     Michal Fujak - Programator
*  @framework     Fruit Shop WebSite BETA 3
*  @license       http://www.dev-droid.sk
*  @Copyring      22.09.2018 23:00
*  @File          modul/db/Functions_db.php
*/



// Start
class Functions_db
{

    private $db;
    private $conn_mysqli;
    function __construct()
    {
        // Construct
        $this->conn_mysqli = new Connect_mysqli();
        $this->db = $this->conn_mysqli->connect_database();
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->db;
        $this->conn_mysqli;
    }

    public function checkDatabase($bool_return)
    {
        try
        {
            if(!$this->db->connect_error)
            {
                return true;
                // Database::online
            }
            else
            {
                throw new Exception("Nastala chyba pri overovani databaze. Predpokladani problem bude v overovani v databazovom spojeni. Kontaktujte administratora. ");
                return false;
                // Database::offline
            }
        }
        catch(Exception $e)
        {
            print $e->getMessage();
        }
    }
}
?>