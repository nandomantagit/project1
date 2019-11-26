<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Siswa;

class SiteController extends Controller
{
    public function home()
    {
        return view('sites.home');
    }

    public function register()
    {
        return view('sites.register');
    }

    public function postregister(Request $request)
    {
        //insert data ke table user
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();
        //insert data ke table Siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = Siswa::create($request->all());

        return redirect('/')->with('sukses', 'Berhasil daftar, silahkan login!');
    }
}
