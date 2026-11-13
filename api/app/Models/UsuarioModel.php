<?php

namespace App\Models;


use App\Entities\UsuarioEntity;
use CodeIgniter\Model;


class UsuarioModel extends Model
{


	protected $table = 'Usuarios';
	protected $primaryKey = 'Id';
	protected $allowedFields = ['Nombre', 'Apellido', 'Email', 'Usuario', 'Password', 'Telefono', 'Domicilio'];


	public function Get(int $id)
	{
		return $this
			->asObject(UsuarioEntity::class)
			->select('Id, Nombre, Apellido, Email, Usuario, Telefono, Domicilio')
			->where(array('Id' => $id))
			->first();
	}


	public function GetList()
	{
		return $this
			->asObject(UsuarioEntity::class)
			->select('Id, Nombre, Apellido, Email, Usuario')
			->findAll();
	}


	public function Login(string $usuario, string $password)
	{
		// $model = new UsuarioModel();
		// $Mail = $this->request->getPost('Mail');
		// $Password = $this->request->getPost('Password');
		$datosUsuario = $this
			->asObject(UsuarioEntity::class)
			->where('Usuario', $usuario)
			->first();
		// echo $this->getLastQuery();
		if (!is_null($datosUsuario) && password_verify($password, $datosUsuario->Password)) {
			/*
			$usuario = [
				"id" => $datosUsuario["Id"],
				"nombre" => $datosUsuario["Nombre"],
				"apellido" => $datosUsuario["Apellido"],
				"mail" => $datosUsuario["Mail"]
			];
			*/
			//json_decode(json_encode($etJSON()), true);
			session()->set('usuario', $datosUsuario);
			//log_message('debug', 'Session data: ' . print_r(session()->get(), true));
			//log_message('debug', 'Este es un mensaje de prueba de depuración');
			//echo "/*";
			//var_dump(session()->get("usuario"));
			//echo "*/";
			return array("data" => "Ok", "code" => 200);
		} else {
			/*
			$this->save(array(
				'Usuario' => $usuario,
				'Password' => password_hash($password, PASSWORD_BCRYPT),
				'Email' => '1'
			));
			*/
			return array("msg" => "No se encontró el usuario", "code" => 400);
		}
	}
}
