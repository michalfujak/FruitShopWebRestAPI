<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.4.000
*  @copyright     Michal Fujak - Programator
*  @framework     Fruit Shop WebSite BETA 3
*  @license       http://www.dev-droid.sk
*  @File          modul/db/connect_mysqli.php
*  @Copyring      22.09.2018 23:00
*  @Update        edit:    [20.10.2018][00:55]  version[1.6.500]
*/



class Connect_mysqli
{

    private $connect; // delete
    private $conn_new;
    private $conn_pdo;
    private $localhost;
    private $admin_name;
    private $db_name;
    private $password;
    private $port;
    private $socket;
    private $secure;
    private $dns;
    private $driver;
    private $dns_link;
    private $charset_dns;
    public function __construct()
    {
        // Construct
        $this->setLocalhost(DB_LOCALHOST);
        $this->setAdminName(DB_USER);
        $this->setDb_name(DB_DATABASE);
        $this->setPassword(DB_PASSWORD);
        $this->setPort(DB_PORT);
        $this->setSocket(DB_SOCKET);
        $this->setSecure(DB_SECURE);
        $this->charset_dns = UTF_SK;
        $this->dns = "mysql:host=" . $this->getLocalhost() . ";dbname=" . $this->getDb_name() . ";charset=" . $this->charset_dns;
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function connect_database()
    {
        // Funkcia ktora kontroluje pripojenie k database...
        $this->connect = new mysqli($this->localhost, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT, DB_SOCKET);
        $this->connect->select_db(DB_DATABASE);
        $this->connect->set_charset(UTF_SK);
        return $this->connect;
    }

    public function connect_real_database()
    {
        // News connect DB
        // Mysqli >= PDO
        // Nastavit databasove spojenie.
        $this->conn_new = new mysqli($this->getLocalhost(), $this->getAdminName(), $this->getPassword(), $this->getDb_name(), $this->getPort(), $this->getSocket());
        $this->conn_new->select_db($this->getDb_name());
        $this->conn_new->set_charset(UTF_SK);
    }

    public function connect_real_pdo()
    {
        // News connect relative database
        // nove skusobne pripojenie cez PDO
        try
        {
            $this->conn_pdo = new PDO($this->dns, $this->getAdminName(), $this->getPassword());
            $this->conn_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn_pdo;
        }
        catch(PDOException $e)
        {
            print "Pripojenie zlihalo: " . $e->getMessage();
        }
    }

    private function setLocalhost($_localhost)
    {
        $this->localhost = $_localhost;
    }

    private function setAdminName($_admin_name)
    {
        $this->admin_name = $_admin_name;
    }

    private function setDb_name($_dbname)
    {
        $this->db_name = $_dbname;
    }

    private function setPassword($_password)
    {
        $this->password = $_password;
    }

    private function setPort($_port)
    {
        $this->port = $_port;
    }

    private function setSocket($_socket)
    {
        $this->socket = $_socket;
    }

    private function setSecure($_secure)
    {
        $this->secure = $_secure;
    }

    private function getLocalhost()
    {
        return $this->localhost;
    }

    private function getAdminName()
    {
        return $this->admin_name;
    }

    private function getDb_name()
    {
        return $this->db_name;
    }

    private function getPassword()
    {
        return $this->password;
    }

    private function getPort()
    {
        return $this->port;
    }

    private function getSocket()
    {
        return $this->socket;
    }

    private function getSecure()
    {
        return $this->secure;
    }
}



?>




























