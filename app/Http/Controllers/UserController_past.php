<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    // Pertemuan 2 ---
    // public function index(): View
    // {
    //     // select
    //     $users = DB::select('select * from m_user');
    //     return view('user.index', ['users' => $users]);
    //     // insert
    //     DB::insert('insert into m_level(level_kode, level_nama) values(?,?)', ['Cus', 'Pelanggan']);
    //     // update
    //     DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'Cus']);
    //     // delete
    //     DB::delete('delete m_level where level_kode = ?', ['Cus']);
    // }

    // Praktikum 1
    // public function index()
    // {
    //     $data = [
    //         'level_id' => 2,
    //         'username' => 'manager_tiga',
    //         'nama' => 'Manager 3',
    //         'password' => Hash::make('12345')
    //     ];
    //     // Error karena tidak diberikan tempat pada $fillable untuk memasukkan password, dan tidak ada password default unutk mengisi
    //     UserModel::create($data);

    //     $user = UserModel::all();
    //     return view('user', ['data' => $user]);
    // }

    // praktikum 2
    // public function index()
    // {
    //     $user = UserModel::where('level_id', 2)->count();
    //     // dd($user);
    //     return view('user', ['data' => $user]);
    // }

    // pratikum 3
    // public function index()
    // {
    //     $user = UserModel::firstOrNew(
    //         [
    //             'username' => 'manager33',
    //             'nama' => 'Manager Tiga Tiga',
    //             'password' => Hash::make('12345'),
    //             'level_id' => 2
    //         ],
    //     );
    //     $user->save();
    //     return view('user', ['data' => $user]);
    // }

    // praktikum 4
    // public function index()
    // {
    //     $user = UserModel::create([
    //         'username' => 'manager55',
    //         'nama' => 'manager55',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2,
    //     ]);
    //     $user->username = 'manager56';

    //     $user->isDirty();
    //     $user->isDirty('username');
    //     $user->isDirty('nama');
    //     $user->isDirty(['nama', 'username']);

    //     $user->isClean();
    //     $user->isClean('username');
    //     $user->isClean('nama');
    //     $user->isClean(['nama', 'username']);

    //     $user->save();

    //     $user->isDirty();
    //     $user->isClean();
    //     dd($user->isDirty());
    // }

    // public function index()
    // {
    //     $user = UserModel::create([
    //         'username' => 'manager11',
    //         'nama' => 'manager11',
    //         'password' => Hash::make('12345'),
    //         'level_id' => 2,
    //     ]);
    //     $user->username = 'manager12';

    //     $user->save();
    //     $user->wasChanged();
    //     $user->wasChanged('username');
    //     $user->wasChanged(['username', 'level_id']);
    //     $user->wasChanged('nama');
    //     dd($user->wasChanged(['nama', 'username']));
    // }

    public function index()
    {
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }

    public function tambah()
    {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;
        $user->save();

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }

    // public function index()
    // {
    //     $user = UserModel::with('level')->get();
    //     // dd($user);
    //     return view('user', ['data' => $user]);
    // }
}
