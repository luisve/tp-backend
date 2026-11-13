<?php


namespace App\Controllers;


use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;


class PaseController extends ResourceController
{


	protected $modelName = 'App\Models\PaseModel';


	public function GetSelect() : ResponseInterface
	{
		$idCliente = $this->request->getVar('idCliente');
		return $this->respond($this->model->GetSelect($idCliente));
	}


}