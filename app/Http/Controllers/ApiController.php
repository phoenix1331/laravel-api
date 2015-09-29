<?php 

namespace App\Http\Controllers;

use Response;

class ApiController extends Controller
{

	protected $statusCode = 200;

	/**
	 * [getStatusCode description]
	 * @return [type] [description]
	 */
	public function getStatusCode(){

		return $this->statusCode;

	}

	/**
	 * [setStatusCode description]
	 * @param [type] $statusCode [description]
	 */
	public function setStatusCode($statusCode){

		$this->statusCode = $statusCode;

		return $this;

	}

	/**
	 * [respondNotFount description]
	 * @param  string $message [description]
	 * @return [type]          [description]
	 */
	public function respondNotFount($message = 'Not Found !'){

		return $this->setStatusCode(404)->respondWithError($message);

	}

	/**
	 * [respond description]
	 * @param  [type] $data    [description]
	 * @param  array  $headers [description]
	 * @return [type]          [description]
	 */
	public function respond($data, $headers = []){

		return Response::json($data, $this->getStatusCode(), $headers);

	}

	/**
	 * respondWithError
	 * @param  [type] $message [description]
	 * @return [type]          [description]
	 */
	public function respondWithError($message){

		return $this->respond([

				'error' => [
					'message' => $message,
					'statuscode' => $this->getStatusCode()
				]
				
		]);

	}

}