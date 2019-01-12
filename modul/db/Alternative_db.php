<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.4.000
*  @copyright     Michal Fujak - Programator
*  @framework     Fruit Shop WebSite BETA 3
*  @license       http://www.dev-droid.sk
*  @Copyring      22.09.2018 23:00
*  @File          modul/db/Alternative_db.php
*/

// info
// Trieda ktora cita data pre alternativnu databazovu tabulku. Hodnoty sa pouzivaju hlavne k citanie URI localnej cesty a podobne.

class Alternative_db
{
    private $db;
    private $sql;
    private $result;
    private $connect;
    private $row;
    private $column_id_increment;
    private $column_name;
    private $column_value;
    private $column_file;
    private $column_special_code;
    private $column_help;
    private $id_cpp;

    public function __construct()
    {
        // Construct
        $this->connect = new Connect_mysqli();
        $this->db = $this->connect->connect_database();
        $this->column_id_increment = "id_uri";
        $this->column_name = "name_define_uri";
        $this->column_value = "value_uri";
        $this->column_file = "file_uri";
        $this->column_special_code = "special_code_uri";
        $this->column_help = "help_commnet_uri";
        //
        $this->id_cpp = 0;
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function alternative_cpp($id)
    {
        // Metoda sa viaze na triedu, ako pocitanie riadkov v stlpci ID. Special method pre class.
        $this->sql = " SELECT $this->column_id_increment FROM " . TABLE_ALTERNATIVE_URI;
        $this->result = $this->db->query($this->sql) or die(mysqli_error($this->db));
        while($this->row = mysqli_fetch_array($this->result))
        {
            $this->row[$this->column_id_increment];
            $this->id_cpp++;
        }
        return (int)$this->id_cpp;
    }

    public function alternative_uri_link($defined)
    {
        // Funkcia ktora nacita URI string z database. Vracia string ako link...
        $this->sql = "SELECT $this->column_name, $this->column_value, $this->column_help FROM " . TABLE_ALTERNATIVE_URI . " WHERE $this->column_name='$defined' ";
        $this->result = $this->db->query($this->sql) or die(mysqli_error($this->db));
        $this->row = $this->result->fetch_array(MYSQLI_BOTH);
        return (string)$this->row[$this->column_value];
        $this->db->close();
    }

    public function alternative_uri_id($defined)
    {
        // Funkcia ktora vrati hodnotu INTEGER s aktualnou hodnotov pola.
        // RESULT->FETCH_ARRAY(MYSQLI_NUM = Indexuje podla Nazvu kluca              $row['name'])
        // RESULT->FETCH_ARRAY(MYSQLI_ASSOC = Indexuje podla ciselnej postupnosti   $row[0])
        // RESULT->FETCH_ARRAY(MYSQLI_BOTH = Indexuje podla Nazvu aj cisla kluca    $row['name'], $row[0])

        $this->sql = " SELECT $this->column_id_increment, $this->column_name, $this->column_value FROM " . TABLE_ALTERNATIVE_URI . " WHERE $this->column_name='$defined' ";
        $this->result = $this->db->query($this->sql) or die(mysqli_error($this->db));
        $this->row = $this->result->fetch_array(MYSQLI_ASSOC);
        return (int)$this->row[$this->column_id_increment];
        $this->db->close();

    }

    public function alternative_file_locale($defined)
    {
        // Funkcia vrati hodnotu typu string, ale bude davat info suboru.php
        $this->sql = " SELECT $this->column_name, $this->column_file FROM " . TABLE_ALTERNATIVE_URI . " WHERE $this->column_name='$defined' ";
        $this->result = $this->db->query($this->sql) or die(mysqli_error($this->db));
        $this->row = $this->result->fetch_array(MYSQLI_BOTH);
        return (string)$this->row[$this->column_file];
        $this->db->close();
    }
}

