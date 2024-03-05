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

    public function index()
    {
        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('username', 'customer-1')->update($data);

        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
