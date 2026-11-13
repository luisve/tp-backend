<?php

namespace App\Filters;


use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


class AuthFilter implements FilterInterface
{


	public function before(RequestInterface $request, $arguments = null)
	{
		//var_dump(session()->get('usuario'));
		if ($arguments != null) {
			//var_dump(session()->get('usuario'));
			if (!session()->get('usuario')) {
				$response = service('response');
				$response->setStatusCode(401);
				return $response;
			}
		}
	}


	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}


}