<?php

/**
 * Created by IntelliJ IDEA.
 * User: salih
 * Date: 23/07/15
 * Time: 14:52
 */
class Load {
    function __construct() {
    }
    public function model(){
        include_once(dirname(__DIR__).'/model/model.php');
    }
    public function library($library_name){
        include_once('library/'.$library_name);
    }
    public function view($view_name){
        include_once('view/'.$view_name);
    }
    public function anonimClass($path,$class_name){
        include_once(dirname(__DIR__).'/'.$path.'/'.$class_name);
    }
}
