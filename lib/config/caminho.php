<?php
namespace Config;

class Caminho{
	private static $include = "/comum/includes/";
	private static $lib = "/lib/";
	private static $view = "/view/";
	private static $classes = "/classes/";
	private static $model = "/model/";
	private static $comum = "/comum/";

	public static function getInclude() : string{
		return $_SERVER["DOCUMENT_ROOT"]."/lacc".self::$include;
	}
	public static function getLib() : string{
		return $_SERVER["DOCUMENT_ROOT"]."/lacc".self::$lib;
	}
	public static function getView() : string{
		return $_SERVER["DOCUMENT_ROOT"]."/lacc".self::$view;
	}
	public static function getClasses() : string{
		return $_SERVER["DOCUMENT_ROOT"]."/lacc".self::$classes;
	}
	public static function getModel() : string{
		return $_SERVER["DOCUMENT_ROOT"]."/lacc".self::$model;
	}
	public static function getComum() : string{
		return $_SERVER["DOCUMENT_ROOT"]."/lacc".self::$comum;
	}
}