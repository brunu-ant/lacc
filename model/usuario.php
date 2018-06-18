<?php
namespace Model;

class Usuario{
	public static function inserir(\Classes\Usuario $oUsuario){
		return \DB::insert('usuario', array(
			"nome" => $oUsuario->getNome(),
			"conta" => $oUsuario->getConta()->getId(),
			"perfil" => $oUsuario->getPerfil(),
			"email" => $oUsuario->getConta()->getEmail(),
			"dataCadastro" => $oUsuario->getDataCadastro(),
			"ativo" => $oUsuario->getAtivo()
			)
		);
	}
}