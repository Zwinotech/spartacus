<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function Logout() {
        Auth::logout();
        return redirect()->route('/');
    }

    public function show($id)
    {
        return view('system.admin.user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}
