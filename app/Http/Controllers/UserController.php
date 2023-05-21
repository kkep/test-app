<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function profile(): Response
    {
        $user = Auth::user();
        if ($user === null) {
            redirect('/login');
            exit;
        }
        return Inertia::render('profile', [
            'user' => $user
        ]);
    }
}
