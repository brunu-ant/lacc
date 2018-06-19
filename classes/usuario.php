<?php
namespace Classes;
require_once \Config\Caminho::getModel()."usuario.php";

class Usuario{
	private $id;
	private $conta;
	private $nome;
	private $senha;
	private $email;
	private $iPerfilUsuario;
	private $iAtivo;
	private $oDataCadastro;
	
	public function __construct(){
		$this->iAtivo = (new \Comum\Classes\SimNaoEnum())->Sim();
		$this->oDataCadastro = new \DateTime();
	}
	public function criar() : bool{
		if (!$this->eValida()){
			return false;
		}

		$this->id = \Model\Usuario::inserir($this);
		if (!empty($this->id)){
			return true;
		}
	}
	public function eValida(){
		if (empty($this->nome)){
			throw new Exception("Informe o nome");
		}
		if (empty($this->senha)){
			throw new Exception("Informe a senha");
		}
		if (empty($this->email)){
			throw new Exception("Informe o email");
		}
		if (empty($this->iPerfilUsuario)){
			throw new Exception("Informe o perfil de usuario");
		}
		if (empty($this->oConta)){
			throw new Exception("Informe a conta");
		}
		return true;
	}
	public function getId(): int{
		return $this->id;
	}
	public function getConta(): \Classes\Conta{
		return $this->oConta;
	}
	public function getNome(): string{
		return $this->nome;
	}
	public function getSenha(): string{
		return $this->senha;
	}
	public function getPerfil(): int{
		return $this->iPerfilUsuario;
	}
	public function getEmail(): string{
		return $this->email;
	}
	public function getAtivo(): int{
		return $this->iAtivo;
	}
	public function getDataCadastro(): \DateTime{
		return $this->oDataCadastro;
	}
	public function setId(int $id){
		$this->id = id;
	}
	public function setConta(\Classes\Conta $oConta){
		$this->oConta = $oConta;
	}
	public function setNome(string $nome){
		$this->nome = $nome;
	}
	public function setSenha(string $senha){
		$this->senha = sha1($senha);
	}
	public function setPerfil(int $iPerfilUsuario){
		$this->iPerfilUsuario = $iPerfilUsuario;
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