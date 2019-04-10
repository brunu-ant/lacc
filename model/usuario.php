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
	public static function atualizar(\Classes\Usuario $oUsuario): int{
		$aColunas = [];
		if (!empty($oUsuario->getNome())){
			$aColunas["nome"] = $oUsuario->getNome();
		}
		if (!empty($oUsuario->getSenha())){
			$aColunas["senha"] = $oUsuario->getSenha();
		}
		if (!empty($oUsuario->getConta()->getId())){
			$aColunas["conta"] = $oUsuario->getConta()->getId();
		}
		if (!empty($oUsuario->getPerfil())){
			$aColunas["perfil"] = $oUsuario->getPerfil();
		}
		if (!empty($oUsuario->getEmail())){
			$aColunas["email"] = $oUsuario->getEmail();
		}
		if (!empty($oUsuario->getDataCadastro())){
			$aColunas["dataCadastro"] = $oUsuario->getDataCadastro();
		}
		if (!empty($oUsuario->getAtivo())){
			$aColunas["ativo"] = $oUsuario->getAtivo();
		}

		return \DB::update('usuario', $aColunas, "id=%i", $oUsuario->getId());
	}
	public static function getUsuarioById(int $iId) : \Classes\Usuario {
		$aDados = \DB::queryFirstRow("SELECT * FROM usuario WHERE id=%i", $iId);
		return self::getUsuario($aDados);
	}
	public static function getUsuarioByEmail(string $sEmail) : \Classes\Usuario {
		$aDados = \DB::queryFirstRow("SELECT * FROM usuario WHERE email=%s", $sEmail);
		return self::getUsuario($aDados);
	}
	private static function getUsuario(array $aDados) : \Classes\Usuario{
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