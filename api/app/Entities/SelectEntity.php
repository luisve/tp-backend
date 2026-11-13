<?php namespace App\Entities;


use CodeIgniter\Entity\Entity;


class SelectEntity extends Entity
{


	protected $casts = [
		"Id"		=> "int",
		"Label"		=> "string",
	];


}