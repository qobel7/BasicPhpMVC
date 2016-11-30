<?php
/**
 * Created by PhpStorm.
 * User: caner
 * Date: 30.11.2016
 * Time: 22:26
 */

class ElegantExampleModel extends Elegant\Model {
    protected $table = "User";

    public function example(){
        $data = ElegantExampleModel::get(array("column1","column2","column3"));
        /** or */
        $data = ElegantExampleModel::all();
        return $data;
    }
    public function exampleUpdate(){
        ElegantExampleModel::where("id","1")->update(array("name"=>"kom","surname"=>"jom"));
    }
    public function exampleInsert(){
        ElegantExampleModel::create(array("name"=>"kom","surname"=>"jom"));
    }
    //   https://github.com/qobel7/BasicPhpMVC/blob/master/vendor/elegant-orm-master/README.md    for more example
} 