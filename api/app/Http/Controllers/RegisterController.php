<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RegisterService;

class RegisterController extends Controller
{
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function store(Request $request)
    {
        $result = $this->registerService->registerUser($request->all());

        if (!$result['success']) {
            return response()->json([
                'success' => false,
                'errors' => $result['errors'],
            ], 422);
        }

        return response()->json($result, 201);
    }

    public function index()
    {
        $result = $this->registerService->listUsers();

        return response()->json($result, 200);
    }
}
