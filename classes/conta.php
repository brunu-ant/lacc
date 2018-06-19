<?php
namespace Classes;
require_once \Config\Caminho::getModel()."conta.php";

class Conta{
	private $id;
	private $nome;
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
		$this->id = \Model\Conta::inserir($this);
		if (!empty($this->id)){
			return true;
		}
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
	public function getAtivo(): int{
		return $this->iAtivo;
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
	public function setAtivo(int $iAtivo){
		$this->iAtivo = $iAtivo;
	}
	public function setDataCadastro(DateTime $oDataCadastro){
		$this->dataCadastro = $oDataCadastro;
	}
}