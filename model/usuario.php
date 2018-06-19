<?php
namespace Model;

class Usuario{
	public static function inserir(\Classes\Usuario $oUsuario): int{
		\DB::insert('usuario', array(
			"nome" => $oUsuario->getNome(),
			"senha" => $oUsuario->getSenha(),
			"conta" => $oUsuario->getConta()->getId(),
			"perfil" => $oUsuario->getPerfil(),
			"email" => $oUsuario->getEmail(),
			"dataCadastro" => $oUsuario->getDataCadastro(),
			"ativo" => $oUsuario->getAtivo()
			)
		);
		return \DB::insertId();
	}
}