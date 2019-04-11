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
		$oTurma->setConta(\Model\Conta::getContaById($aDados['conta']));
		$oTurma->setAno(\Model\Ano::getAnoById($aDados['ano']));
		$oTurma->setNome($aDados['nome']);
		$oTurma->setTurno($aDados['turno']);
		$oTurma->setAtivo($aDados['ativo']);
		$oTurma->setStatus($aDados['status']);
		return $oTurma;
	}
	public static function consultar(\Classes\Conta $oConta): array{
		$sSql = "SELECT 
					t.*, 
					a.valor as ano
				 FROM 
				 	turma t
				 INNER JOIN
				 	ano a
				 ON a.id = t.ano		
				 WHERE 
				 	a.conta=%i AND
				 	t.status=%i";

		return \DB::query($sSql, $oConta->getId(), \Comum\Classes\SimNaoEnum::Sim());
	}
}