<?

class Home extends CK_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('model.php');
        $this->model = new Model();
    }
    public $model;
    public function home(){
        $this->view->loadView('view',array());
    }
    public function deneme(){
        $this->load->model('model.php');
        $m = new Model();
        $data = $m->getAnaliz(tables::analiz);
        $costumer_data = $m->getAnaliz(tables::costumer_analiz);
        $worker_data =$m->getAnaliz(tables::worker_analiz);
        $this->view->loadView('home_page',array('data'=>$data,'worker'=>$worker_data,'costumer'=>$costumer_data));

    }
    public function createAnalizData() {
        if ($this->truncateAllTable()):
                $this->allQuery();


        endif;
    }
    public function analizQuery(){
        echo 'truncate okey';
        if ($this->model->multi_query(query::analiz_query)) {
            sleep(5);
            $this->workerAnaliz();
        }
    }
    public function  allQuery(){
            // TODO Start Analiz
        $this->model->multi_query(query::sum_query.query::analiz_query.query::costumer_analiz.query::worker_analiz);
        sleep(5);
        header('location:http://albaraka.analiz/analiz_list');
    }
    public function costumerAnaliz(){
            header('location:http://albaraka.analiz/analiz_list');

    }
    private function workerAnaliz(){
        echo 'analiz okey';
        if($this->model->multi_query(query::worker_analiz)){
            $this->costumerAnaliz();
        }
    }

    private function create($truncate_table_name, $insert_table_name) {

        if ($this->model->truncateTable($truncate_table_name)) {
            $state = $this->model->multi_query($insert_table_name);
        }
        return $state;
    }

    public function truncateAllTable() {
        foreach (tables::$tables as $table):
            $this->model->truncateTable($table);
        endforeach;
        return true;
    }
}

?>
