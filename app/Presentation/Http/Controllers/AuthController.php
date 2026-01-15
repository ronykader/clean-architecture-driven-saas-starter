<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Auth\DTOs\RegisteruserDTO;
use App\Application\Auth\RegisterUserUseCase;
use App\Presentation\Http\Requests\RegisterRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, RegisterUserUseCase $useCase)
    {
        $user = $useCase->execute(
            new RegisteruserDTO(
                $request->name,
                $request->email,
                $request->password
            )
        );
        Auth::loginUsingId($user->id);

        return redirect()->route('dashboard');
    }
}
