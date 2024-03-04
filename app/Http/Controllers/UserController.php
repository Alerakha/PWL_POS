<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    //
    public function index(): View
    {
        // select
        $users = DB::select('select * from m_user');
        return view('user.index', ['users' => $users]);
        // insert
        DB::insert('insert into m_level(level_kode, level_nama) values(?,?)', ['Cus', 'Pelanggan']);
        // update
        DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'Cus']);
        // delete
        DB::delete('delete m_level where level_kode = ?', ['Cus']);
    }
}
