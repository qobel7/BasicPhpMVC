<?php


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
