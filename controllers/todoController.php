<?php
class todoController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {}

    public function add() {
        
        //header("Access-Control-Allow-Origin *");
        
        $m = $_SERVER['REQUEST_METHOD'];

        if($m == 'POST'){
           
            $data = file_get_contents('php://input');
            $data = json_decode($data);
            
            if(!empty($data->nome) && !empty($data->email)){
                $email = new EmailSend();
                $email->setNome($data->nome);
                $email->setEmail($data->email);
                $email->setAssunto($data->assunto);
                $email->setMensagem($data->mensagem);
                $email->setEmailSend($data->emailTo);
                $email->enviarContato();
                header("Content-Type:application/json");
                $array = array('resposta'=> 1);
                echo json_encode($array);

            }else{
                header("Content-Type:application/json");
                $array = array('resposta'=> 0);
                echo json_encode($array);
            }
            

            
        }
 
    }

    public function uploads() {
        
        header("Access-Control-Allow-Origin: *");
                
        $m = $_SERVER['REQUEST_METHOD'];
        //Verifica se o método é post
        if($m == 'POST'){                       
            //Pega as informações dos arquivos recebidos
            if(isset($_FILES['file']['name'][0])){
                
                //Tratamento para cada arquivo recebido
                foreach($_FILES['file']['name'] as $key => $item){
                    
                }
                
            }
                        
        }
 
    }

}