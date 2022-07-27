<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('id', 'asc')->paginate(5);
        return view('member.index', compact('members'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'no_telephone' => 'required',
            'tempat_tanggal_lahir' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);

        Member::create($request->all());
        return redirect()->route('member.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'no_telephone' => 'required',
            'tempat_tanggal_lahir' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);
        $member = Member::find($id);
        $member->nama_lengkap = $request->get('nama_lengkap');
        $member->jenis_kelamin = $request->get('jenis_kelamin');
        $member->no_telephone = $request->get('no_telephone');
        $member->tempat_tanggal_lahir = $request->get('tempat_tanggal_lahir');
        $member->email = $request->get('email');
        $member->alamat = $request->get('alamat');
        $member->save();
        return redirect()->route('member.index')
            ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('member.index')
            ->with('success', 'Data Member berhasil dihapus');
    }
}
