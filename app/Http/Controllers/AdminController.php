<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('id', 'asc')->paginate(5);
        return view('admin.index', compact('admins'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'nama_petugas' => 'required',
            'jenis_kelamin' => 'required',
            'no_telephone' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
        ]);

        Admin::create($request->all());
        return redirect()->route('admin.index')
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
        $admin = Admin::find($id);
        return view('admin.edit', compact('admin'));
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
            'nama_petugas' => 'required',
            'jenis_kelamin' => 'required',
            'no_telephone' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
        ]);
        $admin = Admin::find($id);
        $admin->nama_petugas = $request->get('nama_petugas');
        $admin->jenis_kelamin = $request->get('jenis_kelamin');
        $admin->no_telephone = $request->get('no_telephone');
        $admin->jabatan = $request->get('jabatan');
        $admin->alamat = $request->get('alamat');
        $admin->save();
        return redirect()->route('admin.index')
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
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('admin.index')
            ->with('success', 'Data Admin berhasil dihapus');
    }
}
