<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.1.000
*  @copyright     Michal Fujak - Programator
*  @framework     Fruit Shop WebSite
*  @license       http://www.dev-droid.sk
*  @Copyring      11.09.2018
*  @File          modul/sessions/Sessions.php
*/


class Sessions
{
    private $db;
    private $connect;
    private $sql;
    private $result;
    private $row;
    // Column
    private $id_column;
    private $name_column;
    private $value_column;
    private $help_column;
    private $value_time_const_column;
    private $comment_column;
    private $pack_column;
    private $create_time_column;
    private $id_cpp;
    private $const_time;

    public function __construct()
    {
        // Construct class Sessions
        $this->connect = new Connect_mysqli();
        $this->db = $this->connect->connect_database();
        $this->id_column = "id_session_relation";
        $this->name_column = "name_define_session";
        $this->value_column = "value_session_relation";
        $this->value_time_const_column = "value_time_const_session_relation";
        $this->pack_column = "pack_session_relation";
        $this->help_column = "help_session_relation";
        $this->comment_column = "comment_session";
        $this->create_time_column = "info_create_time_session_relation";
        //
        $this->id_cpp = 0;
        $this->const_time = 0;

    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function sessions_cpp($id)
    {
        // Metoda sa viaze na triedu, ako pocitanie riadkov v stlpci ID. Special method pre class.
        $this->sql = " SELECT $this->id_column FROM " . TABLE_SESSION_RELATION;
        $this->result = $this->db->query($this->sql) or die($this->db);
        while($this->row = mysqli_fetch_array($this->result))
        {
            $this->row[$this->id_column];
            $this->id_cpp++;
        }
        return (int)$this->id_cpp;
    }

    public function session_time($defined)
    {
        $this->sql = " SELECT $this->id_column $this->name_column, $this->value_column FROM " . TABLE_SESSION_RELATION . " WHERE $this->name_column='$defined' ";
        $this->result = $this->db->query($this->sql) or die(mysqli_error($this->db));
        $this->row = $this->result->fetch_array(MYSQLI_BOTH);
        return (int)$this->row[$this->value_column];
    }

    public function session_pack_load($defined)
    {
        // Nacitanie balicka kde bude relacia aktivna.
        $this->sql = " SELECT $this->name_column, $this->pack_column, $this->help_column FROM " .TABLE_SESSION_RELATION . " WHERE $this->name_column='$defined' ";
        $this->result = $this->db->query($this->sql) or die(mysqli_error($this->db));
        $this->row = $this->result->fetch_array(MYSQLI_BOTH);
        return (string)$this->row[$this->pack_column];
    }

    public function create_session($define_, $value_, $pack_, $time__, $help_, $comment_)
    {
        // Metoda na vytvorenie session. Uz je to mozne volat z ADM panelu.
        // Hodnota ID sa neuvadza je generovana automaticka cez methodu AUTO INCREMENT
        // Method volame len z CONTROL directory
        // feed
        $this->const_time = time();
        $this->sql = " INSERT INTO " . TABLE_SESSION_RELATION . " ($this->id_column, $this->name_column, $this->value_column, $this->value_time_const_column, $this->pack_column, $this->create_time_column, $this->help_column, $this->comment_column) " .
                     " VALUES (NULL, '$define_', $value_, $this->const_time, '$pack_', $time__, '$help_', '$comment_') ";
        $this->result = $this->db->query($this->sql) or die(mysqli_error($this->db));
        $this->db->close();
    }

}

?>