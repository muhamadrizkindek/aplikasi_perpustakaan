<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('pages.auth.register');
    }

    public function storeRegister(Request $request)
{
    // Validasi data
    $request->validate([
        'nama'             => 'required|max:225',
        'kelas'            => 'required|max:50', 
        'jurusan'          => 'required|max:100', 
        'tanggal_bergabung'=> 'required|date',
        'email'            => 'required|email|unique:users,email', // Validasi email agar unik
        'nomor_telepon'    => 'required|numeric|min:10', 
        'password'         => 'required|min:8',
        'role'             => 'required|in:admin,siswa,teacher', 
    ], [
        'nama.required'        => 'Nama Harus Di isi',
        'nama.max'             => 'Nama Maksimal 225 karakter',
        'kelas.required'       => 'Kelas Harus Di isi',
        'kelas.max'            => 'Kelas Maksimal 50 karakter',
        'jurusan.required'     => 'Jurusan Harus Di isi',
        'jurusan.max'                    => 'Jurusan Maksimal 100 karakter',
        'tanggal_bergabung.required'     => 'Tanggal Bergabung Harus Di isi',
        'tanggal_bergabung.date'         => 'Tanggal Bergabung Harus Berformat Tanggal yang valid',
        'email.required'                 => 'Email Harus Di isi',
        'email.email'                    => 'Email Harus Berformat Valid',
        'email.unique'                   => 'Email sudah ada',
        'nomer_telepon.required'         => 'Nomor Telepon Harus Di isi',
        'nomer_telepon.numeric'          => 'Nomor Telepon Harus Berupa Angka',
        'nomer_telepon.min'              => 'Nomor Telepon Harus Memiliki Setidaknya 10 Digit',
        'password.required'              => 'Password Harus Di isi',
        'password.min'                   => 'Password minimal 8 karakter',
        'role.required'                  => 'Role Harus Di pilih',
        'role.in'                        => 'Role tidak valid',
    ]);

    // Cek apakah email sudah ada di database
    if (User::where('email', $request->email)->exists()) {
        return back()->withErrors(['email' => 'Email sudah terdaftar']);
    }

    // Menyimpan data ke dalam database
    $storeDataSiswa = [
        'nama'              => $request->nama,
        'kelas'             => $request->kelas,
        'jurusan'           => $request->jurusan,
        'tanggal_bergabung' => $request->tanggal_bergabung,
        'email'             => $request->email,
        'nomor_telepon'     => $request->nomor_telepon,
        'password'          => bcrypt($request->password), // Enkripsi password
        'role'              => $request->role,
    ];

    // Masukkan data ke dalam model atau query builder untuk menyimpan ke database
    User::create($storeDataSiswa);

    // Redirect atau tampilkan view setelah berhasil
    return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
}

    //Login

    public function login(){
        return view('pages.auth.login');
    }

    public function storeLogin(Request $request){
        $credentials = $request->validate([
            'email'     => 'required',
            'password'  =>'required'
        ]);

        if (auth()->attempt($credentials)){
            if (Auth::user()->role == 'user'){
                return redirect('dasboard');
            }
            if (Auth::user()->role == 'admin'){
                return redirect('dasboard');
            }
        }else{
            return redirect('/login')->with('error','password salah');
        }
        ///Logout

    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}


