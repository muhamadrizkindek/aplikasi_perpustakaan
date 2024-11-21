<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan daftar user
    public function index()
    {
        $users = User::all(); // Ambil semua data user
        return view('pages.peminjam.user', compact('users')); // Kirim data ke view
    }

    // Menampilkan form untuk menambahkan user baru
    public function create()
    {
        return view('pages.peminjam.tambahuser'); // Halaman form tambah user
    }

    // Menyimpan user baru ke database
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama'             => 'required|max:225',
            'kelas'            => 'required|max:50',
            'jurusan'          => 'required|max:100',
            'tanggal_bergabung'=> 'required|date',
            'email'            => 'required|email|unique:users,email', // Email harus unik
            'nomor_telepon'    => 'required|numeric|digits_between:10,15', // Nomor telepon valid
            'password'         => 'required|min:8', // Password minimal 8 karakter
            'role'             => 'required|in:admin,user', // Role harus admin atau user
        ],[
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

        // Simpan data ke tabel users
        User::create([
            'nama'             => $request->nama,
            'kelas'            => $request->kelas,
            'jurusan'          => $request->jurusan,
            'tanggal_bergabung'=> $request->tanggal_bergabung,
            'email'            => $request->email,
            'nomor_telepon'    => $request->nomor_telepon,
            'password'         => bcrypt($request->password), // Enkripsi password
            'role'             => $request->role,
        ]);

        return redirect('/user')->with('success', 'User berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit user
    public function edit($id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID
        return view('pages.peminjam.edituser', compact('user')); // Kirim data ke view
    }

    // Memperbarui data user di database
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama'             => 'required|max:225',
            'kelas'            => 'required|max:50',
            'jurusan'          => 'required|max:100',
            'tanggal_bergabung'=> 'required|date',
            'email'            => 'required|email|unique:users,email,' . $id, // Abaikan email jika tidak berubah
            'nomor_telepon'    => 'required|numeric|digits_between:10,15', // Nomor telepon valid
            'role'             => 'required|in:admin,user', // Role harus admin atau user
        ]);

        // Update data di database
        $user = User::findOrFail($id);
        $user->update([
            'nama'             => $request->nama,
            'kelas'            => $request->kelas,
            'jurusan'          => $request->jurusan,
            'tanggal_bergabung'=> $request->tanggal_bergabung,
            'email'            => $request->email,
            'nomor_telepon'    => $request->nomor_telepon,
            'role'             => $request->role,
        ]);

        return redirect('/user')->with('success', 'User berhasil diperbarui!');
    }

    // Menghapus user dari database
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID
        $user->delete(); // Hapus user

        return redirect('/user')->with('success', 'User berhasil dihapus!');
    }
}

