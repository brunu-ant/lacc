<?php
namespace Sistema;

class Autenticacao{
	private $bAutenticado = false;

	public function autenticar(string $sEmail, string $sSenha) : \Classes\Usuario{
		$oUsuario = \Model\Usuario::getUsuarioByEmail($sEmail);
		if ($oUsuario->getSenha() != sha1($sSenha)){
			$this->setAutenticado(false);	
			throw new \Exception("Usuario ou senha invalidos");
		}
		$this->setAutenticado(true);
		return $oUsuario;
	}
	public function getAutenticado(){
		return $this->bAutenticado;
	}
	public function setAutenticado(bool $bAutenticado){
		$this->bAutenticado = $bAutenticado;
	}
}