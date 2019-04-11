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
require_once \Config\Caminho::getClasses()."turma.php";
require_once \Config\Caminho::getClasses()."ano.php";
require_once \Config\Caminho::getComum()."classes/perfilusuario.php";
require_once \Config\Caminho::getComum()."classes/simnao.php";
require_once \Config\Caminho::getComum()."classes/turno.php";

class Turma{
	public static function consultar(array $aDados){
		try{
			(\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
			require_once \Config\Caminho::getView()."turma/consultar.php";
		}catch(\Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
	}
    public static function novo(array $aDados){
        try{
            (\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
            require_once \Config\Caminho::getView()."turma/novo.php";
        }catch(\Exception $e){
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }
    public static function cadastrar(array $aDados){
        try{
            (\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
            $oUsuario = new \Classes\Usuario();
            $oConta = (\Sistema\Autorizacao::getAutorizacaoSessao())->getUsuario()->getConta();
            $oUsuario->setConta($oConta);
            $oUsuario->setNome($aDados["nome"]);
            $oUsuario->setSenha($aDados["senha"], true);
            $oUsuario->setPerfil($aDados["perfil"]);
            $oUsuario->setEmail($aDados["email"]);
            $oUsuario->setAtivo($aDados["ativo"]);
            $oUsuario->criar();
        }catch(\Exception $e){
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
        require_once \Config\Caminho::getView()."turma/consultar.php";
    }
    public static function editar(array $aDados){
        try{
            (\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
            $oTurma = \Model\Turma::getTurmaById($aDados["id"]);
            require_once \Config\Caminho::getView()."turma/editar.php";
        }catch(\Exception $e){
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }
    public static function atualizar(array $aDados){
        try{
            (\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
            $oUsuario = \Model\Usuario::getUsuarioById($aDados["id"]);
            $oUsuario->setNome($aDados["nome"]);
            $oUsuario->setPerfil($aDados["perfil"]);
            $oUsuario->setEmail($aDados["email"]);
            $oUsuario->setAtivo($aDados["ativo"]);
            $oUsuario->atualizar();
        }catch(\Exception $e){
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
        
        require_once \Config\Caminho::getView()."turma/consultar.php";
    }
    public static function apagar(array $aDados){
        try{
            (\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
            $oUsuario = \Model\Usuario::getUsuarioById($aDados["id"]);
            \Model\Usuario::apagar($oUsuario);

            require_once \Config\Caminho::getView()."turma/consultar.php";
        }catch(\Exception $e){
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }
}
\Sistema\Roteador::mapearRequisicao("Turma", $_REQUEST);