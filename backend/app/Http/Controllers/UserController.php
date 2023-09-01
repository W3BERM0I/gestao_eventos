<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\NivelAcesso;
use App\Repositories\EloquentUserRepository;

class UserController extends Controller
{
    public function __construct(private EloquentUserRepository $userRepository)
    {
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function userAdmin()
    {
        return $this->userRepository->allAdmin();
    }
}
