<?php namespace App\Entities;


use CodeIgniter\Entity\Entity;


class ClienteEntity extends Entity
{


	protected $casts = [
		"Id"		=> "int",
		"Nombre"	=> "string",
		"RazonSocial"	=> "string",
		"Domicilio"	=> "string",
		"CUIT"	=> "string",
		"Telefono"	=> "string",
		"Email"		=> "string",
	];


}