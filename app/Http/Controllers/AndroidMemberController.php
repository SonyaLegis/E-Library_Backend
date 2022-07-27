<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class AndroidMemberController extends Controller
{
    public function index()
    {
        $response['status'] = true;
        $response['message'] = 'Anggota Berhasil Didapatkan';
        $response['data'] = Member::get();

        return json_encode($response);
    }

    public function create(Request $request)
    {
        Member::create([
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telephone' => $request->no_telephone,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        $response['status'] = true;
        $response['message'] = 'Member Berhasil Di Tambahkan';

        return json_encode($response);
    }

    public function edit(Request $request)
    {
        $member = Member::find($request->id);

        $response['status'] = true;
        $response['message'] = 'Berhasil Tampilkan Member';
        $response['data'] = $member;

        return json_encode($response);
    }

    public function update(Request $request)
    {
        $member = Member::where('id', $request->id)->first();
        $member->nama_lengkap = $request->nama_lengkap;
        $member->jenis_kelamin = $request->jenis_kelamin;
        $member->no_telephone = $request->no_telephone;
        $member->tempat_tanggal_lahir = $request->tempat_tanggal_lahir;
        $member->email = $request->email;
        $member->alamat = $request->alamat;
        $member->save();

        if ($member) {
            $response['status'] = true;
            $response['message'] = 'Berhasil Update Member';
            $response['data'] = $member;
        } else {
            $response['status'] = false;
            $response['message'] = 'Gagal Update Member';
            $response['data'] = null;
        }

        return json_encode($response);
    }

    public function destroy(Request $request)
    {
        $member = Member::find($request->id);
        $member->delete();

        $response['status'] = true;
        $response['message'] = 'Member Berhasil Di Delete';

        return json_encode($response);
    }
}
