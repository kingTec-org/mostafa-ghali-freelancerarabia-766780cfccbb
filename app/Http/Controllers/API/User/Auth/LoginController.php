<?php

namespace App\Http\Controllers\API\User\Auth;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\Auth\LoginRequest;
use App\Http\Tasks\User\Auth\LoginTask;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
    public function login(LoginRequest $request, LoginTask $task)
    {
        $response = $task->run($request);
        return $this->sendResponse($response['status'] , $response['message'],$response['data'],$response['code']);
    }
}
