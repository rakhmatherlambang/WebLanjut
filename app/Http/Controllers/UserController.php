<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('create_user', [
            'kelas' => $kelas,
            'title' => 'Create User',
        ]);
    }

    public function index()
    {
        $users = UserModel::with('kelas')->get();
        return view('list_user', [
            'users' => $users,
            'title' => 'List Users',
        ]);
    }

    public function store(Request $request){
        // Validasi data yang masuk
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menghandle upload foto
        // Menghandle upload foto
        $fotoPath = null; // Default fotoPath

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            
            // Cek jika file berhasil diupload
            if ($foto->isValid()) {
                // Menyimpan foto ke folder uploads/img dan mendapatkan jalurnya
                $fotoPath = $request->file('foto')->store('uploads/img', 'public'); // Pastikan ini sesuai dengan folder Anda
            } else {
                return back()->withErrors(['foto' => 'File upload tidak valid.']);
            }
        }


        // Buat user baru
        $this->userModel->create([
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas_id' => $request->input('kelas_id'),
        'foto' => $fotoPath, // Menyimpan jalur yang benar
        ]);


        return redirect()->route('users.index');  // Redirect ke route users.index
    }


    public function show($id)
    {
        // Cari user berdasarkan id dan load relasi dengan Kelas
        $user = UserModel::with('kelas')->findOrFail($id);

        // Mengirimkan data user ke view profile
        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas Tidak Ditemukan',
            'foto' => $user->foto,
        ]);
    }
}
