<?php
namespace Model;

class Ano{
	public static function inserir(\Classes\Ano $oAno): int{
		\DB::insert('ano', array(
			"conta" => $oConta->getId(),
			"valor" => $oAno->getAtivo(),
			"dataCadastro" => $oAno->getDataCadastro()
			)
		);
		return \DB::insertId();
	}
	public static function getAnoByValor(int $iValor) : \Classes\Ano {
		$aDados = \DB::queryFirstRow("SELECT * FROM conta WHERE id=%s", $iId);
		$oAno = new \Classes\Ano();
		$oAno->setId($aDados['id']);
		$oAno->setConta(\Model\Conta::getContaById($aDados['conta']));
		$oAno->setValor($aDados['valor']);
		$oAno->setDataCadastro(new \DateTime($aDados['dataCadastro']));
		return $oAno;
	}
}