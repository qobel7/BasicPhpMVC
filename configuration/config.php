<?
// Example connection properties
class Mysql_Connection{
    const localhost = '';
    const user = '';
    const password = '';
    const database = '';
}
// Example table names.
class tables {
    const analiz = '';
    const worker_analiz = '';
    const costumer_analiz = '';
    const logs = '';
    const log1 = '';
    const log2 = '';
    public static $tables = array(
        tables::analiz, tables::worker_analiz, tables::costumer_analiz,
        tables::logs
    );
}

?>
