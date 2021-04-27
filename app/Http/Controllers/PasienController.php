<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtPasien = Pasien::latest()->paginate(2);
        return view('Pasien.Data-pasien', compact('dtPasien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pasien.Create-pasien');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'id','nama','alamat','tgl_lahir','gender', 'phone_email'
       // dd($request->all());
        Pasien::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'gender' => $request->gender,
            'phone_email' => $request->phone_email,
        ]);

        return redirect('data-pasien')->with('success', 'Berhasil Tersimpan!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ps = Pasien::findorfail($id);
        
        return view('Pasien.Edit-pasien', compact('ps'));
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
        //
        $ps = Pasien::findorfail($id);
        $ps->update($request->all());

        return redirect('data-pasien')->with('success', 'Berhasil Tersimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ps = Pasien::findorfail($id);
        $ps->delete();
        return back()->with('info', 'Berhasil Dihapus!');
    }
}
