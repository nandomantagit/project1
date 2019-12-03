<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Siswa;
use App\Post;
use App\Mail\NotifPendaftaranSiswa;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();
        return view('sites.home', compact(['posts']));
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

        // \Mail::raw('Selamat datang ' .$user->name, function ($message) use($user) {
        //     $message->to($user->email, $user->name);
        //     $message->subject('Selamat anda sudah terdaftar di Sekolah kami');
        // });
        // kirim email ke email user
        \Mail::to($user->email)->send(new NotifPendaftaranSiswa);

        return redirect('/')->with('sukses', 'Berhasil daftar, silahkan login!');
    }

    public function singlepost($slug)
    {
        $post = Post::where('slug','=',$slug)->first();
        return view('sites.singlepost', compact(['post']));
    }
}
