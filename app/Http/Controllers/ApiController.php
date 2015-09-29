<?php 

namespace App\Http\Controllers;

use Response;

class ApiController extends Controller
{

	protected $statusCode = 200;

	public function getStatusCode(){

		return $this->statusCode;

	}

	public function setStatusCode($statusCode){

		$this->statusCode = $statusCode;

	}

	 public function respondNotFount($message = 'Not Found !')
	{
		return Response::json([
				'error' => [
					'message' => $message,
					'statusCode' => $this->getStatusCode()
				]
			]);
	}

}