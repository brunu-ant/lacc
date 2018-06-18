<?php
namespace Controller;

require_once "/var/www/html/lacc/lib/config/caminho.php";
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once \Config\Caminho::getLib()."meekrodb.php";
require_once \Config\Caminho::getLib()."sistema/roteador.php";
require_once \Config\Caminho::getLib()."Enum.php";
require_once \Config\Caminho::getClasses()."conta.php";
require_once \Config\Caminho::getClasses()."usuario.php";
require_once \Config\Caminho::getComum()."classes/perfilusuario.php";
require_once \Config\Caminho::getComum()."classes/simnao.php";

class Conta{
	public static function nova($dados){
		require_once \Config\Caminho::getView()."conta/nova.php";
	}
	public static function criarConta($dados){
		try{
			$conta = new \Classes\Conta();
			$conta->setNome($dados['nome']);
			$conta->criar();

		}catch(Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
		
	}
}
\Sistema\Roteador::mapearRequisicao("Conta", $_REQUEST);