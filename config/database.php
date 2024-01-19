<?php
/**
 * Chamada da Base de dados
 */
class database
{
	// VARIAVEL GLOBAL DE CONEÇÃO
 	private static $connect=null;
	
	// FUNCAO DE INICIAR A BASE DE DADOS
 	public static function conectar(){
 		if (static::$connect==null) {
 			try {
 				static::$connect = new mysqli("localhost","root","","centromedico");
 				static::$connect->set_charset("utf-8");

 			} catch (Exception $e) {
 				print $e->getMessage();
 			}
 			return static::$connect;
 		}
 	}
	// FUNCAO DE TERMINAR  A BASE DE DADOS
	public static function desconectar(){
		if (static::$connect!=null) {
			static::$connect = null;
			return static::$connect;
		}
	}	
 }
?>

