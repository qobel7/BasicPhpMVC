<?
include_once(dirname(__FILE__).'/includer.php');
include_once(dirname(__FILE__).'/view.php');
include_once(dirname(__FILE__).'/loader.php');
include_once(dirname(__FILE__).'/model.php');

class CK_Controller {
    function __construct() {
       // echo $controller.'-'.$method;

        $this->view= new Views();
        $this->load = new Load();
    }
    public $controller ;
    public $method ;
    public $load ;
    public $model;
    public $view;
    public function routeController($controller,$method){
        $this->controller = $controller;
        $this->method = $method;
        $method =  $this->method;
        $route_ = new $this->controller();
        $route_->$method();

    }

}
$includer = new Incliuder();
$includer->inclideAllFiles('controller/');
$includer->inclideAllFiles('configuration/');

?>
