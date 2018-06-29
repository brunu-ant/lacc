<?php
namespace Sistema;

class Sessao{
	private static function iniciar(){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}
	public static function set(string $sChave, $oValor){
		self::iniciar();
		$_SESSION[$sChave] = $oValor;
	}
	public static function get(string $sChave){
		self::iniciar();
		return $_SESSION[$sChave];
	}
}