<?php
namespace Classes;
require_once \Config\Caminho::getModel()."conta.php";
require_once \Config\Caminho::getModel()."ano.php";

class Conta{
	private $iId;
	private $sNome;
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
		$this->iId = \Model\Conta::inserir($this);
		if (!empty($this->iId)){
			return true;
		}
	}
	public function registrarSessao(){
		$oAno = $this->getAnoAtivo();
		$oAno->registrarSessao();
	}
	public function getAnoAtivo() : \Classes\Ano{
		return \Model\Ano::getAnoAtivoByContaId($this->getId());
	}
	public function eValida(){
		if (empty($this->sNome)){
			return false;
		}
		return true;
	}
	public function getId(): int{
		return $this->iId;
	}
	public function getNome(): string{
		return $this->sNome;
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
	public function setNome(string $sNome){
		$this->sNome = $sNome;
	}
	public function setAtivo(int $iAtivo){
		$this->iAtivo = $iAtivo;
	}
	public function setDataCadastro(\DateTime $oDataCadastro){
		$this->dataCadastro = $oDataCadastro;
	}
}