<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Lab;
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
        $labs = Lab::all(); 
        return view('create_user', [
            'kelas' => $kelas,
            'labs' => $labs,
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

    public function store(Request $request)
    {
        // dd($request->all());s
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'lab_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menghandle upload foto
        $fotoPath = null;
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $fotoPath = $request->file('foto')->store('uploads/img', 'public');
        }

        // Buat user baru
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'lab_id' => $request->input('lab_id'),
            'foto' => $fotoPath,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $user = UserModel::with('kelas')->findOrFail($id);
        $kelas = $user->kelas;
        $title = 'Detail ' . $user->nama;

        return view('profile', compact('user', 'kelas', 'title'));
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = Kelas::all();
        $title = 'Edit User';

        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('storage/uploads'), $fileName);
            $user->foto = 'uploads/' . $fileName;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User has been deleted successfully');
    }
}
