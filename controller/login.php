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
require_once \Config\Caminho::getClasses()."autenticacao.php";
require_once \Config\Caminho::getComum()."classes/perfilusuario.php";
require_once \Config\Caminho::getComum()."classes/simnao.php";

class Login{
	public static function index(array $dados){
		require_once \Config\Caminho::getView()."login/login.php";
	}
	public static function entrar(array $dados){
		try{
			$oAutenticacao = new \Classes\Autenticacao();
			$oAutenticacao->autenticar($dados['email'], $dados['senha']);	
		}catch(\Exception $e){
			echo $e->getMessage();
		}
		require_once \Config\Caminho::getView()."login/login.php";
	}
}
\Sistema\Roteador::mapearRequisicao("Login", $_REQUEST);