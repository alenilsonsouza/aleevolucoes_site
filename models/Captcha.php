<?php
class Captcha extends model{

    
    

    public function init(){

        $_SESSION['captcha1'] = rand(0,20);
        $_SESSION['captcha2'] = rand(0,25);
    }

    public function verificar($soma){
        
        $somacaptcha = $_SESSION['captcha1'] + $_SESSION['captcha2'];
        $somauser = $soma;

        if($somacaptcha == $somauser){
            return true;
        }else{
            return false;
        }
    }

    public function getCaptcha(){

        $array = array(
            'n1' => $_SESSION['captcha1'],
            'n2' => $_SESSION['captcha2']
        );
        return $array;
    }

}