<?php
class notFoundController extends controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();

        $template = new Template();
        $dados['info'] = $template->getInfo();
        
        $dados['page'] = "notfoud";
        
        $this->loadTemplate('404', $dados);
    }

}