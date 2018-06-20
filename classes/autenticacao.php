<?php
namespace Classes;

class Autenticacao{
	private $bAutenticado = false;

	public function autenticar(string $sEmail, string $sSenha) : bool{
		$oUsuario = \Model\Usuario::getUsuarioByEmail($sEmail);
		if ($oUsuario->getSenha() != sha1($sSenha)){
			$this->setAutenticado(false);	
			throw new \Exception("Usuario ou senha invalidos");
		}
		$this->setAutenticado(true);
		return true;
	}
	public function getAutenticado(){
		return $this->bAutenticado;
	}
	public function setAutenticado(bool $bAutenticado){
		$this->bAutenticado = $bAutenticado;
	}
}