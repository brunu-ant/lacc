<?php
namespace Model;

class Conta{
	public static function inserir(\Classes\Conta $oConta): int{
		\DB::insert('conta', array(
			"nome" => $oConta->getNome(),
			"ativo" => $oConta->getAtivo(),
			"dataCadastro" => $oConta->getDataCadastro()
			)
		);
		return \DB::insertId();
	}
	public static function getContaById(int $iId) : \Classes\Conta {
		$aDados = \DB::queryFirstRow("SELECT * FROM conta WHERE id=%i", $iId);
		$oConta = new \Classes\Conta();
		$oConta->setId($aDados['id']);
		$oConta->setNome($aDados['nome']);
		$oConta->setAtivo($aDados['ativo']);
		$oConta->setDataCadastro(new \DateTime($aDados['dataCadastro']));
		return $oConta;
	}
}