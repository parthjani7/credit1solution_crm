<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class TokenVerifier {
	private $token;
	public function __construct(){
		$this->token = session()->token();
	}

	public function handle($request, Closure $next)
	{
			if($request->ajax()){
				if($request->input("token")===$this->token)
					return $next($request);
			}
			else{
				return Response::json("Invalid request",200);
			}

	}

}
