<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=inventario",
			            "root",
			            "sfs2018");

		$link->exec("set names utf8");

		return $link;

	}

}