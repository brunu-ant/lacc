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
require_once \Config\Caminho::getClasses()."semestre.php";
require_once \Config\Caminho::getClasses()."turma.php";
require_once \Config\Caminho::getComum()."classes/perfilusuario.php";
require_once \Config\Caminho::getComum()."classes/simnao.php";
require_once \Config\Caminho::getComum()."classes/turno.php";

class Instalacao{
	public static function index(array $aDados){
		try{
			(\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
			require_once \Config\Caminho::getView()."instalacao/ano.php";
		}catch(\Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
	}
	public static function salvarAno(array $aDados){
		try{
			(\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
			$oAno = new \Classes\Ano();
			$oAno->setValor($aDados['ano']);
			$oAno->criar();
			$oAno->registrarSessao();
			\Sistema\Roteador::redirecionar("/controller/instalacao.php?acao=semestre");
		}catch(\Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
		
	}
	public static function semestre(array $aDados){
		try{
			(\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
			require_once \Config\Caminho::getView()."instalacao/semestre.php";
		}catch(\Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
	}
	public static function salvarSemestre(array $aDados){
		try{
			(\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
			\DB::startTransaction();
			$oPrimeiroSemestre = new \Classes\Semestre();
			$oPrimeiroSemestre->setNome("Primeiro Semestre");
			$oPrimeiroSemestre->setDataInicial(\DateTime::createFromFormat('d/m/Y', $aDados['dataInicial1']));
			$oPrimeiroSemestre->setDataFinal(\DateTime::createFromFormat('d/m/Y', $aDados['dataFinal1']));
			$oPrimeiroSemestre->criar();

			$oSegundoSemestre = new \Classes\Semestre();
			$oSegundoSemestre->setNome("Segundo Semestre");
			$oSegundoSemestre->setDataInicial(\DateTime::createFromFormat('d/m/Y', $aDados['dataInicial2']));
			$oSegundoSemestre->setDataFinal(\DateTime::createFromFormat('d/m/Y', $aDados['dataFinal2']));
			$oSegundoSemestre->criar();
			\DB::commit();

			\Sistema\Roteador::redirecionar("/controller/instalacao.php?acao=turmas");
		}catch(\Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
			\DB::rollback();
		}
	}
	public static function turmas(array $aDados){
		try{
			(\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
			require_once \Config\Caminho::getView()."instalacao/turmas.php";
		}catch(\Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
	}
	public static function salvarTurma(array $aDados){
		try{
			(\Sistema\Autorizacao::getAutorizacaoSessao())->estaAutorizado();
			\DB::startTransaction();
			for($i = 1; $i <= $aDados['quantidadeTurmaManha']; $i++){
				$oTurma = new \Classes\Turma();
				$oTurma->setNome("Turma {$i} da manhã");
				$oTurma->setTurno((new \Comum\Classes\TurnoEnum())->Manha());
				$oTurma->criar();
			}
			for($i = 1; $i <= $aDados['quantidadeTurmaTarde']; $i++){
				$oTurma = new \Classes\Turma();
				$oTurma->setNome("Turma {$i} da tarde");
				$oTurma->setTurno((new \Comum\Classes\TurnoEnum())->Tarde());
				$oTurma->criar();
			}
			\DB::commit();
			\Sistema\Roteador::redirecionar("/controller/instalacao.php?acao=turmas");
		}catch(\Exception $e){
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
			\DB::rollback();
		}
	}	
}
\Sistema\Roteador::mapearRequisicao("Instalacao", $_REQUEST);