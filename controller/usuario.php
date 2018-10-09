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
require_once \Config\Caminho::getLib()."sistema/funcoes.php";
require_once \Config\Caminho::getClasses()."conta.php";
require_once \Config\Caminho::getClasses()."usuario.php";
require_once \Config\Caminho::getClasses()."ano.php";
require_once \Config\Caminho::getComum()."classes/perfilusuario.php";
require_once \Config\Caminho::getComum()."classes/simnao.php";

class Login{
	public static function consultar(array $aDados){
		try{
			(\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
			require_once \Config\Caminho::getView()."usuario/consultar.php";
		}catch(\Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
	}
    public static function editar(array $aDados){
        try{
            (\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
            $oUsuario = \Model\Usuario::getUsuarioById($aDados["id"]);
            require_once \Config\Caminho::getView()."usuario/editar.php";
        }catch(\Exception $e){
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }
}
\Sistema\Roteador::mapearRequisicao("Login", $_REQUEST);