<?php
namespace Model;

class Turma{
	public static function inserir(\Classes\Turma $oTurma): int{
		\DB::insert('turma', array(
			"conta" => $oTurma->getConta()->getId(),
			"ano" => $oTurma->getAno()->getId(),
			"nome" => $oTurma->getNome(),
			"turno" => $oTurma->getTurno(),
			"ativo" => $oTurma->getAtivo(),
			)
		);
		return \DB::insertId();
	}
	public static function getTurmaById(int $iId) : \Classes\Turma {
		$aDados = \DB::queryFirstRow("SELECT * FROM turma WHERE id=%i", $iId);
		$oTurma = new \Classes\Turma();
		$oTurma->setId($aDados['id']);
		$oTurma->setNome($aDados['nome']);
		$oTurma->setConta(\Model\Conta::getContaById($aDados['conta']));
		$oTurma->setAno(\Model\Ano::getAnoById($aDados['ano']));
		$oTurma->setDataInicial(new \DateTime($aDados['dataInicial']));
		$oTurma->setDataFinal(new \DateTime($aDados['dataFinal']));
		$oTurma->setDataCadastro(new \DateTime($aDados['dataCadastro']));
		return $oTurma;
	}
}