<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\validator;


class AuthController extends Controller
{
    public function index()
    {
        // ambil data user lalu simpan ke variabel user
        $user = Auth::user();

        if ($user) {
            if ($user->level_id == '1') {
                return redirect()->intended('admin');
            } else if ($user->level == '2') {
                return redirect()->intended('manager');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        // membuat validasi saat login
        // validasi username dan password
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // ambil data request username & password saja
        $credential = $request->only('username', 'password');
        // cek data username
        if (Auth::attempt($credential)) {
            // kalau berhasil simpan data user di variabel user
            $user = Auth::user();

            // cek hika level user admin maka akan diarahan ke halaman admin
            if ($user->level_id == '1') {
                return redirect()->intended('admin');
            }
            // tai jika level usernya biasa maka akn diarahkan ke halaman user
            else if ($user->level_id == '2') {
                return redirect()->intended('admin');
            }
            // jika belum ada role maka ke halaman /
            return redirect()->intended('/');
        }
        // jika ga ada data user yang valid maka kembalikan lagi ke halaman login
        // pastikan kirim pesan error juga jika login gagal
        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
    }

    public function register()
    {
        // tampilkan view register
        return view('register');
    }

    // aksi form register
    public function proses_register(Request $request)
    {
        // kita buat validasi untuk proses register
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:m_user',
            'password' => 'required'
        ]);
        // kalau gagal kembali ke halaman register dengan memunculkan pesan error
        if ($validator->fails()) {
            return redirect('/redirect')
                ->withErrors($validator)
                ->withInput();
        }
        // kalau berhasil isi level & hash passwordnya agar secure
        $request['level_id'] = '2';
        $request['password'] = Hash::make($request->password);

        UserModel::create($request->all());
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
