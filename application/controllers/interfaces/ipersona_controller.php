<?php
/**
 * Interfaz de Personas Archivo, Ecuadorinmobile 
 * 
 * @author Mario Torres <mariofertc@mixmail.com>
 * @version 1.0
 * @package Interfaz
 */
/**
 * Include de la Interfaz idata_controller
 */
require_once("idata_controller.php");
/**
 * Interfaz de personas.
*/
interface iPersona_controller extends iData_controller
{
	public function mailto();
}
/*Fin del Archivo iPersona_controller.php*/