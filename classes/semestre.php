<?php
namespace Classes;
require_once \Config\Caminho::getModel()."semestre.php";

class Semestre{
	private $iId;
	private $oConta;
	private $oAno;
	private $sNome;
	private $oDataInicio;
	private $oDataFim;
	private $oDataCadastro;


	public function __construct(){
		$this->oConta = (\Sistema\Autorizacao::getAutorizacaoSessao())->getUsuario()->getConta();
		$this->oAno = \Sistema\Sessao::get("oAno");
		$this->oDataCadastro = new \DateTime();
	}
	public function criar() : bool{
		if (!$this->eValida()){
			return false;
		}
		$this->iId = \Model\Semestre::inserir($this);
		if (!empty($this->iId)){
			return true;
		}
	}
	public function eValida(){
		if (empty($this->oDataInicial)){
			throw new \Exception("Informar a data de inicio do semestre");
		}
		if (empty($this->oDataFinal)){
			throw new \Exception("Informar a data final do semestre");
		}
		return true;
	}
	public function getId(): int{
		return $this->iId;
	}
	public function getConta(): \Classes\Conta{
		return $this->oConta;
	}
	public function getAno(): \Classes\Ano{
		return $this->oAno;
	}
	public function getNome(): string{
		return $this->sNome;
	}
	public function getDataInicial(): \DateTime{
		return $this->oDataInicial;
	}
	public function getDataFinal(): \DateTime{
		return $this->oDataFinal;
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
	public function setAno(\Classes\Ano $oAno){
		$this->oAno = $oAno;
	}
	public function setNome(string $sNome){
		$this->sNome = $sNome;
	}
	public function setDataInicial(\DateTime $oDataInicial){
		$this->oDataInicial = $oDataInicial;
	}
	public function setDataFinal(\DateTime $oDataFinal){
		$this->oDataFinal = $oDataFinal;
	}
	public function setDataCadastro(\DateTime $oDataCadastro){
		$this->oDataCadastro = $oDataCadastro;
	}
}