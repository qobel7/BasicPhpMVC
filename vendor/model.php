<?
include_once(dirname(__FILE__).'/includer.php');
include_once(dirname(__FILE__).'/loader.php');
include_once('configuration/config.php');
include_once(dirname(__FILE__).'/includer.php/elegant-orm-master/elegant.php');
class CK_Model {

    function __construct() {
        $conn = mysqli_connect(Mysql_Connection::localhost, Mysql_Connection::user, Mysql_Connection::password, Mysql_Connection::database);
        if (mysqli_connect_error()) {
            echo mysqli_connect_error();
        }
        $conn->set_charset("utf8");
        $this->db = $conn;
    }
    public $db;

}
$includer = new Incliuder();
$includer->inclideAllFiles('model/');

?>
