<?
class Model extends CK_Model{

    function __construct() {
        parent::__construct();
    }
    public function query($query) {
        return $data = $this->db->query($query);
    }

    public function multi_query($query) {
        echo $this->db->multi_query($query);
    }

    public function getAnaliz($table) {
        return $this->db->query('select * from '.$table);
    }

    public function delete($table, $where = null) {
        if ($this->db->query('delete from ' . $table) === true) {
            $this->db->close();
            return true;
        }
        else {
            return false;
        }
    }

    public function truncateTable($table_name) {
        return $this->db->query('truncate table ' . $table_name);
    }
}
?>
