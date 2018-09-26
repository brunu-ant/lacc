<?php
namespace Controller;
require_once "/var/www/html/lacc/lib/config/caminho.php";
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once \Config\Caminho::getLib()."meekrodb.php";
require_once \Config\Caminho::getLib()."Enum.php";
require_once \Config\Caminho::getLib()."sistema/roteador.php";
require_once \Config\Caminho::getLib()."sistema/autenticacao.php";
require_once \Config\Caminho::getLib()."sistema/autorizacao.php";
require_once \Config\Caminho::getLib()."sistema/sessao.php";
require_once \Config\Caminho::getClasses()."conta.php";
require_once \Config\Caminho::getClasses()."usuario.php";
require_once \Config\Caminho::getClasses()."ano.php";
require_once \Config\Caminho::getComum()."classes/perfilusuario.php";
require_once \Config\Caminho::getComum()."classes/simnao.php";

class Login{
	public static function index(array $aDados){
		try{
			(\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
			require_once \Config\Caminho::getView()."home/index.php";
		}catch(\Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
	}
}
\Sistema\Roteador::mapearRequisicao("Login", $_REQUEST);