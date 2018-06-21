<?php
namespace Sistema;

class Autorizacao{
	private $oUsuario;
	private $bAutorizado = false;

	public function autorizar() : bool{
		if (empty($this->oUsuario)){
			throw new Exception("Necessario informar um usuario para autorizar o acesso");
		}
		$this->bAutorizado = true;
		session_start();
		$_SESSION['oAutorizacao'] = $this;
		return true;
	}
	public function revogar(){
		$_SESSION['oAutorizacao'] = null;
	}
	public function estaAutorizado() : bool{
		if (!$this->bAutorizado){
			throw new \Exception("O usuario nao esta autorizado a acessar esta parte do sistema");
		}
		return true;
	}
	public static function getAutorizacaoSessao() : \Sistema\Autorizacao{
		session_start();
		if (empty($_SESSION['oAutorizacao'])){
			throw new \Exception("O usuario nao esta autorizado a acessar esta parte do sistema");
		}
		return $_SESSION['oAutorizacao'];
	}
	public function setUsuario(\Classes\Usuario $oUsuario){
		$this->oUsuario = $oUsuario;
	}
	public function getUsuario() : bool{
		return $this->oUsuario;
	}
	public function setAutorizado(book $bAutorizado){
		$this->bAutorizado = $bAutorizado;
	}
	public function getAutorizado() : bool{
		return $this->bAutorizado;
	}
}