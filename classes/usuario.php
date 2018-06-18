<?php
namespace Classes;
require_once \Config\Caminho::getModel()."usuario.php";

class Usuario{
	private $id;
	private $conta;
	private $nome;
	private $email;
	private $oPerfilUsuario;
	private $oAtivo;
	private $oDataCadastro;
	
	public function __construct(){
		$this->oAtivo = new \Comum\Classes\SimNaoEnum();
		$this->oDataCadastro = (new \DateTime());
	}
	public function criar() : bool{
		if (!$this->eValida()){
			return false;
		}
		return \Model\Usuario::inserir($this);
	}
	public function eValida(){
		if (empty($this->nome)){
			return false;
		}
		if (empty($this->email)){
			return false;
		}
		if (empty($this->oPerfilUsuario)){
			return false;
		}
		if (empty($this->nome)){
			return false;
		}
		return true;
	}
	public function getId(): int{
		return $this->id;
	}
	public function getNome(): string{
		return $this->nome;
	}
	public function getPerfil(): \Comum\Classes\PerfilUsuarioEnum{
		return $this->oPerfilUsuario;
	}
	public function getEmail(): string{
		return $this->email;
	}
	public function getAtivo(): \Comum\Classes\SimNaoEnum{
		return $this->oAtivo;
	}
	public function getDataCadastro(): \DateTime{
		return $this->oDataCadastro;
	}
	public function setId(int $id){
		$this->id = id;
	}
	public function setNome(string $nome){
		$this->nome = $nome;
	}
	public function setPerfil(\Comum\Classes\PerfilUsuarioEnum $oPerfilUsuario){
		$this->oPerfilUsuario = $oPerfilUsuario;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function setAtivo(\Comum\Classes\SimNaoEnum $oAtivo){
		$this->oAtivo = $oAtivo;
	}
	public function setDataCadastro(\DateTime $oDataCadastro){
		$this->dataCadastro = $oDataCadastro;
	}
}