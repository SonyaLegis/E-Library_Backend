<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AndroidAdminController extends Controller
{
    public function index()
    {
        $response['status'] = true;
        $response['message'] = 'Admin Berhasil Didapatkan';
        $response['data'] = Admin::get();

        return json_encode($response);
    }

    public function create(Request $request)
    {
        Admin::create([
            'nama_petugas' => $request->nama_petugas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telephone' => $request->no_telephone,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
        ]);

        $response['status'] = true;
        $response['message'] = 'Admin Berhasil Di Tambahkan';

        return json_encode($response);
    }

    public function edit(Request $request)
    {
        $admin = Admin::find($request->id);

        $response['status'] = true;
        $response['message'] = 'Berhasil Tampilkan Admin';
        $response['data'] = $admin;

        return json_encode($response);
    }

    public function update(Request $request)
    {
        $admin = Admin::where('id', $request->id)->first();
        $admin->nama_petugas = $request->nama_petugas;
        $admin->jenis_kelamin = $request->jenis_kelamin;
        $admin->no_telephone = $request->no_telephone;
        $admin->jabatan = $request->jabatan;
        $admin->alamat = $request->alamat;
        $admin->save();

        if ($admin) {
            $response['status'] = true;
            $response['message'] = 'Berhasil Update Admin';
            $response['data'] = $admin;
        } else {
            $response['status'] = false;
            $response['message'] = 'Gagal Update Admin';
            $response['data'] = null;
        }

        return json_encode($response);
    }

    public function destroy(Request $request)
    {
        $admin = Admin::find($request->id);
        $admin->delete();

        $response['status'] = true;
        $response['message'] = 'Admin Berhasil Di Delete';

        return json_encode($response);
    }
}
