<?php


namespace App\Controllers;


use CodeIgniter\RESTful\ResourceController;


class UsuarioController extends ResourceController
{


	protected $modelName = 'App\Models\UsuarioModel';


	public function SetUsuario()
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
		// $response = service('response');
		// $response->setCookie('usuario', 'valor', 3600, '/', '', true, true);
		// log_message('debug', 'Session data: ' . print_r(session()->get(), true));
		return $this->respond(array("data" => $this->model->GetList(), "code" => 200));
	}


	public function Login()
	{
		$form = $this->request->getJSON();
		return $this->respond($this->model->Login($form->Usuario, $form->Password));
	}


	public function SetPassword()
	{
		return true;
	}


	public function Logout()
	{
		session()->remove("usuario");
		return "logout";
	}
}
