<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminFabricantesController extends CBController {


    public function cbInit()
    {
        $this->setTable("fabricantes");
        $this->setPermalink("fabricantes");
        $this->setPageTitle("Fabricantes");

        $this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showDetail(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showDetail(false)->showAdd(false)->showEdit(false);
		$this->addText("Nombre","Nombre")->filterable(true)->strLimit(150)->maxLength(255);
		

    }
}
