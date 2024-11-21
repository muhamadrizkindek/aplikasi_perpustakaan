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
        'nomor_telepon'    => 'required|numeric|digits_between:10,15', // Validasi nomor telepon
        'password'         => 'required|min:8', // Konfirmasi password
        'role'             => 'required|in:admin,user',
    ], [
        'nama.required'        => 'Nama harus diisi.',
        'nama.max'             => 'Nama maksimal 225 karakter.',
        'kelas.required'       => 'Kelas harus diisi.',
        'kelas.max'            => 'Kelas maksimal 50 karakter.',
        'jurusan.required'     => 'Jurusan harus diisi.',
        'jurusan.max'          => 'Jurusan maksimal 100 karakter.',
        'tanggal_bergabung.required' => 'Tanggal bergabung harus diisi.',
        'tanggal_bergabung.date'     => 'Tanggal bergabung harus berupa tanggal yang valid.',
        'email.required'       => 'Email harus diisi.',
        'email.email'          => 'Email harus berformat valid.',
        'email.unique'         => 'Email sudah terdaftar.',
        'nomor_telepon.required' => 'Nomor telepon harus diisi.',
        'nomor_telepon.numeric'  => 'Nomor telepon harus berupa angka.',
        'nomor_telepon.digits_between' => 'Nomor telepon harus memiliki 10-15 digit.',
        'password.required'    => 'Password harus diisi.',
        'password.min'         => 'Password minimal 8 karakter.',
        'password.confirmed'   => 'Konfirmasi password tidak cocok.',
        'role.required'        => 'Role harus dipilih.',
        'role.in'              => 'Role tidak valid.',
    ]);

    // Simpan data ke database
    $user = User::create([
        'nama'             => $request->nama,
        'kelas'            => $request->kelas,
        'jurusan'          => $request->jurusan,
        'tanggal_bergabung'=> $request->tanggal_bergabung,
        'email'            => $request->email,
        'nomor_telepon'    => $request->nomor_telepon,
        'password'         => bcrypt($request->password), // Enkripsi password
        'role'             => $request->role,
    ]);

    // Redirect dengan pesan sukses
    return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
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
                return redirect('/');
            }
            if (Auth::user()->role == 'admin'){
                return redirect('/');
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


