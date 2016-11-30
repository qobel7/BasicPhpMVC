<?php
/**
 * Created by PhpStorm.
 * User: caner
 * Date: 30.11.2016
 * Time: 21:59
 */
//Example Model
class ExampleModel  extends CK_Model{

    public function exampleQuery(){
         return  $this->db->query("select * from "+tables::analiz)->fetch_all();
    }
    public function exampleMultiQuery(){
        return  $this->db->multi_query("select * from "+tables::analiz)->fetch_all();
    }

} 