<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function adminLogin()
    {
        $admin = User::where('is_admin', true)->first();
        if ($admin) {
            Auth::login($admin);
            return redirect('/admin');
        }

        return redirect('/')->with('error', 'Aucun administrateur trouvé.');
    }
}
