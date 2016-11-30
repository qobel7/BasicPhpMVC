<?
// Example controller.
class Controller extends CK_Controller{
    function __construct() {
    }
    private function create() {
        $this->load->model("ExampleModel.php");
        $model = new ExampleModel();
        $this->view->loadView("home.php",$model->exampleQuery());
    }
}

?>
