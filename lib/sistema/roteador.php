<?php
namespace Sistema;

class Roteador{
	public static function mapearRequisicao(string $sController, array $aDados){
		if (empty($sController)){
			return;
		}
		if (empty($aDados)){
			return;
		}
		$acao = self::extrairAcao($aDados);
		if (empty($acao)){
			return;
		}
		call_user_func("\\Controller\\{$sController}::{$acao}", $aDados);
	}

	public static function redirecionar(string $sUrl){
		if (empty($sUrl)){
			throw new Exception("Nao foi possivel redirecionar.");
		}
		header("location: /lacc".$sUrl);
	}

	private static function extrairAcao(array $aDados) : string{
		$sAcao = $aDados["acao"];

		if (!isset($sAcao) && empty($sAcao)){
			return null;
		}
		return self::camelCase($sAcao);
	}

	private static function camelCase($str, array $noStrip = []){
        // non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        // uppercase the first character of each word
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
        $str = lcfirst($str);

        return $str;
	}

}