<?php


namespace App\Entities;


use CodeIgniter\Entity\Entity;


class UsuarioEntity extends Entity
{


	protected $casts = [
		"Id"		=> "int",
		"Nombre"	=> "string",
		"Apellido"	=> "string",
		"Email"		=> "string",
		"Usuario"	=> "string",
		"Password"	=> "string",
		"Telefono"	=> "string",
		"Domicilio"	=> "string"
	];
}
