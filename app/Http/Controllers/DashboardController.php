<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        //tanpa global.php helper
        // $siswa = Siswa::all();
        // $siswa->map(function($s){
        //     $s->rataRataNilai = $s->rataRataNilai();
        //     return $s;
        // });
        // $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);
        // return view('dashboards.index',['siswa' => $siswa]);
        return view('dashboards.index');
    }
}
