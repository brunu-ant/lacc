<?php 
namespace Comum\Classes;

use vijinho\Enums\Enum;

class PerfilUsuarioEnum extends Enum{
	protected static $values = [
		1 => "Coordenador",
		2 => "Professor"
	];
}