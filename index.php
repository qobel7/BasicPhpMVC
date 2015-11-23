<?php
include_once('router.php');
$loader = new Loader();
$loader->route = $route;


class Loader {
    function __construct() {
        //print_r($this->config);
    }

    public $route;

    function autoLoader() {
        $request = $this->routeGet();
        $controller_name = explode('/', $request)[0];
        $function_name = explode('/', $request)[1];
        include_once(dirname(__FILE__).'/vendor/controller.php');
        $controller = new CK_Controller();
        $controller->routeController($controller_name,$function_name);

    }

    function routeGet() {
        // print_r($this->config['/']);
        $_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $request = $this->createUrlParams();
        //print_r($this->parseRoute($request));
        return $this->parseRoute($request);

    }

    function parseRoute($search_key) {
        if (array_key_exists($search_key, $this->route)):
            return $this->route[$search_key];
        else:
            echo $search_key;
            return $search_key;
        endif;

    }
    function createUrlParams(){
        $request='';
        $reuqest_params = explode('/', $_SERVER['REQUEST_URI_PATH']);
        for($i=1;$i<count($reuqest_params);$i++){
            if($reuqest_params[$i]!='index.php')
                if($i == count($reuqest_params)-1)
                    $request .= $reuqest_params[$i];
                else
                    $request .= $reuqest_params[$i].'/';
        }
        return $request;
    }
}

$loader->autoLoader();



