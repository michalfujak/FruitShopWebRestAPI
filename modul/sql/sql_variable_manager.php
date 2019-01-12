<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.7.000
*  @copyright     Michal Fujak - Programator
*  @framework     Fruit Shop WebSite BETA 3
*  @license       http://www.dev-droid.sk
*  @Copyring      03.10.2018 18:00
*  @File          modul/sql/sql_define.php
*  @Update        edit:    [18.11.2018][24:00]  version[1.8.500] [1.2.000 edited]
*/

// --- POTREBNE TRIEDY -->
// --- Config.php -->
// --- driver/Connect_mysqli.class.php -->

class sql_variable_manager
{
    // variable
    // tables a column defined for construct
    protected $set_table;
    protected $set_id;
    protected $set_list;
    protected $set_name;
    protected $set_value;
    protected $set_timer;
    protected $set_session;
    protected $set_cookie;
    protected $set_post;
    protected $set_message;
    protected $set_msg_response;
    protected $set_comment;
    protected $set_user_msg;
    protected $set_ip;
    // define
    protected $SELECT;
    protected $FROM;
    protected $TABLE;
    protected $IF;
    protected $CREATE;
    protected $LIKE;
    protected $NOT;
    protected $EXISTS;
    protected $UNDEFINED;
    protected $TRIM;
    protected $WHERE;
    protected $ORDER_BY;
    protected $LIMIT;
    protected $STAR;
    protected $DESC_SQL;
    protected $ASC_SQL;
    // SQL LIMITED
    protected $SQL_NUM_LIMIT;
    protected $SQL_MAX_LIMIT;
    protected $SQL_ONE_LIMIT;
    public $SQL_LIMITED_IN;
    public $SQL_LIMITED_EASY;
    public $SQL_LIMITED_NORMAL;
    public $SQL_LIMITED_EXCELLENT;
    public $SQL_LIMITED_HIGH;
    // SET All VAR
    private $var_last_column;
    private $var_first_column;
    // SQL
    private $sql_pdo;
    // Result
    private $result_pdo;
    // objects
    private $object_pdo;
    private $pdo_db;
    private $obj_lang;
    // globals rows
    private $row_pdo;
    // Array
    public $lang;
    //

