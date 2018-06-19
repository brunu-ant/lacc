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
}