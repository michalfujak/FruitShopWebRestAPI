<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.6.500
*  @copyright     Michal Fujak - Programator
*  @framework     Fruit Shop WebSite BETA 3
*  @license       http://www.dev-droid.sk
*  @Copyring      03.10.2018 18:00
*  @File          modul/monitor/Monitor_db.php
*  @Update        edit:    [22.10.2018][20:00]
*/


// --- POTREBNE TRIEDY -->
// --- Config.php -->
// --- driver/Connect_mysqli.class.php -->
// --- sql/sql_variable_manager.php -->
// --- INTERFACE -->

// --- CLASS     -->
class Monitor_db
{
    private $FIRST;
    private $LAST;
    // SQL
    private $sql_pdo;                           // ***
    private $sql_count_rows;                    // ***
    private $sql_exists;                        // ***
    // Result
    private $result_pdo;                        // **
    private $result_count;                      // ***
    private $result_exists;                     // ***
    // DB::Connect
    private $db;                                // Potom odstranit
    private $stmt_db;                           // ***
    private $connect;                           // ***
    private $sql_manager;                       // *** [ (object) sql_define.class.php ]
    // Rows
    private $row_pdo;                           // ***
    // NUMBER_VALUE
    private $list_cpp_number;
    private $id_column;
    private $id_list_column;
    private $num_rows;                          // ***
    private $num_feed_value;                    // ***
    // Columns
    private $name_column;
    private $value_agent_column;
    private $ip_column;
    private $user_column;
    private $port_column;
    private $msg_column;
    private $time_column;
    private $column_exists;
    private $session_column;
    private $comment_column;
    // Rewrite
    protected $rewrite_in_zero;
    protected $rewrite_in_value;
    // Setting vars
    private $table_correct;                     // *** SET
    private $count_cpp;                         // ***
    private $number_column_param;               // *** SET
    // LIMITED
    private $SQL_NUM_LIMIT_CPP;                 // ***
    private $SQL_MAX_LIMIT_CPP;                 // ***
    private $SQL_LIMIT_ONE_VAL;                 // ***
    protected $SQL_LIMITED_IN;                  // ***
    protected $SQL_LIMITED_EASY;                // ***
    protected $SQL_LIMITED_NORMAL;              // ***
    protected $SQL_LIMITED_HIGH;                // ***
    protected $SQL_LIMITED_EXCELLENT;           // ***
    // LANG
    private $lang;
    private $lang_object;

