<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminGerentesAreaController extends CBController {


    public function cbInit()
    {
        $this->setTable("gerentes_area");
        $this->setPermalink("gerentes_area");
        $this->setPageTitle("Gerentes Area");

        $this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showDetail(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showDetail(false)->showAdd(false)->showEdit(false);
		$this->addText("Codigo","Codigo")->strLimit(150)->maxLength(255);
		$this->addText("Nombre","Nombre")->filterable(true)->strLimit(150)->maxLength(255);
		$this->addText("Primer Apellido","Primer Apellido")->filterable(true)->strLimit(150)->maxLength(255);
		$this->addText("Segundo Apellido","Segundo Apellido")->filterable(true)->strLimit(150)->maxLength(255);
		$this->addText("Zona","Zona")->strLimit(150)->maxLength(255);
		

    }
}
