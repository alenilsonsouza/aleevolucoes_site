<?php
class Template extends model{

	public function getDados(){
		$array = array();

		$array['aviso_orcamento'] = "O seu pedido foi enviado!<br> Entraremos em contato em breve.";

		$redes = new RedeSociais();
		$array['redes'] = $redes->getArray();

		return $array;
	}

	public function getInfo(){

		$redes = new RedeSociais();
		$array['redes'] = $redes->getArray();
		
		return $array;
	}
}