<?

class Controller extends CK_Controller{
    function __construct() {
    }
    public function deneme(){
    }
    public function createAnalizData() {

    }

    private function create($truncate_table_name, $insert_table_name) {

        if ($this->model->truncateTable($truncate_table_name)) {
            $state = $this->model->multi_query($insert_table_name);
        }
        return $state;
    }

    private function truncateAllTable() {

        foreach (tables::$tables as $table):
           // $this->model->truncateTable($table);
        endforeach;
        return true;
    }
}

?>
