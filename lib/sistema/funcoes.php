<?php
namespace Sistema;

class Funcoes{
	public static function montarOptionEnum($oEnum, $iChaveSelecionado=null, $sPrimeiroItem="Selecione uma opção"){
        $aEnum = $oEnum::values();
        echo "<option>".$sPrimeiroItem."</option>"; 
        foreach ($aEnum as $chave => $valor) {
            $selected = null;
            if ($iChaveSelecionado == $valor){
                $selected="selected='selected'";
            }
            echo "<option value='{$valor}' {$selected}>".$chave."</option>";
        }
    }
    public static function montarRadioEnum(){

    }
}