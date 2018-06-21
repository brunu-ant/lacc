<?php
namespace Classes;
require_once \Config\Caminho::getModel()."ano.php";

class Ano{
	private $iId;
	private $oConta;
	private $iValor;
	private $oDataCadastro;

	public function __construct(){
		$this->oConta = (\Sistema\Autorizacao::getAutorizacaoSessao())->getUsuario()->getConta();
		$this->oDataCadastro = new \DateTime();
	}
	public function criar() : bool{
		if (!$this->eValida()){
			return false;
		}
		$this->iId = \Model\Ano::inserir($this);
		if (!empty($this->iId)){
			return true;
		}
	}
	public function registrarSessao(){
		session_start();
		$_SESSION['oAno'] = $this;
	}
	public static function getSessao() : \Classes\Ano{
		session_start();
		if (empty($_SESSION['oAno'])){
			throw new \Exception("Nao podemos dizer qual o ano o sistema esta trabalhando.");
		}
		return $_SESSION['oAno'];
	}

	public function eValida(){
		if (empty($this->iValor)){
			return false;
		}
		return true;
	}
	public function getId(): int{
		return $this->iId;
	}
	public function getConta(): \Classes\Conta{
		return $this->oConta;
	}
	public function getValor(): int{
		return $this->iValor;
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
	public function setValor(int $iValor){
		$this->iValor = $iValor;
	}
	public function setDataCadastro(\DateTime $oDataCadastro){
		$this->dataCadastro = $oDataCadastro;
	}
}