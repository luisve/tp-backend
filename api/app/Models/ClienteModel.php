<?php


namespace App\Models;


use CodeIgniter\Model;
use App\Entities\ClienteEntity;
use App\Entities\SelectEntity;


class ClienteModel extends Model
{


	protected $table = 'Clientes';
	protected $primaryKey = 'Id';
	protected $allowedFields = ['Nombre', 'RazonSocial', 'Domicilio', 'CUIT', 'Telefono', 'Email'];


	public function GetSelect(string $texto = "")
	{
		$listaClientes = $this
			->asObject(SelectEntity::class)
			->select('Id, Nombre Label')
			->like(array('Nombre' => $texto))
			->findAll();
		//echo $this->getLastQuery();
		return $listaClientes;
	}


	public function Get(int $id)
	{
		return $this
			->asObject(ClienteEntity::class)
			->select('Id, Nombre, RazonSocial, Domicilio, CUIT, Telefono, Email')
			->where(array('Id' => $id))
			->first();
	}


	public function GetList()
	{
		return $this
			->asObject(ClienteEntity::class)
			->select('Id, Nombre, RazonSocial, Email, Domicilio')
			->findAll();
	}


}