<?php
namespace Model;

class Semestre{
	public static function inserir(\Classes\Semestre $oSemestre): int{
		\DB::insert('semestre', array(
			"conta" => $oSemestre->getConta()->getId(),
			"ano" => $oSemestre->getAno()->getId(),
			"nome" => $oSemestre->getNome(),
			"dataInicial" => $oSemestre->getDataInicial(),
			"dataFinal" => $oSemestre->getDataFinal(),
			"dataCadastro" => $oSemestre->getDataCadastro()
			)
		);
		return \DB::insertId();
	}
	public static function getSemestreById(int $iId) : \Classes\Semestre {
		$aDados = \DB::queryFirstRow("SELECT * FROM semestre WHERE id=%i", $iId);
		$oSemestre = new \Classes\Semestre();
		$oSemestre->setId($aDados['id']);
		$oSemestre->setNome($aDados['nome']);
		$oSemestre->setConta(\Model\Conta::getContaById($aDados['conta']));
		$oSemestre->setAno(\Model\Ano::getAnoById($aDados['ano']));
		$oSemestre->setDataInicial(new \DateTime($aDados['dataInicial']));
		$oSemestre->setDataFinal(new \DateTime($aDados['dataFinal']));
		$oSemestre->setDataCadastro(new \DateTime($aDados['dataCadastro']));
		return $oSemestre;
	}
}