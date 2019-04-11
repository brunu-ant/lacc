<?php
namespace Model;

class Ano{
	public static function inserir(\Classes\Ano $oAno): int{
		\DB::insert('ano', array(
			"conta" => $oAno->getConta()->getId(),
			"valor" => $oAno->getValor(),
			"dataCadastro" => $oAno->getDataCadastro()
			)
		);
		return \DB::insertId();
	}
	public static function getAnoById(int $iId) : \Classes\Ano {
		$aDados = \DB::queryFirstRow("SELECT * FROM ano WHERE id=%s", $iId);
		$oAno = new \Classes\Ano();
		$oAno->setId($aDados['id']);
		$oAno->setConta(\Model\Conta::getContaById($aDados['conta']));
		$oAno->setValor($aDados['valor']);
		$oAno->setDataCadastro(new \DateTime($aDados['dataCadastro']));
		return $oAno;
	}
	public static function getAnoAtivoByContaId(int $iContaId) : \Classes\Ano {
		$aDados = \DB::queryFirstRow("SELECT * FROM ano WHERE conta=%i and ativo=%i order by id desc limit 1", $iContaId, (new \Comum\Classes\SimNaoEnum())->Sim());
		$oAno = new \Classes\Ano();
		$oAno->setId($aDados['id']);
		$oAno->setConta(\Model\Conta::getContaById($aDados['conta']));
		$oAno->setValor($aDados['valor']);
		$oAno->setDataCadastro(new \DateTime($aDados['dataCadastro']));
		return $oAno;
	}
	public static function consultarCombo(\Classes\Conta $oConta): array{
		$sSql = "SELECT 
					id, 
					valor
				 FROM 
				 	ano 
				 WHERE 
				 	conta=%i AND
				 	status=%i";

		return \DB::query($sSql, $oConta->getId(), \Comum\Classes\SimNaoEnum::Sim());
	}
}