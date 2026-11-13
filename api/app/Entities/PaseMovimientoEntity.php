<?php

namespace App\Entities;


use CodeIgniter\Entity\Entity;


class PaseMovimientoEntity extends Entity
{


	protected $casts = [
		"Id"					=> "int",
		"IdPase"				=> "int",
		"IdTipoMovimiento"		=> "int",
		"IdPaso"				=> "int",
		"CantidadPases"			=> "int",
		"PrecioUnitario"		=> "float",
		"FechaHora"				=> "datetime",
		"IdUsuario"				=> "int",
		"Movimiento"			=> "string",
	];


}