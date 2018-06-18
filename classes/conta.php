<?php
namespace Classes;
require_once \Config\Caminho::getModel()."conta.php";

class Conta{
	private $id;
	private $nome;
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
		return \Model\Conta::inserir($this);
	}
	public function eValida(){
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
	public function setAtivo(\Comum\Classes\SimNaoEnum $oAtivo){
		$this->oAtivo = $oAtivo;
	}
	public function setDataCadastro(DateTime $oDataCadastro){
		$this->dataCadastro = $oDataCadastro;
	}
}