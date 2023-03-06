<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __invoke(Request $request)
    {
        return new UsersResource(
            User::filter($request)
                ->paginate(10)
        );
    }
}
