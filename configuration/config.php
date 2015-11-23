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

class query {
    const sum_query = "INSERT INTO  `log_sum` (  `insert_date` ,  `ip` ,  `user_agent` ,  `action_name` ,  `opaque_id` ,  `url` ,  `parameters` )
            SELECT  `insert_date` ,  `ip` ,  `user_agent` ,  `action_name` ,  `opaque_id` ,  `url` ,  `parameters`
            FROM  `log1` ;

    INSERT INTO  `log_sum` (  `insert_date` ,  `ip` ,  `user_agent` ,  `action_name` ,  `opaque_id` ,  `url` ,  `parameters` )
         SELECT  `insert_date` ,  `ip` ,  `user_agent` ,  `action_name` ,  `opaque_id` ,  `url` ,  `parameters`
         FROM  `log2` ;
    ";
    const analiz_query = "INSERT INTO `log_analiz`
	  (`opaque_id`,`ap_name`,`name_text`,`name_`,`izleme_sayisi`,`yes_click`,`no_click`,`siralama`)
             SELECT
             p.opaque_id ,v_d.tariff_code,v_d.seq1_text, v_d.NAME,
             sum(CASE WHEN `action_name` IN ('wistia_video' , 'dynamic_video') THEN 1 ELSE 0 END ) AS 'izlenme_sayisi',
             sum(CASE WHEN `action_name` IN ('cta_click_yes') THEN 1 ELSE 0 END ) AS 'yes',
             sum(CASE WHEN `action_name` IN ('cta_click_no') THEN 1 ELSE 0 END ) AS 'no',
             GROUP_CONCAT(
                            CASE `action_name`
                                WHEN 'cta_click_yes' THEN 'yes'
                                WHEN 'cta_click_no' THEN 'no'
                            END) AS 'sirasi'

              FROM `log_sum` AS p INNER JOIN `video_data_2` AS v_d ON  v_d.opaque_id = p.opaque_id GROUP BY p.opaque_id ORDER BY MIN(p.insert_date);";

    const delete_query = '';
    const worker_analiz = 'INSERT INTO `worker_analiz` (`opaque_id`,`ap_name`,`name_text`,`name_`,`izleme_sayisi`,`yes_click`,`no_click`,`siralama`)
 ( SELECT l_a.`opaque_id`,l_a.`ap_name`,l_a.`name_text`,l_a.`name_`,l_a.`izleme_sayisi`,l_a.`yes_click`,l_a.`no_click`,l_a.`siralama` FROM `log_analiz` AS l_a INNER JOIN worker AS w ON w.`worker_id`=l_a.`ap_name` );
 ';
    const costumer_analiz = 'INSERT INTO `sss` (`opaque_id`,`ap_name`,`name_text`,`name_`,`izleme_sayisi`,`yes_click`,`no_click`,`siralama`)
 ( SELECT l_a.`opaque_id`,l_a.`ap_name`,l_a.`name_text`,l_a.`name_`,l_a.`izleme_sayisi`,l_a.`yes_click`,l_a.`no_click`,l_a.`siralama` FROM `log_analiz` AS l_a WHERE l_a.`ap_name` NOT IN (SELECT `worker_id` FROM `worker`)  );';
    const costumer_select_query = '( SELECT l_a.`opaque_id`,l_a.`ap_name`,l_a.`name_text`,l_a.`name_`,l_a.`izleme_sayisi`,l_a.`yes_click`,l_a.`no_click`,l_a.`siralama` FROM `log_analiz` AS l_a WHERE l_a.`ap_name` NOT IN (SELECT `worker_id` FROM `worker`)  );';
    const worker_select_query = '( SELECT l_a.`opaque_id`,l_a.`ap_name`,l_a.`name_text`,l_a.`name_`,l_a.`izleme_sayisi`,l_a.`yes_click`,l_a.`no_click`,l_a.`siralama` FROM `log_analiz` AS l_a INNER JOIN worker AS w ON w.`worker_id`=l_a.`ap_name` );';
    public static function stateControl($data) {
        if ($data === true) {
            return true;
        }
        else {
            return false;
        }
    }
    const select_analiz_query  = "SELECT
             p.opaque_id ,v_d.tariff_code,v_d.seq1_text, v_d.NAME,
             sum(CASE WHEN `action_name` IN ('wistia_video' , 'dynamic_video') THEN 1 ELSE 0 END ) AS 'izlenme_sayisi',
             sum(CASE WHEN `action_name` IN ('cta_click_yes') THEN 1 ELSE 0 END ) AS 'yes',
             sum(CASE WHEN `action_name` IN ('cta_click_no') THEN 1 ELSE 0 END ) AS 'no',
             GROUP_CONCAT(
                            CASE `action_name`
                                WHEN 'cta_click_yes' THEN 'yes'
                                WHEN 'cta_click_no' THEN 'no'
                            END) AS 'sirasi'

              FROM `log_sum` AS p INNER JOIN `video_data_2` AS v_d ON  v_d.opaque_id = p.opaque_id GROUP BY p.opaque_id ORDER BY MIN(p.insert_date);";



/** Arçelik analiz query's*/

    const arcelik_analiz_query = "INSERT INTO `log_analiz`
	  (`opaque_id`,`ap_name`,`name_text`,`name_`,`izleme_sayisi`,`yes_click`,`no_click`,`siralama`)
             SELECT
             p.opaque_id ,v_d.tariff_code,v_d.seq1_text, v_d.NAME,
             sum(CASE WHEN `action_name` IN ('wistia_video' , 'dynamic_video') THEN 1 ELSE 0 END ) AS 'izlenme_sayisi',
             sum(CASE WHEN `action_name` IN ('cta_click') THEN 1 ELSE 0 END ) AS 'click',
             0,'null'
                           FROM `log_sum` AS p INNER JOIN `video_data_2` AS v_d ON  v_d.opaque_id = p.opaque_id GROUP BY p.opaque_id ORDER BY MIN(p.insert_date);";

    const arcelik_select_analiz_query = "SELECT
             p.opaque_id ,v_d.tariff_code,v_d.seq1_text, v_d.NAME,
             sum(CASE WHEN `action_name` IN ('wistia_video' , 'dynamic_video') THEN 1 ELSE 0 END ) AS 'izlenme_sayisi',
             sum(CASE WHEN `action_name` IN ('cta_click') THEN 1 ELSE 0 END ) AS 'click',
              FROM `log_sum` AS p INNER JOIN `video_data_2` AS v_d ON  v_d.opaque_id = p.opaque_id GROUP BY p.opaque_id ORDER BY MIN(p.insert_date);";
}


/** Albaraka Efsane Kadro Analiz query */
?>
