<?php


namespace App\Entities;


use CodeIgniter\Entity\Entity;


class PaseEntity extends Entity
{


	protected $casts = [
		"Id"				=> "int",
		"NumeroPase"		=> "int",
		"IdCliente"			=> "int",
		"Saldo"				=> "float",
		"FechaHoraAlta"		=> "datetime",
		"IdUsuarioAlta"		=> "int",
	];


}