<?php
/*
*  @Autor:        Michal Fujak
*  @version       1.8.000
*  @copyright     Michal Fujak - Programator
*  @framework     Fruit Shop WebSite BETA 3
*  @license       http://www.dev-droid.sk
*  @Copyring      08.11.2018 22:00
*  @File          language/sk/exception.php
*  @Update        edit:    [--.--.----][--:--]  version[1.8.000]
*/


class exception_list_array
{
    // array
    public $exception_list_all;
    public $exception_monitor_agent_classed_tables;
    public $log_information_monitor_agent_class;
    //
    public function __construct()
    {
        $this->exception_list_all = array(
            'EXCEPTION_ERROR_CODE_1010'                 => '1010',
            'EXCEPTION_ERROR_MESSAGE_1010'              => 'Sample message 1010',
            'EXCEPTION_ERROR_LINK_1010'                 => '///1010///',
            'EXCEPTION_ERROR_CODE_1020'                 => '1020',
            'EXCEPTION_ERROR_MESSAGE_1020'              => 'Sample message 1020',
            'EXCEPTION_ERROR_LINK_1020'                 => '///1020///',
            'EXCEPTION_ERROR_CODE_1030'                 => '1030',
            'EXCEPTION_ERROR_MESSAGE_1030'              => 'Sample message 1030',
            'EXCEPTION_ERROR_LINK_1030'                 => '///1030///',
            'EXCEPTION_ERROR_CODE_1035'                 => '1035',
            'EXCEPTION_ERROR_MESSAGE_1035'              => 'Vynimka [ 1035 ] chyba pri citani z Tabulky: [column]->list',
            'EXCEPTION_ERROR_LINK_1035'                 => '///1035///',
            'EXCEPTION_ERROR_CODE_1037'                 => '1037',
            'EXCEPTION_ERROR_MESSAGE_1037'              => 'Column->List: empty [ Stlpec je prazdny, nie je nadefinovany, prosim nastavit cez SQL_MANAGER->setRowCountList(Here code!) ]',
            'EXCEPTION_ERROR_LINK_1037'                 => '///1037///',
            'EXCEPTION_ERROR_CODE_1039'                 => '1039',
            'EXCEPTION_ERROR_MESSAGE_1039'              => 'Vynimka [ 1039 ] Neocakavana chyba v funkcii getRowCountList.',
            'EXCEPTION_ERROR_LINK_1039'                 => '///1039///',
            'EXCEPTION_ERROR_CODE_1040'                 => '1040',
            'EXCEPTION_ERROR_MESSAGE_1040'              => 'Chyba [ 1040 ]:  SQL_Manager->getRowCountId - skontroluj nastavenie setRowCountId...',
            'EXCEPTION_ERROR_LINK_1040'                 => '///1040///',
            'EXCEPTION_ERROR_CODE_1042'                 => '1042',
            'EXCEPTION_ERROR_MESSAGE_1042'              => ' Chyba [ 1042 ] : Chyba v SQL skripte. Active -> Lod.d(Message.getInfoMessage.start) [column]->id',
            'EXCEPTION_ERROR_LINK_1042'                 => '///1042///',
            'EXCEPTION_ERROR_CODE_1045'                 => '1045',
            'EXCEPTION_ERROR_MESSAGE_1045'              => 'Column->ID: empty [ Stlpec je prazdny, nie je nadefinovany, prosim nastavit cez SQL_MANAGER->setRowCountId(Here code!) ]',
            'EXCEPTION_ERROR_LINK_1045'                 => '///1045///',
            'EXCEPTION_ERROR_CODE_1050'                 => '1050',
            'EXCEPTION_ERROR_MESSAGE_1050'              => 'Vynimka [ 1050 ] chyba pri citani z Tabulky: [column]->session',
            'EXCEPTION_ERROR_LINK_1050'                 => '///1050///',
            'EXCEPTION_ERROR_CODE_1053'                 => '1053',
            'EXCEPTION_ERROR_MESSAGE_1053'              => 'Column->Session: empty [ Stlpec je prazdny, nie je nadefinovany, prosim nastavit cez SQL_MANAGER->setRowCountSession(Here code!) ]',
            'EXCEPTION_ERROR_LINK_1053'                 => '///1053///',
            'EXCEPTION_ERROR_CODE_1055'                 => '1055',
            'EXCEPTION_ERROR_MESSAGE_1055'              => 'Vynimka [ 1055 ] Neocakavana chyba v funkcii getRowCountSession.',
            'EXCEPTION_ERROR_LINK_1055'                 => '///1055///',
            'EXCEPTION_ERROR_CODE_1060'                 => '1060',
            'EXCEPTION_ERROR_MESSAGE_1060'              => 'Vynimka [ 1060 ] chyba pri citani z Tabulky: [column]->global, vycitanie poslednej hodnoty z daneho stlpca',
            'EXCEPTION_ERROR_LINK_1060'                 => '///1060///',
            'EXCEPTION_ERROR_CODE_1063'                 => '1063',
            'EXCEPTION_ERROR_MESSAGE_1063'              => 'Column->Global: empty [ Stlpec je prazdny, nie je nadefinovany, prosim nastavit cez SQL_MANAGER->setRowLastValue(Here code!) ]',
            'EXCEPTION_ERROR_LINK_1063'                 => '///1063///',
            'EXCEPTION_ERROR_CODE_1065'                 => '1065',
            'EXCEPTION_ERROR_MESSAGE_1065'              => 'Vynimka [ 1065 ] Neocakavana chyba v funkcii getRowLastValue.',
            'EXCEPTION_ERROR_LINK_1065'                 => '///1065///',
            'EXCEPTION_ERROR_CODE_1070'                 => '1070',
            'EXCEPTION_ERROR_MESSAGE_1070'              => 'Vynimka [ 1070 ] chyba pri citani z Tabulky: [column]->global, vycitanie prvej hodnoty z daneho stlpca',
            'EXCEPTION_ERROR_LINK_1070'                 => '///1070///',
            'EXCEPTION_ERROR_CODE_1073'                 => '1073',
            'EXCEPTION_ERROR_MESSAGE_1073'              => 'Column->Global: empty [ Stlpec je prazdny, nie je nadefinovany, prosim nastavit cez SQL_MANAGER->setRowFirstValue(Here code!) ]',
            'EXCEPTION_ERROR_LINK_1073'                 => '///1073///',
            'EXCEPTION_ERROR_CODE_1075'                 => '1075',
            'EXCEPTION_ERROR_MESSAGE_1075'              => 'Vynimka [ 1075 ] Neocakavana chyba v funkcii getRowFirstValue.',
            'EXCEPTION_ERROR_LINK_1075'                 => '///1075///',
        );
        // Class for tables [ Monitor_agent ]
        $this->exception_monitor_agent_classed_tables = array(
            'MONITOR_EXCEPTION_WITH_LIST_CODE_10010'          => '10010',
            'MONITOR_EXCEPTION_WITH_LIST_MESSAGE_10010'       => 'Nastala neocakavana chyba, hodnoty z danneho stlpca su prazdne, neexistuju. ',
            'MONITOR_EXCEPTION_WITH_LIST_LINK_10010'          => '///10010///',
            'MONITOR_EXCEPTION_WITH_LIST_CODE_10012'          => '10012',
            'MONITOR_EXCEPTION_WITH_LIST_MESSAGE_10012'       => 'Neznama chyba, pocet riadkov je 0. Kriticka chyba.  [ error-critical ]',
            'MONITOR_EXCEPTION_WITH_LIST_LINK_10012'          => '///10012///',
            'MONITOR_EXCEPTION_WITH_LIST_CODE_10013'          => '10013',
            'MONITOR_EXCEPTION_WITH_LIST_MESSAGE_10013'       => 'Pripojenie k databaze cez vysledok bolo neuspesne.',
            'MONITOR_EXCEPTION_WITH_LIST_LINK_10013'          => '///10013///',
            'MONITOR_EXCEPTION_WITH_LIST_CODE_10014'          => '10014',
            'MONITOR_EXCEPTION_WITH_LIST_MESSAGE_10014'       => 'Neznama chyba, pocet riadkov je 0. Kriticka chyba.  [ error-critical ] zaznami neexistuju',
            'MONITOR_EXCEPTION_WITH_LIST_LINK_10014'          => '///10014///',
            'MONITOR_EXCEPTION_WITH_LIST_CODE_10016'          => '10016',
            'MONITOR_EXCEPTION_WITH_LIST_MESSAGE_10016'       => 'Pripojenie k databaze cez vysledok bolo neuspesne. Chyba vo funkcii Monitor_agent::with_content_feed_list_auto(parameter)',
            'MONITOR_EXCEPTION_WITH_LIST_LINK_10016'          => '///10016///',
            'MONITOR_EXCEPTION_WITH_LIST_CODE_10018'          => '10018',
            'MONITOR_EXCEPTION_WITH_LIST_MESSAGE_10018'       => 'Neocakavana chyba, doslok chybe k praci naplnenia metody with_content_feed_list_auto($parameter). Error: [ 10018 ]',
            'MONITOR_EXCEPTION_WITH_LIST_LINK_10018'          => '///10018///',
            'MONITOR_EXCEPTION_CONTENT_SEEK_CODE_10020'       => '10020',
            'MONITOR_EXCEPTION_CONTENT_SEEK_MESSAGE_10020'    => 'Neocakavana chyba, pri kontrole zaznamov nastala chyba overenia hodnot. Error: [ 10020 ]',
            'MONITOR_EXCEPTION_CONTENT_SEEK_LINK_10020'       => '///10020///',
        );
        // Class a tables monitor agent Information
        $this->log_information_monitor_agent_class = array(
            'MONITOR_INFORMATION_WITH_LIST_CODE_1010'   => '1010',
            'MONITOR_INFORMATION_WITH_LIST_MESSAGE_1010'=> 'Pri vyhladavani zaznamu LIST, neexistuje totozny zaznam. Hodnoty budu vytvorene automaticky',
            'MONITOR_INFORMATION_WITH_LIST_LINK_1010'   => '///1010///',
        );
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
}