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
    public static function montarCombo($aDados, $iChaveSelecionado=null, $sPrimeiroItem="Selecione uma opção"){
        echo "<option>".$sPrimeiroItem."</option>"; 
        foreach ($aDados as $aDado) {
            $selected = null;
            if ($iChaveSelecionado == $aDado["id"]){
                $selected="selected='selected'";
            }
            echo "<option value='{$aDado["id"]}' {$selected}>".$aDado["valor"]."</option>";
        }
    }
}