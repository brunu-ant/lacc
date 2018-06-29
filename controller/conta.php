<?php
namespace Controller;

require_once "/var/www/html/lacc/lib/config/caminho.php";
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once \Config\Caminho::getLib()."meekrodb.php";
require_once \Config\Caminho::getLib()."sistema/roteador.php";
require_once \Config\Caminho::getLib()."sistema/sessao.php";
require_once \Config\Caminho::getLib()."Enum.php";
require_once \Config\Caminho::getClasses()."conta.php";
require_once \Config\Caminho::getClasses()."usuario.php";
require_once \Config\Caminho::getComum()."classes/perfilusuario.php";
require_once \Config\Caminho::getComum()."classes/simnao.php";

class Conta{
	public static function nova(array $aDados){
		require_once \Config\Caminho::getView()."conta/nova.php";
	}
	public static function criarConta(array $aDados){
		try{
			\DB::startTransaction();
			$oConta = new \Classes\Conta();
			$oConta->setNome($aDados['nomeEscola']);
			$oConta->criar();
			$oUsuario = new \Classes\Usuario();
			$oUsuario->setConta($oConta);
			$oUsuario->setNome($aDados['nome']);
			$oUsuario->setEmail($aDados['email']);
			$oUsuario->setSenha($aDados['senha'], true);
			$oUsuario->setPerfil((new \Comum\Classes\PerfilUsuarioEnum())->Coordenador());
			$oUsuario->criar();
			\DB::commit();
		}catch(\Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
			\DB::rollback();
		}
	}
}
\Sistema\Roteador::mapearRequisicao("Conta", $_REQUEST);