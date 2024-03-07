<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SiswaController extends Controller
{
    public function index(){
        // dd(User::role('siswa')->paginate(20));
        return Inertia::render("Guru/Siswa/Index", [
            "siswa"=> User::role('siswa')->paginate(20),
        ]);
    }
}
