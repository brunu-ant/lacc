<?php 
namespace Comum\Classes;

use vijinho\Enums\Enum;

class PerfilUsuarioEnum extends Enum{
	protected static $values = [
		"Coordenador" => 1,
		"Professor" => 2
	];
}