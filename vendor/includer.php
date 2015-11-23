<?php

/**
 * Created by IntelliJ IDEA.
 * User: salih
 * Date: 23/07/15
 * Time: 11:52
 */
class Incliuder {
    function __construct() {

    }

    function inclideAllFiles($path) {
        $files = scandir($path);
        foreach ($files as $file):
            if ($file != '.' && $file != '..'):
               // echo $file;
                include_once($path.$file);
            endif;
        endforeach;
    }
}
