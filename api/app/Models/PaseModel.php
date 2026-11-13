<?php

namespace App\Models;

use App\Entities\PaseEntity;
use CodeIgniter\Model;
use App\Entities\SelectEntity;


class PaseModel extends Model
{


	protected $table = 'Pases';
	protected $primaryKey = 'Id';
	protected $allowedFields = ['NumeroPase', 'IdCliente', 'Saldo', 'FechaHoraAlta', 'IdUsuarioAlta'];


	public function GetSaldo(int $numeroPase) : object {
		//$saldo = 0;
		$this->set("Saldo", "Saldo - 1", false)
			->where(array("NumeroPase"=> $numeroPase))
			->update();
		// echo $this->getLastQuery();
		$pase = $this->asObject( PaseEntity::class)
			->select("Id, Saldo")
			->where(array("NumeroPase"=> $numeroPase))
			->first();
		// echo $this->getLastQuery();
		if ($pase === null) {
		  return (object) [ 'msg' => "Error", 'Saldo' => 0];
    	}
		return $pase;
	}


	public function GetSelect(int $idCliente = 0)
	{
		$listaClientes = $this
			->asObject(SelectEntity::class)
			->select('Id, NumeroPase Label')
			->where(array('IdCliente' => $idCliente))
			->findAll();
		//echo $this->getLastQuery();
		return $listaClientes;
	}
	/*
	public function Get(int $id)
	{
		return $this
			->asObject(UsuarioEntity::class)
			->select('Id, Nombre, Apellido, Email, Usuario, Telefono, Domicilio')
			->where(array('Id' => $id))
			->first();
	}
*/
/*
	public function GetList()
	{
		return $this
			->asObject(UsuarioEntity::class)
			->select('Id, Nombre, Apellido, Email, Usuario')
			->findAll();
	}
*/

}