    function __construct()
    {
        // SET TABLE
        $this->setTable(TABLE_MONITOR_AGENT);
        // GET OBJECTS
        $this->connect = new Connect_mysqli();
        $this->db = $this->connect->connect_database();
        $this->stmt_db = $this->connect->connect_real_pdo();
        // VAR
        $this->count_cpp = 0;
        $this->num_rows = true;
        $this->num_feed_value = 1;                                                     // predefinuj hodnotu
        $this->list_cpp_number = 0;
        $this->SQL_NUM_LIMIT_CPP = 0;
        $this->SQL_MAX_LIMIT_CPP = 5000;
        $this->SQL_LIMIT_ONE_VAL = 1;
        $this->id_column = "id_monitor";
        $this->id_list_column = "id_list_monitor";
        $this->name_column = "name_define_monitor";
        $this->value_agent_column = "value_user_agent_monitor";
        $this->session_column = "session_active_monitor";
        $this->user_column = "user_monitor";
        $this->ip_column = "ip_monitor";
        $this->port_column = "port_monitor";
        $this->time_column = "time_create_monitor";
        $this->msg_column = "msg_monitor";
        $this->comment_column = "comment_monitor";
        $this->lang_object = new exception_list_array();
        $this->lang = array_merge((array)$this->lang_object->exception_monitor_agent_classed_tables, (array)$this->lang_object->log_information_monitor_agent_class);
        // object sql_manager [ class.sql_variable_manager.php ]
        $this->sql_manager = new sql_variable_manager($this->getTable(),
                                                      $this->id_column,
                                                      $this->id_list_column,
                                                      $this->name_column,
                                                      $this->value_agent_column,
                                                      $this->time_column,
                                                      $this->session_column,
                                               false, false, false, false,
                                                      $this->comment_column, false,
                                                      $this->ip_column);
        // SET DEFINED
        $this->FIRST = $this->sql_manager->getAscTrimSQL();
        $this->LAST = $this->sql_manager->getDescTrimSQL();
        $this->SQL_LIMITED_IN = $this->sql_manager->SQL_LIMITED_IN;
        $this->SQL_LIMITED_EASY = $this->sql_manager->SQL_LIMITED_EASY;
        $this->SQL_LIMITED_NORMAL = $this->sql_manager->SQL_LIMITED_NORMAL;
        $this->SQL_LIMITED_HIGH = $this->sql_manager->SQL_LIMITED_HIGH;
        $this->SQL_LIMITED_EXCELLENT = $this->sql_manager->SQL_LIMITED_EXCELLENT;
        // SET COLUMNS
        $this->setColumnExists($this->id_column);
        $this->setColumnNumbers($this->id_column);
        $this->sql_manager->setRowFirstValue($this->id_list_column);

    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function monitor_agent_cpp()
    {
        // Spocita celkove mnozstvo poli v database
        // Callback value ID
        return $this->sql_manager->getRowCountId();

    }

    public function with_list()
    {
        // Metoda iba vracia presny pocet riadkov pre identifikaciu a nasledne zapisanie novych udajov do DB
        // Osetrit chybu ak je pouzite rovnake ID nesmie sa opakovat, vytvorit Exception a eliminovat s vynimkami.
        // Over ci existuje nejaky zaznam.
        if($this->getColumnExists() == $this->num_rows)
        {
            // Ziadny zaznam
            // Pridat metodu ktora bude kontrolovat pocet nulovych vstupov alebo nezname vstupy. Pouzit metodiku z tools->monitor_agent.
            // Prepojit s TOOLS pre odpocuvanie sledov pre LOG chyb. [ Neznamych chyb ]
            return (int)$this->num_feed_value;
            // Vracia 1
            // STMT_PDO::CLOSE
        }
        else
        {
            // V database sa nachadza viac poli ako je nula.
            // Nastavit pre ID column
            $this->setColumnNumbers($this->id_column);
            // Kontrola ak je nula ide do bloku try, vynimka nabehne ak nastane neznama chyba.
            if($this->getColumnNumbers() != 0) // Pocet ID je viac ako nula.
            {
                // Osetrena kontrola ci nahodov nieje list_cpp prazdny.
                // Kontrola listu ci nevznikla neznama chyba.
                try
                {
                    // Hodnota vstupu do funkcie je INT. [ Pocet listou v stlpci id.  ]
                    return $this->with_list_search($this->getColumnNumbers());
                }
                catch(Exception $expres)
                {
                    $expres->getMessage();
                    $expres->getCode();
                    // Naprogramovat nastroj pre zapisovanie vynimiek pre konrolu chyb webu.
                    // LOG.D( Naprogramovat! )
                    print $this->lang['MONITOR_EXCEPTION_WITH_LIST_MESSAGE_10010'];
                }

            }
            else
            {
                // Vynimocny stav, podmienka je prazdna. Ak sa tu dostane.
                try
                {
                    if($this->getColumnNumbers() == 0 && $this->getColumnNumbers() == null)
                    {
                        // Naprogramovat textove polia. Pre vynimky...
                        // LOG.D( Naprogramovat! )
                        print $this->lang['MONITOR_EXCEPTION_WITH_LIST_MESSAGE_10012'];
                        // Ak vynikne chyba, vyvola tuto podmienku. Nasledne vlozi praydne data. Prida do listu jednotku...
                        return (int)$this->num_feed_value;
                    }
                }
                catch(Exception $e)
                {
                    // Nedefinovana specialna chyba, otestovat...
                    print $e->getMessage();
                    print $e->getCode();
                }
            }

        }
    }

    private function with_list_search($id_number)
    {
        // Update [ 1.7.0 ]
        // Actived PDO::ALL
        // Methoda ktora je napojena na methodu with_list su to synchrone methody.
        // Metoda prima parameter cislo pocet riadkov z databazy kolko je riadkov.
        // Metoda vracia hodnotu ak existuje hodnota poctu poli a vrati hodnotu a jednu viac.
        try
        {
            if(isset($id_number))
            {
                $this->sql_pdo = $this->sql_manager->getSelectTrimSQL() .
                    "$this->id_column, $this->id_list_column" .
                    $this->sql_manager->getFromTrimSQL() .
                    $this->sql_manager->getTableAll() .
                    $this->sql_manager->getWhereTrimSQL() .  "$this->id_list_column" .
                    $this->sql_manager->getLikeTrim() .  "?" .
                    $this->sql_manager->getOrderByTrimSQL() .  "$this->id_list_column" . $this->sql_manager->getDescTrimSQL() .
                    $this->sql_manager->getLimitTrimSQL() .  "$this->SQL_LIMIT_ONE_VAL";
                $this->result_pdo = $this->stmt_db->prepare($this->sql_pdo);
                if(!$this->result_pdo)
                {
                    print $this->lang['MONITOR_EXCEPTION_WITH_LIST_MESSAGE_10013'] . "Error-> " . $this->result_pdo->errorInfo() . "<br />";
                }
                $this->result_pdo->execute(array("%" . $id_number . "%"));
                if($this->result_pdo->rowCount() == 0)
                {
                    // Zaznamy neexistuju.
                    // LOG.D( $this->lang['MONITOR_INFORMATION_WITH_LIST_MESSAGE_1010'] ); NAPROGRAMOVAT LOGGER
                    // LOG.D( Doprogramovat! ) Informativnu hlasku o nenajdeni zaznamu.
                    // Vracia poslednu hodnotu pri nenajdeny ziadneho zaznamu.
                    $this->rewrite_in_zero = (int)$this->content_feed_autoload_agent($this->id_list_column, $this->LAST, $this->SQL_LIMITED_IN);
                    return ++$this->rewrite_in_zero;
                }
                else
                {
                    $this->row_pdo = $this->result_pdo->fetch();
                    // Volam methodu with_list_search_like_value
                    $this->result_pdo->closeCursor();
                    $this->rewrite_in_value = (int)$this->row_pdo[$this->id_list_column];
                    return $this->content_feed_autoload_agent_seeks($this->rewrite_in_value);
                }
            }
            else
            {
                print $this->lang['MONITOR_EXCEPTION_WITH_LIST_MESSAGE_10014'] . "<br />";
            }
        }
        catch(Exception $e)
        {
            // Doprogramovat LOGGER
            $e->getMessage();
            $e->getCode();
        }
        // call destructions
        unset($this->sql_pdo);
        unset($this->result_pdo);
        unset($this->row_pdo);

    }

    private function content_feed_autoload_agent($categoryColumn, $toSort, $limited)
    {
        // Nova metoda ktora komunikuje s PDO, precita posledne posledne pole co bolo vlozene.
        // Celektuje podla pola LIST
        // Vrati poslednu ciselnu hodnotu z LISTU
        // Parameter definuje ktore hodnoty sa vratia.
        // Param: $categoryColumn zadava sa stlpec ktory bude citani.
        // param: $toSort triedit podla ASC alebo DESC

        try
        {
            // block pri chybovom stave.
            $this->sql_pdo = $this->sql_manager->getSelectTrimSQL() .
                            "$this->id_column, $categoryColumn" .
                             $this->sql_manager->getFromTrimSQL() .
                             $this->sql_manager->getTableAll() .
                             $this->sql_manager->getOrderByTrimSQL() . "$categoryColumn" . $toSort .
                             $this->sql_manager->getLimitTrimSQL() . $limited;
            // result obj
            $this->result_pdo = $this->stmt_db->prepare($this->sql_pdo);
            if(!$this->result_pdo)
            {
                print $this->lang['MONITOR_EXCEPTION_WITH_LIST_MESSAGE_10016'] . "<br />";
            }
            $this->result_pdo->execute();
            $this->row_pdo = $this->result_pdo->fetch();
            $this->result_pdo->closeCursor();
            return $this->row_pdo[$categoryColumn];
            // Destructions variable
            unset($this->sql_pdo);
            unset($this->result_pdo);
            unset($this->row_pdo);
        }
        catch(Exception $e)
        {
             // Doplnit code LOG.D( Doprogramovat! )
            print $this->lang['MONITOR_EXCEPTION_WITH_LIST_MESSAGE_10018'] . "<br />";
        }
    }

    private function content_feed_autoload_agent_seeks($seek_result)
    {
        // Methoda ktora vyhlada a skontroluje ci pocet riadkov je totozny s vysledkom k porovnania.
        // param: specialna hodnota ktora je vyhladavana a dalej k porovnaniu. priklad  Podmienka($seek_result == <sqlmanager::column(idColumn)>)
        // Porovna dane cleny, dalej k spracovaniu a zapisu uz konkretnej hodnoty.
        try
        {
            // Kotrola pri behu funkcie a kodu.
            if($this->sql_manager->getRowCountId() == $seek_result)
            {
                return ++$seek_result;

            }
            else
            {
                return $this->content_feed_autoload_agent($this->id_list_column, $this->LAST, $this->SQL_LIMITED_IN);
            }
        }
        catch(Exception $e)
        {
            print $this->lang['MONITOR_EXCEPTION_CONTENT_SEEK_MESSAGE_10020'] . " InfoCode: " . $e->getCode();
        }
    }

    private function with_time_feed()
    {
        // Metoda precita posledne vlozenie z databazy, ale len date time relaciu. Pre citanie udajov.
    }

    public function write_tracking($list, $user, $session_locale, $msg)
    {
        // metoda ktora sleduje dianie na stranke a zapisuje vsetky okolnosti a vstakz medzi klientom a serverom.
        // Funkcia ktora odposluchava hlavne stranky a subory.
        // WRITE
        // $user                  =>>> Uzivatel
        // $session_locale        =>>> Hodnota session z lokacie kde sa uzivatel alebo host nachadza.
        // $msg                   =>>> Sprava, log do DB pre administratorsky panel.

    }

    public function last_visit($user)
    {
        // Last Visit ( Posledna navsteva )
        // Funkcia ktora precita poslednu navstevu na webe. Urcuje kontrolu vyhladavania a zaznamenanie vsetkych vstupov.
        // READ

    }

    public function check_list($param)
    {
        // Kontrola tabulky pre zapisom.
    }

    public function view_plugin_agent()
    {
        print "Kolko je zaznamov v stlpci ID: " . $this->getColumnNumbers() . "\n";
        if($this->getColumnExists() != true)
        {
            print "Zaznamy existuju..." . "\n";
        }
        else
        {
            print "Zaznam neexistuje." . "\n";
        }
        if(DEBUG_IN == true)
        {
            // initializable
            print "<br />";
            print "Function->Start: [ This->table->id_column(int) ] : " . $this->sql_manager->getRowCountId();
            print "<br />";
            print "Function->Start: [ This->table->list_column(int) ] :" . $this->sql_manager->getRowCountList();
            print "<br />";
            print "Function->Start: [ This->table->session_column(int) ] :" . $this->sql_manager->getRowCountSession();
            // print "FILL [id] :  " . $this->id_with_fill_list_column_pdo();
            print "<br />";
            print "Function->Start: [ This->table->getRowFirstValue(List) ] :" . $this->sql_manager->getRowFirstValue();
            $this->sql_manager->setRowFirstValue($this->id_column);
            print "<br />";
            print "Function->Start: [ This->table->getRowFirstValue(ID) ] id_column :" . $this->sql_manager->getRowFirstValue();
            print "<br />" . " Function->Start: [ This->table->getRowLastValue(ID) ] id_column: " . $this->sql_manager->getRowLastValue() . "";
            $this->sql_manager->setRowLastValue($this->id_list_column);
            print "<br />" . " Function->Start: [ This->table->getRowLastValue(LIST) ] id_list_column: " . $this->sql_manager->getRowLastValue() . "";
            $this->sql_manager->setRowLastValue($this->name_column);
            print "<br />" . " Function->Start: [ This->table->getRowLastValue(NAME) ] name_define_monitor: " . $this->sql_manager->getRowLastValue() . "";
            print "<br />";
            print "<br />";
            print "Vystupna hodnota z listu: [ " . $this->with_list() . " ]";
        }
        else
        {
            // view
        }

    }

    // Prerobyt...
    private function getTable()
    {
        return $this->table_correct;
    }

    private function setTable($table)
    {
        $this->table_correct = $table;
    }

    private function getColumnNumbers()
    {
        // Funkcia ktora pocita pocet poli v slpci [ Specifikacia pre konkretnu triedu. ]
        // MYSQLi and PDO
        // Vracia pocet poli.
        // Update [ 1.2.0 ]

        $this->sql_count_rows = "SELECT $this->number_column_param FROM " . $this->getTable() . " ORDER BY $this->id_column ASC  LIMIT $this->SQL_NUM_LIMIT_CPP, $this->SQL_MAX_LIMIT_CPP";
        $this->result_count = $this->stmt_db->prepare($this->sql_count_rows);
        $this->result_count->execute();
        // Count
        $this->count_cpp = $this->result_count->rowCount();
        $this->result_count->closeCursor();
        return (int) $this->count_cpp;
    }

    private function setColumnNumbers($column_read)
    {
        // Funkcia nastavi parameter pre kontrolu poctu poli v konkretnom stlpci ktory si nastavim v parametre.
        $this->number_column_param = $column_read;
    }

    private function setColumnExists($column)
    {
        $this->column_exists = $column;
    }

    private function getColumnExists()
    {
        // Metoda ktora zisti ci je v danom stlpci nejaky zaznam.
        // Ak je potrebne predefinovat funkciu je nutne ju zavolat, a prepisat parameter $column na iny nazov.
        // V vychodnom rezime sa nadefinuje id_column co je stlpec ID.
        // Vracia true alebo false. TRUE je nula a FALSE obsahuje hodnotu
        $this->sql_exists = " SELECT $this->column_exists FROM " . $this->getTable() . " ";
        $this->result_exists = $this->stmt_db->prepare($this->sql_exists);
        if(!$this->result_exists)
        {
            $this->result_exists->errorInfo(); // Chyba pri nacitani poli z daneho stlpca
        }
        $this->result_exists->execute();
        if($this->result_exists->fetchColumn() == 0)
        {
            $this->result_exists->closeCursor();
            return (boolean)true;
            // Pocet column je nula.
        }
        else
        {
            $this->result_exists->closeCursor();
            return (boolean)false;
            // Pocet column je viac ako nula.
        }

    }
}
?>