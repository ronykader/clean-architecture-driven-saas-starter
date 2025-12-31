<?php

namespace App\Presentation\Http\Controllers;

use App\Application\RegisterUserUseCase;
use App\app\Presentation\Http\Requests\RegisterRequest;
use App\Application\Auth\DTOs\RegisteruserDTO;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
   
    public function register(RegisterRequest $request, RegisterUserUseCase $useCase)
    {
        $useCase->execute(
            new RegisteruserDTO(
                $request->name,
                $request->email,
                $request->password
            )
            );
        return redirect()->route('dashboard');
    }
}
