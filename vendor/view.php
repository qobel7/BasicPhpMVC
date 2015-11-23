<?
class Views {
    function loadView($strViewPath, $arrayOfData) {

        extract($arrayOfData);


        ob_start();
        require('view/'.$strViewPath.'.php');


        $strView = ob_get_contents();
        ob_end_clean();
        echo $strView;
    }

}

?>
