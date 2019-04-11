<?php
namespace Classes;
require_once \Config\Caminho::getModel()."turma.php";

class Turma{
	private $iId;
	private $oConta;
	private $oAno;
	private $sNome;
	private $iTurno;
	private $iAtivo;
	private $iStatus;

	public function __construct(){
		$this->oConta = (\Sistema\Autorizacao::getAutorizacaoSessao())->getUsuario()->getConta();
		$this->oAno = \Sistema\Sessao::get("oAno");
		$this->iAtivo = (new \Comum\Classes\SimNaoEnum())->Sim();
	}
	public function criar() : bool{
		if (!$this->eValida()){
			return false;
		}
		$this->iId = \Model\Turma::inserir($this);
		if (!empty($this->iId)){
			return true;
		}
	}
	public function eValida(){
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
	public function getTurno(): int{
		return $this->iTurno;
	}
	public function getAtivo(): int{
		return $this->iAtivo;
	}
	public function getStatus(): int{
		return $this->iStatus;
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
	public function setTurno(int $iTurno){
		$this->iTurno = $iTurno;
	}
	public function setAtivo(int $iAtivo){
		$this->iAtivo = $iAtivo;
	}
	public function setStatus(int $iStatus){
		$this->iStatus = $iStatus;
	}
}