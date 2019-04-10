<?php
namespace Classes;
require_once \Config\Caminho::getModel()."usuario.php";

class Usuario{
	private $iId;
	private $oConta;
	private $sNome;
	private $sSenha;
	private $sEmail;
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

		$this->iId = \Model\Usuario::inserir($this);
		if (!empty($this->iId)){
			return true;
		}
	}

	public function atualizar(){
		if (!$this->eValida()){
			return false;
		}

		\Model\Usuario::atualizar($this);
	}
	private function eValida(){
		if (empty($this->sNome)){
			throw new \Exception("Informe o nome");
		}
		if (empty($this->sSenha)){
			throw new \Exception("Informe a senha");
		}
		if (empty($this->sEmail)){
			throw new \Exception("Informe o email");
		}
		if (empty($this->iPerfilUsuario)){
			throw new \Exception("Informe o perfil de usuario");
		}
		if (empty($this->oConta)){
			throw new \Exception("Informe a conta");
		}
		return true;
	}
	public function getId(): int{
		return $this->iId;
	}
	public function getConta(): \Classes\Conta{
		return $this->oConta;
	}
	public function getNome(): string{
		return $this->sNome;
	}
	public function getSenha(): string{
		return $this->sSenha;
	}
	public function getPerfil(): int{
		return $this->iPerfilUsuario;
	}
	public function getEmail(): string{
		return $this->sEmail;
	}
	public function getAtivo(): int{
		return $this->iAtivo;
	}
	public function getDataCadastro(): \DateTime{
		return $this->oDataCadastro;
	}
	public function setId(int $iId){
		$this->iId = $iId;
	}
	public function setConta(\Classes\Conta $oConta){
		$this->oConta = $oConta;
	}
	public function setNome(string $sNome){
		$this->sNome = $sNome;
	}
	public function setSenha(string $sSenha, bool $bCriptograr=false){
		if ($bCriptograr){
			$this->sSenha = sha1($sSenha);
		}
		$this->sSenha = $sSenha;
	}
	public function setPerfil(int $iPerfilUsuario){
		$this->iPerfilUsuario = $iPerfilUsuario;
	}
	public function setEmail($sEmail){
		$this->sEmail = $sEmail;
	}
	public function setAtivo(int $iAtivo){
		$this->iAtivo = $iAtivo;
	}
	public function setDataCadastro(\DateTime $oDataCadastro){
		$this->dataCadastro = $oDataCadastro;
	}
}