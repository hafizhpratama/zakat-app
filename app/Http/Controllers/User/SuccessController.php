<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuccessController extends Controller
{
    public function index()
    {

        if(!session('bayarzakat')) {
            return redirect(route('bayar-zakat'));
        }
        return view('success');
    }
}
