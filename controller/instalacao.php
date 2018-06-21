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
require_once \Config\Caminho::getClasses()."conta.php";
require_once \Config\Caminho::getClasses()."usuario.php";
require_once \Config\Caminho::getComum()."classes/perfilusuario.php";
require_once \Config\Caminho::getComum()."classes/simnao.php";

class Instalacao{
	public static function index($dados){
		try{
			(\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
			require_once \Config\Caminho::getView()."instalacao/ano.php";
		}catch(\Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
			require_once \Config\Caminho::getView()."login/login.php";
		}
	}
	public static function criarConta(array $dados){
		try{
			\DB::startTransaction();
			$oConta = new \Classes\Conta();
			$oConta->setNome($dados['nomeEscola']);
			$oConta->criar();
			$oUsuario = new \Classes\Usuario();
			$oUsuario->setConta($oConta);
			$oUsuario->setNome($dados['nome']);
			$oUsuario->setEmail($dados['email']);
			$oUsuario->setSenha($dados['senha'], true);
			$oUsuario->setPerfil((new \Comum\Classes\PerfilUsuarioEnum())->Coordenador());
			$oUsuario->criar();
			\DB::commit();
		}catch(\Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
			\DB::rollback();
		}
		
	}
}
\Sistema\Roteador::mapearRequisicao("Instalacao", $_REQUEST);