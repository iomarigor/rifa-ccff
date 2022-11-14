<?php
class Main extends Controller{
    function __construct(){
        parent::__construct();
    }
    function render(){
        $this->view->mensaje = "Hay un error al cargar el recurso";
        $this->view->render('main/index');
    }
}
?>
