<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterStoreRequest;
use App\Repositories\RegisterRepository;

class RegisterController extends Controller
{
    public function store(RegisterStoreRequest $registerStoreRequest, RegisterRepository $registerRepository)
    {
        $register = $registerRepository->store($registerStoreRequest);

        return response()->json([
            'success' => true,
            'data' => $register
        ]);
    }
}
