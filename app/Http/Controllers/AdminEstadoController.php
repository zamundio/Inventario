<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminEstadoController extends CBController {


    public function cbInit()
    {
        $this->setTable("estado");
        $this->setPermalink("estado");
        $this->setPageTitle("Estado");

        $this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showDetail(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showDetail(false)->showAdd(false)->showEdit(false);
		$this->addText("Estado","Estado")->filterable(true)->strLimit(150)->maxLength(255);
		

    }
}
