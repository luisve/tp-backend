<?php



namespace App\Models;



use CodeIgniter\Model;
use App\Entities\PaseMovimientoEntity;



class PaseMovimientoModel extends Model
{



	protected $table = 'PasesMovimientos';
	protected $primaryKey = 'Id';
	protected $allowedFields = ["IdPase", "CantidadPases", "Saldo", "IdTipoMovimiento", "IdBarrera", "PrecioUnitario", "FechaHora", "IdUsuario"];



	public function GetList()
	{
		$listaMovimientos = $this
			->asObject(PaseMovimientoEntity::class)
			->select('DATE_FORMAT( FechaHora, "%d/%m/%Y %H:%i") Fecha, TipoMov.Nombre Movimiento, IdPase, IdBarrera, CantidadPases, PrecioUnitario')
			->join('TipoMovimiento AS TipoMov', 'TipoMov.Id=PasesMovimientos.IdTipoMovimiento', 'left')
			->orderBy('FechaHora', 'DESC')
			->limit(25)
			->findAll();
		//echo $this->getLastQuery();
		return $listaMovimientos;
	}
}
