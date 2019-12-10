<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminDelegadosController extends CBController {


    public function cbInit()
    {
        $this->setTable("delegados");
        $this->setPermalink("delegados");
        $this->setPageTitle("Delegados");

        $this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showDetail(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showDetail(false)->showAdd(false)->showEdit(false);
		$this->addText("Codigo","Codigo")->filterable(true)->strLimit(6)->maxLength(6);
		$this->addText("Nombre","Nombre")->filterable(true)->strLimit(40)->maxLength(40);
		$this->addText("Apellidos","Primer Apellido")->filterable(true)->strLimit(75)->maxLength(75);
		$this->addText("Centro De Coste","Centro de Coste")->showIndex(false)->filterable(true)->strLimit(25)->maxLength(25);
		$this->addDate("Fecha De Alta","Fecha de Alta")->filterable(true)->format('d-m-Y');
		$this->addEmail("Email","Email");
		$this->addText("Compañia","Compañia")->showIndex(false)->filterable(true)->strLimit(25)->maxLength(25);
		$this->addText("Dirección","Dirección")->showIndex(false)->strLimit(25)->maxLength(25);
		$this->addText("Población","Población")->showIndex(false)->strLimit(25)->maxLength(25);
		$this->addText("Provincia","Provincia")->showIndex(false)->strLimit(25)->maxLength(25);
		$this->addText("Telefono","Telefono")->strLimit(25)->maxLength(25);
		$this->addSelectOption("Genero","Genero")->options(['M'=>'Masculino','F'=>'Femenino'])->showIndex(false);
		$this->addDate("Fecha Baja","Fecha Baja")->required(false)->format('d-m-Y');
		$this->addText("Dni","DNI")->showIndex(false)->strLimit(12)->maxLength(12);
		$this->addText("Posicion","Posicion")->showIndex(false)->strLimit(25)->maxLength(25);
		$this->addText("Zona","Zona")->strLimit(25)->maxLength(25);
		$this->addText("Area","Area")->showIndex(false)->strLimit(25)->maxLength(25);
		$this->addText("Subarea","SubArea")->strLimit(25)->maxLength(25);
		$this->addSelectTable("Gerente","Gerente",["table"=>"gerentes_area","value_option"=>"Codigo","display_option"=>"Primer Apellido","sql_condition"=>""])->showIndex(false)->filterable(true);
		$this->addText("Linea","Linea")->strLimit(10)->maxLength(10);
		$this->addText("Gerente","Gerente")->strLimit(25)->maxLength(25);
		

    }
}
