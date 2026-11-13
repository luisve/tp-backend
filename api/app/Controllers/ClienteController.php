<?php


namespace App\Controllers;


use CodeIgniter\RESTful\ResourceController;
//use CodeIgniter\API\ResponseTrait;


class ClienteController extends ResourceController
{


	protected $modelName = 'App\Models\ClienteModel';
	//	use ResponseTrait;


	public function Set()
	{
		$usuario = $this->request->getJSON();
		if ($this->model->save($usuario)) {
			return $this->respond(array("code" => 200));
		} else {
			return $this->respond(array("code" => 400));
		}
	}


	public function Get()
	{
		$id = $this->request->getVar('id');
		return $this->respond($this->model->Get($id));
	}


	public function GetList()
	{
		return $this->respond(array("data" => $this->model->GetList(), "code" => 200));
	}


	public function GetSelect()
	{
		$textSearch = $this->request->getVar('textSearch');
		return $this->respond($this->model->GetSelect($textSearch));
	}


}