    public function __construct($table, $id, $list, $name, $value, $timer, $session, $cookie, $post, $message, $msg_response, $comment, $user_msg, $ip)
    {
        // Construct
        // nastavenie aktualnej tabulky na zaklade vytvorenia objektu.
        // set param for construct.
        $this->set_table = $table;
        $this->set_id = $id;
        $this->set_list = $list;
        $this->set_name = $name;
        $this->set_value = $value;
        $this->set_timer = $timer;
        $this->set_session = $session;
        $this->set_cookie = $cookie;
        $this->set_post = $post;
        $this->set_message = $message;
        $this->set_msg_response = $msg_response;
        $this->set_comment = $comment;
        $this->set_user_msg = $user_msg;
        $this->set_ip = $ip;
        $this->setTableAll($this->set_table);
        // objects
        $this->object_pdo = new Connect_mysqli();
        $this->pdo_db = $this->object_pdo->connect_real_pdo();
        // array
        $this->obj_lang = new exception_list_array();
        $this->lang = array_merge((array)$this->obj_lang->exception_list_all);
        $this->TRIM = " ";
        $this->setSelectSQL("SELECT");
        $this->setFromSQL("FROM");
        $this->setWhereSQL("WHERE");
        $this->setLikeSQL("LIKE");
        $this->setOrderBySQL("ORDER BY");
        $this->setAscSQL("ASC");
        $this->setDescSQL("DESC");
        $this->setLimitSQL("LIMIT");
        $this->SQL_NUM_LIMIT = 0;
        $this->SQL_ONE_LIMIT = 1;
        $this->SQL_MAX_LIMIT = 5000;
        $this->SQL_LIMITED_IN = 1;
        $this->SQL_LIMITED_EASY = 5;
        $this->SQL_LIMITED_NORMAL = 100;
        $this->SQL_LIMITED_HIGH = 1000;
        $this->SQL_LIMITED_EXCELLENT = 5000;
        // method - default setting
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function setTableAll($table)
    {
        // Methoda nastavy aktualnu tabulku v SQL manageru. Bude mozne pisat unikatne funkcie.
        $this->set_table = $table;
    }

    public function getTableAll()
    {
        // Vrati uz nastavenu hodnotu k pouzitiu v celom projekte.
        return $this->set_table;
    }

    public function setSelectSQL($select)
    {
        $this->SELECT = $select;
    }

    public function getSelectSQL()
    {
        return $this->SELECT;
    }

    public function getSelectTrimSQL()
    {
        return $this->TRIM . $this->SELECT . $this->TRIM;
    }

    public function setFromSQL($from)
    {
        $this->FROM = $from;
    }

    public function getFromSQL()
    {
        return $this->FROM;
    }

    public function getFromTrimSQL()
    {
        return $this->TRIM . $this->FROM . $this->TRIM;
    }

    public function setWhereSQL($where)
    {
        $this->WHERE = $where;
    }

    public function getWhereSQL()
    {
        return $this->WHERE;
    }

    public function getWhereTrimSQL()
    {
        return $this->TRIM . $this->WHERE . $this->TRIM;
    }

    public function setLikeSQL($like)
    {
        $this->LIKE = $like;
    }

    public function getLikeSQL()
    {
        return $this->LIKE;
    }

    public function getLikeTrim()
    {
        return $this->TRIM . $this->LIKE . $this->TRIM;
    }

    public function setOrderBySQL($order_by)
    {
        $this->ORDER_BY = $order_by;
    }

    public function getOrderBySQL()
    {
        return $this->ORDER_BY;
    }

    public function getOrderByTrimSQL()
    {
        return $this->TRIM . $this->ORDER_BY . $this->TRIM;
    }

    public function setAscSQL($asc)
    {
        $this->ASC_SQL = $asc;
    }

    public function getAscSQL()
    {
        return $this->ASC_SQL;
    }

    public function getAscTrimSQL()
    {
        return $this->TRIM . $this->ASC_SQL . $this->TRIM;
    }

    public function setDescSQL($desc)
    {
        $this->DESC_SQL = $desc;
    }

    public function getDescSQL()
    {
        return $this->DESC_SQL;
    }

    public function getDescTrimSQL()
    {
        return $this->TRIM . $this->DESC_SQL . $this->TRIM;
    }

    public function setLimitSQL($limit)
    {
        $this->LIMIT = $limit;
    }

    public function getLimitSQL()
    {
        return $this->LIMIT;
    }

    public function getLimitTrimSQL()
    {
        return $this->TRIM . $this->LIMIT . $this->TRIM;
    }


    // Unique functions
    public function setRowCountId($column_id)
    {
        $this->set_id = $column_id;
    }

    public function getRowCountId()
    {
        // Metoda spocita aktualny pocet riadkov d akejkolvek tabulke alebo stlpci. Je nutne nastavit stlpec.
        try
        {
            if(isset($this->set_id))
            {
                $this->sql_pdo = $this->getSelectTrimSQL() .
                    "$this->set_id" .
                    $this->getFromTrimSQL() .
                    $this->getTableAll() .
                    $this->getWhereTrimSQL() . "$this->set_id" .
                    $this->getOrderByTrimSQL() . "$this->set_id" . $this->getAscTrimSQL();

                $this->result_pdo = $this->pdo_db->prepare($this->sql_pdo);
                if(!$this->result_pdo)
                {
                    print $this->lang['EXCEPTION_ERROR_MESSAGE_1042'] . $this->result_pdo->errorInfo();
                }
                $this->result_pdo->execute();
                return $this->result_pdo->rowCount();
            }
            else
            {
                print $this->lang['EXCEPTION_ERROR_MESSAGE_1045'] . "<br />";
            }
        }
        catch(Exception $e)
        {
            print $e->getMessage() . $this->lang['EXCEPTION_ERROR_MESSAGE_1040'] . "<br />";
        }
        // Doprogramovat vynimku a osetrenie chyb.
        unset($this->sql_pdo);
        unset($this->result_pdo);
        unset($this->var_column_id);
    }

    public function setRowCountList($list_column)
    {
        $this->set_list = $list_column;
    }

    public function getRowCountList()
    {
        try
        {
            if(isset($this->set_list))
            {
                $this->sql_pdo = $this->getSelectTrimSQL() .
                                "$this->set_list" .
                                 $this->getFromTrimSQL() .
                                 $this->getTableAll() .
                                 $this->getWhereTrimSQL() . "$this->set_list" .
                                 $this->getOrderByTrimSQL() . "$this->set_list" . $this->getAscTrimSQL();
                $this->result_pdo = $this->pdo_db->prepare($this->sql_pdo);
                if(!$this->result_pdo)
                {
                    // connect SQL result error info.
                    print $this->lang['EXCEPTION_ERROR_MESSAGE_1035'] . $this->result_pdo->errorInfo();
                }
                $this->result_pdo->execute();
                return $this->result_pdo->rowCount();
            }
            else
            {
                print $this->lang['EXCEPTION_ERROR_MESSAGE_1037'] . "<br />";
            }
        }
        catch(Exception $e)
        {
            print $this->lang['EXCEPTION_ERROR_MESSAGE_1039'] . $this->result_pdo->errorInfo();
        }
        unset($this->sql_pdo);
        unset($this->result_pdo);
        unset($this->var_column_list);
    }

    public function setRowCountSession($id_column, $session_column)
    {
        $this->set_id = $id_column;
        $this->set_session = $session_column;
    }

    public function getRowCountSession()
    {
        try
        {
            if(isset($this->set_session))
            {
                $this->sql_pdo = $this->getSelectTrimSQL() .
                                "$this->set_id, $this->set_session" .
                                 $this->getFromTrimSQL() .
                                 $this->getTableAll() .
                                 $this->getWhereTrimSQL() . "$this->set_id" .
                                 $this->getOrderByTrimSQL() . "$this->set_id" . $this->getAscTrimSQL();
                $this->result_pdo = $this->pdo_db->prepare($this->sql_pdo);
                if(!$this->result_pdo)
                {
                    // connect error result
                    print $this->lang['EXCEPTION_ERROR_MESSAGE_1050'] . $this->result_pdo->errorInfo();
                }
                $this->result_pdo->execute();
                return (int)$this->result_pdo->rowCount();
            }
            else
            {
                // Empty sql result
                print $this->lang['EXCEPTION_ERROR_MESSAGE_1053'] . "<br />";
            }
        }
        catch(Exception $e)
        {
            // Neocakavana chyba pri behu funkcie
            print $this->lang['EXCEPTION_ERROR_MESSAGE_1055'] . $this->result_pdo->errorInfo();
        }
        unset($this->sql_pdo);
        unset($this->result_pdo);
        unset($this->var_column_session);
    }

    public function setRowLastValue($column)
    {
        $this->var_last_column = $column;
    }

    public function getRowLastValue()
    {
        // Methoda precita poslednu hodnotu z database, aktualneho stlpca, ktory je nastaveneni k citaniu.
        try
        {
            if(isset($this->var_last_column))
            {
                $this->sql_pdo = $this->getSelectTrimSQL() .
                                "$this->var_last_column" .
                                 $this->getFromTrimSQL() .
                                 $this->getTableAll() .
                                 $this->getOrderByTrimSQL() . "$this->var_last_column" . $this->getDescTrimSQL();
                // Result object
                $this->result_pdo = $this->pdo_db->prepare($this->sql_pdo);
                if(!$this->result_pdo)
                {
                    // connetc error result
                    print $this->lang['EXCEPTION_ERROR_MESSAGE_1060'] . " Error Column->" . $this->var_last_column . " " . $this->result_pdo->errorCode();
                }
                $this->result_pdo->execute();
                $this->row_pdo = $this->result_pdo->fetch();
                $this->result_pdo->closeCursor();
                return $this->row_pdo[$this->var_last_column];
            }
            else
            {
                print $this->lang['EXCEPTION_ERROR_MESSAGE_1063'] . "<br />";
            }
        }
        catch(Exception $e)
        {
            // Neocakavana chyba pri behu funkcie
            print $this->lang['EXCEPTION_ERROR_MESSAGE_1065'] . $this->result_pdo->errorCode();
        }
        unset($this->row_pdo);
        unset($this->sql_pdo);
        unset($this->result_pdo);

    }

    public function setRowFirstValue($column)
    {
        $this->var_first_column = $column;
    }

    public function getRowFirstValue()
    {
        // Metoda ktora precita prvu hodnotu z daneho nastaveneho stlpca, pripadne potreby k citaniu behu aplikacie.
        try
        {
            // Overenie podmienky, ak vznikne keznama chyba, alebo kriticka chyba.
            if(isset($this->var_first_column))
            {
                $this->sql_pdo = $this->getSelectTrimSQL() .
                                "$this->var_first_column" .
                                 $this->getFromTrimSQL() .
                                 $this->getTableAll() .
                                 $this->getOrderByTrimSQL() . "$this->var_first_column" . $this->getAscTrimSQL();
                // result obj
                $this->result_pdo = $this->pdo_db->prepare($this->sql_pdo);
                if(!$this->result_pdo)
                {
                    // connect error pdo->result
                    print $this->lang['EXCEPTION_ERROR_MESSAGE_1070'] . " Error: Column->" . $this->var_first_column . " " . $this->result_pdo->errorCode();
                }
                $this->result_pdo->execute();
                $this->row_pdo = $this->result_pdo->fetch();
                $this->result_pdo->closeCursor();
                return $this->row_pdo[$this->var_first_column];
            }
            else
            {
                // Empty insert column
                print $this->lang['EXCEPTION_ERROR_MESSAGE_1073'] . "<br />";
            }

        }
        catch(Exception $e)
        {
            // Doslo k fatalnej chybe, alebo neznamej chybe.
            print $this->lang['EXCEPTION_ERROR_MESSAGE_1075'] . " " . $this->result_pdo->errorCode();
        }
        unset($this->sql_pdo);
        unset($this->result_pdo);
        unset($this->row_pdo);
    }



}
























