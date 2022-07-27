<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AndroidUserController extends Controller
{
    public function login(Request $request)
    {
        $data = array(
            'email' => $request->email
        );

        $users = User::where($data)->first();
        if ($users) {
            if (Hash::check($request->password, $users->password)) {
                $response['status'] = true;
                $response['message'] = 'Akun Berhasil Login';
                $response['data'] = $users;
            } else {
                $response['status'] = false;
                $response['message'] = 'Password Salah';
                $response['data'] = null;
            }
        } else if ($users == NULL) {
            $response['status'] = false;
            $response['message'] = 'Data Kosong';
            $response['data'] = null;
        }

        return json_encode($response);
    }

    public function register(Request $request)
    {
        $data = array(
            'email' => $request->email
        );

        $users = User::where($data)->first();

        if ($users) {
            $response['status'] = false;
            $response['message'] = 'Email Sudah Tersedia, Silahkan Coba Lagi';
        } else {
            if ($request->password == $request->konfirmasi_password) {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);

                $response['status'] = true;
                $response['message'] = 'Akun Berhasil Di Tambahkan';
            } else {
                $response['status'] = false;
                $response['message'] = 'Password dan Konfirmasi Password Harus Sama';
            }
        }

        return json_encode($response);
    }
}
