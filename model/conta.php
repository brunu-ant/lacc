<?php
namespace Model;

class Conta{
	public static function inserir(\Classes\Conta $oConta){
		return \DB::insert('conta', array(
			"nome" => $oConta->getNome(),
			"ativo" => $oConta->getAtivo()::key("Sim")
			)
		);
	}
}