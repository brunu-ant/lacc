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
	public static function getUsuarioByEmail(string $sEmail) : \Classes\Usuario {
		$aDados = \DB::queryFirstRow("SELECT * FROM usuario WHERE email=%s", $sEmail);
		$oUsuario = new \Classes\Usuario();
		$oUsuario->setId($aDados['id']);
		$oUsuario->setNome($aDados['nome']);
		$oUsuario->setConta(\Model\Conta::getContaById($aDados['conta']));
		$oUsuario->setPerfil($aDados['perfil']);
		$oUsuario->setEmail($aDados['email']);
		$oUsuario->setDataCadastro(new \DateTime($aDados['dataCadastro']));
		$oUsuario->setAtivo($aDados['ativo']);
		$oUsuario->setSenha($aDados['senha']);
		return $oUsuario;
	}
	public static function consultar(\Classes\Conta $oConta): array{
		return \DB::query("SELECT * FROM usuario WHERE conta=%i", $oConta->getId());
	}
}