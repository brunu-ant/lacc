<?php 
namespace Comum\Classes;
use vijinho\Enums\Enum;

class TurnoEnum extends Enum{
	protected static $values = [
		"Manha" => 1,
		"Tarde" => 2,
		"Noite" => 3,
	];
}