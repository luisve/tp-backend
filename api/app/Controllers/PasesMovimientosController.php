<?php



namespace App\Controllers;



use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\PaseModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Response;



class PasesMovimientosController extends ResourceController
{



	protected $modelName = 'App\Models\PaseMovimientoModel';
	use ResponseTrait;



	public function GetList(): ResponseInterface
	{
		return $this->respond(array("data" => $this->model->GetList()));
	}



	public function Iniciar(): ResponseInterface
	{
		//$this->response->setHeader('Content-Type', 'application/json');
		$idBarrera = $this->request->getVar('idBarrera');
		$this->model->save(array(
			"IdBarrera" => $idBarrera,
			"FechaHora"	=> date("Y-m-d H:i:s"),
			"IdTipoMovimiento"	=> 4,
			"IdPase"					=> 0,
			"CantidadPases"		=> 0,
			"PrecioUnitario"		=> 0,
			"Saldo"					=> 0
		));

		return $this->respond(array("msg" => "Barrera " . $idBarrera . " iniciada", "hora" => time()));
	}



	// Carga de pases diferidos
	public function Diferido(): ResponseInterface
	{
		return $this->respond(
			array(
				"Saldo" => 2,
				"msg" => "Mensaje de prueba",
				"hora" => time()
			)
		);
	}



	//public function Paso(): ResponseInterface
	public function Paso(): ResponseInterface
	{
		$idBarrera = $this->request->getVar('idBarrera');
		$numeroPase = $this->request->getVar('numeroPase');

		$paseModel = new PaseModel();
		$pase = $paseModel->GetSaldo($numeroPase);
		if ($pase) {
			//var_dump($pase);
			$this->model->save(array(
				"IdPase"					=> $pase->Id,
				"IdTipoMovimiento"	=> 3,
				"IdBarrera"				=> $idBarrera,
				"CantidadPases"		=> 1,
				"PrecioUnitario"		=> 0,
				"FechaHora" 			=> date("Y-m-d H:i:s"),
				"Saldo"					=> $pase->Saldo
			));
			//echo $this->model->getLastQuery();
			return $this->respond(array(
				"msg" => "Saldo: " . $pase->Saldo, 
				"Saldo" => $pase->Saldo));
		} else {
			return $this->respond(array(
				"msg" => "Saldo: " . $pase->Saldo, 
				"Saldo" => $pase->Saldo,
				"hora" => time()));
		}
		/*
		return $this->respond(
			array(
				"Saldo" => $pase->Saldo,
				"msg" => "Mensaje de prueba",
				"hora" => time()
			)
		);
		*/
	}


	public function Carga(): ResponseInterface
	{
		$dataForm = json_decode(json_encode($this->request->getJSON()), true);
		$dataForm["FechaHoraAlta"] = date("Y-m-d H:i:s");
		$dataForm["IdUsuarioAlta"] = session()->get("usuario")->Id;
		$paseModel = new PaseModel();
		if (is_null($dataForm["IdPase"])) {
			$dataForm["Saldo"] = $dataForm["CantidadPases"];
			$dataForm["IdPase"] = $paseModel->save($dataForm);
			// echo $paseModel->getLastQuery();
		} else {
			$dataForm["IdTipoMovimiento"] = 2;
			$paseModel
				->set("Saldo", "Saldo + " . $dataForm["CantidadPases"], false)
				->where(array("Id" => $dataForm["IdPase"]))
				->update();
			$dataForm["Saldo"] = $paseModel->where('Id', $dataForm["IdPase"])->select('Saldo')->first()['Saldo'];;
		}
		$dataForm["FechaHora"] = date("Y-m-d H:i:s");
		$dataForm["IdUsuario"] = session()->get("usuario")->Id;

		if ($this->model->save($dataForm)) {
			// echo $paseModel->getLastQuery();
			return $this->respond(array("code" => 200));
		} else {
			return $this->respond(array("code" => 400, "msg" => "Se ha producido un error al intentar guardar los datos"));
		}
	}

	public function GeHora(): int
	{
		return time();
	}
}
