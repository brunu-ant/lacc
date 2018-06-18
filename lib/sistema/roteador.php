<?php
namespace Sistema;

class Roteador{
	public static function mapearRequisicao(string $controller, array $dados){
		if (empty($controller)){
			return;
		}
		if (empty($dados)){
			return;
		}
		$acao = self::extrairAcao($dados);
		if (empty($acao)){
			return;
		}
		call_user_func("\\Controller\\{$controller}::{$acao}", $dados);
	}

	private static function extrairAcao(array $dados) : string{
		$acao = $dados["acao"];

		if (!isset($acao) && empty($acao)){
			return null;
		}
		return self::camelCase($acao);
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