<?
class Mysql_Connection{
    const localhost = 'localhost';
    const user = 'root';
    const password = '';
    const database = 'pv_albaraka';
}
class tables {
    const analiz = 'log_analiz';
    const worker_analiz = 'worker_analiz';
    const costumer_analiz = 'sss';
    const logs = 'log_sum';
    const log1 = 'log1';
    const log2 = 'log2';
    public static $tables = array(
        tables::analiz, tables::worker_analiz, tables::costumer_analiz,
        tables::logs
    );
}



/** Albaraka Efsane Kadro Analiz query */
?>
