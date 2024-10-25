<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;




class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }
    public function create(){
       $kelas = Kelas::all();
       $data = [
        'kelas' => $kelas,
        'title' => 'Create User',
       ];

       return view('create_user', $data);
    }
    public function index(){
        $users = UserModel::with('kelas')->get();
        $data = [
            'users' => $users,  // Mengirimkan data users
            'title' => 'List Users',
        ];

        return view('list_user', $data);  // Mengembalikan view dengan data users
    }

    public function store(Request $request){
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->route('users.index');  // Redirect ke route users.index
    }

    public function show($id){
        // Cari user berdasarkan id dan load relasi dengan Kelas
        $user = UserModel::with('kelas')->findOrFail($id);

        // Mengirimkan data user ke view profile
        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas Tidak Ditemukan',
        ]);
    }



}